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
    public function index(Request $request)
    {
        
        if ($request->session()->get('IsAdmin')) {
            // Show all users to admin
            $users = Users::all()->sortDesc();
            return view('users.index', compact('users'));
        } else {
            // Show only user accounts to non-admin users
            $user = Users::where('id', $request->session()->get('LoginID'))->first();
            return redirect()->route('users.show', $user->id);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->session()->get('IsAdmin')) {
            return view('users.create');
        } else {
            // Show only user accounts to non-admin users
            $user = Users::where('id', $request->session()->get('LoginID'))->first();
            return redirect()->route('users.show', $user->id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->session()->get('IsAdmin')) {
            $request->validate([
                'FullName' => 'required',
                'Email' => 'required',
                'Password' => 'required'
            ]);
            $request->merge([
                'Link' => 'text=' . $request->input('FullName')
            ]);
            $isAdmin = $request->input('IsAdmin') == 'OFF' ? 0 : 1;
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
        } else {
            abort(404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        if ($request->session()->get('IsAdmin')) {
            $User = Users::find($id);
            if (!$User) {
                abort(404);
            }
            return view('users.show', compact('User'));
        } else {
            $User = Users::find($request->session()->get('LoginID'));
            if (!$User) {
                abort(404);
            }
            return view('users.show', compact('User'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, Request $request)
    {
        $Users = Users::find($id);
        if (!$Users) {
            abort(404);
        }
        return view('users.edit', compact('Users', 'request'));
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
        if ($request->session()->get('IsAdmin')) {
            $request->validate([
                'FullName' => 'required',
                'Email' => 'required|email|unique:users,email,' . $Users->id,
                'Password' => 'required'
            ]);
            $isAdmin = $request->input('IsAdmin') == 'ON' ? 1 : 0;
            $request->merge(['IsAdmin' => $isAdmin]);
            $request->merge([
                'Link' => 'text=' . $request->input('FullName')
            ]);

            if ($request->hasFile('ProfilePhoto')) {
                $image = $request->file('ProfilePhoto');
                if ($image->isValid()) {
                    $Profilephoto = base64_encode(file_get_contents($image));
                    $request->merge(['ProfilePhoto' => $Profilephoto]);
                }
            }

            $Users->fill($request->post())->save();
            $Users = Users::findOrFail($id);
            $request->session()->put('LoginID', $Users->id);
            $request->session()->put('IsAdmin', $Users->IsAdmin == 1 ? true : false);
            return redirect()->route('users.index')->with('success', 'Users Has Been updated successfully');

        } else {
            $request->validate([
                'Email' => 'required|email|unique:users,email,' . $Users->id,
                'Password' => 'required'
            ]);
            $request->merge(['FullName' => $Users->FullName]);
            $request->merge(['IsAdmin' => $Users->IsAdmin]);
            $request->merge(['PhoneNumber' => $Users->PhoneNumber]);
            $request->merge([
                'Link' => 'text=' . $request->input('FullName')
            ]);

            if ($request->hasFile('ProfilePhoto')) {
                $image = $request->file('ProfilePhoto');
                if ($image->isValid()) {
                    $Profilephoto = base64_encode(file_get_contents($image));
                    $request->merge(['ProfilePhoto' => $Profilephoto]);
                }
            }

            $Users->fill($request->post())->save();
            // $Users = Users::findOrFail($id);
            // $request->session()->put('LoginID', $Users->id);
            // $request->session()->put('IsAdmin', $Users->IsAdmin == 1 ? true : false);
            return redirect()->route('users.index')->with('success', 'Users Has Been updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        if ($request->session()->get('IsAdmin')) {
            $Users = Users::findOrFail($id);
            $Users->delete();
            return redirect()->route('users.index')->with('success', 'Users has been deleted successfully');
        } else {
            abort(404);
        }
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

        $user = Users::where('email', $request->input('Email'))->where('Password', $request->input('Password'))->first();

        if ($user != Null) {
            if ($user->IsAdmin) {
                # code...
                $request->session()->put('authenticated', true);
                $request->session()->put('LoginID', $user->id);
                $request->session()->put('IsAdmin', true);

                return redirect()->intended('/');
            } else {
                # code...
                $request->session()->put('authenticated', true);
                $request->session()->put('LoginID', $user->id);
                $request->session()->put('IsAdmin', false);

                return redirect()->route('users.show', $user->id);
            }


        } else {
            return redirect()->route('users.login')->with('error', 'Error in Email Or Password');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('authenticated');
        $request->session()->forget('LoginID');
        $request->session()->forget('IsAdmin');

        return redirect()->route('users.login');
    }

}