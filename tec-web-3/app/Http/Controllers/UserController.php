<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    
    public function index(): Response
    {
        $users = User::select('id', 'name', 'email', 'created_at')->get();

        return Inertia::render('users/index', [
            'users' => $users,
        ]);
    }

   
    public function show(string $id): Response
    {
        $user = User::findOrFail($id);

        return Inertia::render('users/show', [
            'user' => $user->only('id', 'name', 'email', 'created_at', 'email_verified_at'),
        ]);
    }
}