<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
            'users' => User::paginate(20),
        ]);
    }

    public function create()
    {
        return view('users_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(route('users', absolute: false));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users_edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return Redirect::to('/users');
    }

    public function destroy(Request $request)
    {

        $user = User::find($request->id);
        $user->delete();

        return Redirect::to('/users');
    }
}
