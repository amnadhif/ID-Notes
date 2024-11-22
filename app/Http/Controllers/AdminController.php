<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();

        if ($user->email !== 'admin@admin.com') {
            abort(403, 'Unauthorized access.');
        }

        $users = User::all();

        return view('notes.admin', compact('users'));
    }

}
