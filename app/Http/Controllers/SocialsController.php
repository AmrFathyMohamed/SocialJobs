<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('socials.index', compact('socials'));
    }

    public function create($id)
    {
        return view('socials.create', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Link' => 'required',
        ]);

        Social::create($request->post());
        return redirect()->route('users.show', $request->input('UserId'))->with('success', 'Social Link has been created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $Socials
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Socials = Social::findOrFail($id);
        $UserID = $Socials->UserId;
        $Socials->delete();
        return redirect()->route('users.show', $UserID)->with('success', 'Social Link has been deleted successfully');
    }
}