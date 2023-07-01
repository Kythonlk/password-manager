<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the passwords.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passwords = Password::all();

        return view('passwords.index', compact('passwords'));
    }

    /**
     * Show the form for creating a new password.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passwords.create');
    }

    /**
     * Store a newly created password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'url' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Password::create($validatedData);

        return redirect()->route('passwords.index')->with('success', 'Password created successfully.');
    }

    /**
     * Display the specified password.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        return view('passwords.show', compact('password'));
    }

    /**
     * Show the form for editing the specified password.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $password)
    {
        return view('passwords.edit', compact('password'));
    }

    /**
     * Update the specified password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Password $password)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'url' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $password->update($validatedData);

        return redirect()->route('passwords.index')->with('success', 'Password updated successfully.');
    }

    /**
     * Remove the specified password from storage.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $password)
    {
        $password->delete();

        return redirect()->route('passwords.index')->with('success', 'Password deleted successfully.');
    }
}
