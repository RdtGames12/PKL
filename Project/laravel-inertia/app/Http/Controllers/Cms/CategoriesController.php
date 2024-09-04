<?php

namespace App\Http\Controllers\Cms;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use Illuminate\Http\Request;
use App\http\Libraries\ManaCms;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::when($search, function ($query, $search) {
            $query->where('category', 'like', "%{$search}%");
        })->get();

        return inertia('Categories/Index', ['categories' => $categories]);
    }

    public function create()
    { 
        return inertia('Categories/Create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|string|max:255',
        ]);

        Category::create([
            'category' => $request->category,
        ]);

        return Inertia::render('Categories/Index', [
            'categories' => Category::all(),
            'success' => 'Category added successfully!'
        ]);
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return inertia('Categories/Edit', [
            'category' => $category
        ]);
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
{

    $category = Category::findOrFail($id);

    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Category and related books deleted successfully!');
}



}
