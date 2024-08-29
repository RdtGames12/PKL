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
    public function index(): Response
    {
        return Inertia::render('Categories/Index');
    }
}
