<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        return inertia('Home', [
            'users' => User::when($request->search, function ($query) use ($request) {
                $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            })->paginate(5)->withQueryString(),

            'searchTerm' => $request->search,

            'can' => [
                'delete_user' =>
                Auth::user() ?
                    Auth::user()->can('delete', User::class) :
                    null
            ]
        ]);
    }
    public function showKiosk()
    {
        return Inertia::render('Kiosk');
    }

    public function showTiketux()
    {
        return Inertia::render('Tiketux');
    }

    public function showWhiteLabel()
    {
        return Inertia::render('WhiteLabel');
    }
}
