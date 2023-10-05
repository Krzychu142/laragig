<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private function registerValidation(Request $request): array
    {
        return $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            // if some properties have to be confirmed it's mean it must be the same as next one field with the same name + _confirmation
            'password' => ['required', 'confirmed', 'min:6'],
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

        $formFields = $this->registerValidation($request);
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        // Login
        // auth() helper, login method - pass current created $user
        auth()->login($user);

        return redirect('/')->with('message', "User created and logged in");
    }



    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();

        return redirect('/')->with('message', "User logged out");
    }
}
