<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all()->sortDesc();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'FullName' => 'required',
            'Email' => 'required',
            'Password' => 'required'
        ]);
        $request->merge([
            'Link' => 'text=' . $request->input('FullName')
        ]);
        $isAdmin = $request->input('IsAdmin') == 'ON' ? 0 : 1;
        $request->merge(['IsAdmin' => $isAdmin]);

        if ($request->hasFile('ProfilePhoto')) {
            $image = $request->file('ProfilePhoto');
            if ($image->isValid()) {
                $Profilephoto = base64_encode(file_get_contents($image));
                $request->merge(['ProfilePhoto' => $Profilephoto]);
            } else {
                return redirect()->back()->with('error', 'Invalid file upload');
            }
        }

        Users::create($request->post());

        return redirect()->route('users.index')->with('success', 'User has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $User = Users::find($id);
        if (!$User) {
            abort(404);
        }
        return view('users.show', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $Users = Users::find($id);
        if (!$Users) {
            abort(404);
        }
        return view('users.edit', compact('Users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Users = Users::findOrFail($id);
        $request->validate([
            'FullName' => 'required',
            'Email' => 'required|email|unique:users,email,' . $Users->id,
            'Password' => 'required'
        ]);
        $request->merge([
            'Link' => 'text=' . $request->input('FullName')
        ]);
        $isAdmin = $request->input('IsAdmin') == 'ON' ? 0 : 1;
        $request->merge(['IsAdmin' => $isAdmin]);

        if ($request->hasFile('ProfilePhoto')) {
            $image = $request->file('ProfilePhoto');
            if ($image->isValid()) {
                $Profilephoto = base64_encode(file_get_contents($image));
                $request->merge(['ProfilePhoto' => $Profilephoto]);
            }
        }

        $Users->fill($request->post())->save();

        return redirect()->route('users.index')->with('success', 'Users Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Users = Users::findOrFail($id);
        $Users->delete();
        return redirect()->route('users.index')->with('success', 'Users has been deleted successfully');
    }

    public function login()
    {
        return view('users.login');
    }
    public function CheckLogin(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required|string',
        ]);

        $user = Users::where('email', $request->input('Email'))->where('Password', $request->input('Password'))->where('IsAdmin', 1)->first();

        if ($user != Null) {
            $request->session()->put('authenticated', true);
            return redirect()->intended('/');
        } else {
            return redirect()->route('users.login');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('authenticated');
        return redirect()->route('users.login');
    }

}