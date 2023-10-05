<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private function registerValidation(Request $request): array
    {
        return $formFields = $request->validate([
            'name' => 'require',
            'email' => ['require', Rule::unique('users', 'email')],
            // there I end - password validation
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // there will be validation



        return back()->with('message', "message");
    }
}
