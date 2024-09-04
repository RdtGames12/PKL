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

class BooksController extends Controller
{

    protected $manaCms;

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Dapatkan daftar buku dengan filter pencarian
        $books = Book::with('category') // Include relation with category if needed
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%")
                      ->orWhere('publisher', 'like', "%{$search}%");
            })
            ->get();

        return Inertia::render('Books/Index', [
            'books' => $books
        ]);
    }
    public function create()
    {
        $categories = Category::all(); 
        return inertia('Books/Create', [
            'categories' => $categories,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        Book::create([
            'title'     => $request->title,
            'author'    => $request->author,
            'publisher' => $request->publisher,
            'category_id' => $request->category_id
        ]);

        
        return redirect()->route('books.index')->with('success', 'Book added successfully!');    }

        public function edit($id)
    {
        $book = Book::with('category')->findOrFail($id);
        $categories = Category::all(); // Mengambil semua kategori untuk pilihan dropdown

        return inertia('Books/Edit', [
            'book' => $book,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }
    
        public function destroy(Book $book)
        {
            $book->delete();
    
            return redirect()->route('books.index')->with('success', 'Book Deleted Successfully!');
        }

        public function restore(Book $book): RedirectResponse
    {
        $book->restore();

        return Redirect::back()->with('success', 'Book restored.');
    }
}

