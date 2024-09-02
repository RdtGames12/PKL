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

    public function index(): Response
    {
        $books = Book::join('categories', 'books.category_id', '=', 'categories.id')
                ->select('books.*', 'categories.category as category_name')
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

        //Redirect to Index
        return redirect()->route('books.index')->with('success', 'Book added successfully!');    }

        public function edit(Book $book) {
            return Inertia::render('Books/Edit', [
                'book' => [
                    'id' => $book->id,
                    'title' => $book->title,
                    'author' => $book->author,
                    'publisher' => $book->publisher,
                    'category_id' => $book->category_id
                ],
            ]);
        }
    
        public function update(Request $request, Book $book) {
            $this->validate($request, [
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id'
            ]);
    
            $book->update([
                'title'     => $request->title,
                'author'    => $request->author,
                'publisher' => $request->publisher,
                'category_id' => $request->category_id
            ]);
    
            return redirect()->route('books.index')->with('success', 'Book Updated Successfully!');
        }
    
        public function destroy(Book $book)
        {
            $book->delete();
    
            return redirect()->route('books.index')->with('success', 'Book Deleted Successfully!');
        }
}

