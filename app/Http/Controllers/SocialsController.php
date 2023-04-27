<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    
    public function index(Request $request)
    {
        if (!$request->session()->get('IsAdmin')) {
        $socials = Social::all();
        return view('socials.index', compact('socials'));
        } else {
                abort(404);
        }
        
    }

    public function create(Request $request,int $id)
    {if (!$request->session()->get('IsAdmin')) {
        return view('socials.create', compact('id'));
    } else {
            abort(404);
    }
        
    }

    public function store(Request $request)
    {if (!$request->session()->get('IsAdmin')) {
        $request->validate([
            'Name' => 'required',
            'Link' => 'required',
        ]);

        Social::create($request->post());
        return redirect()->route('users.show', $request->input('UserId'))->with('success', 'Social Link has been created successfully');

    } else {
            abort(404);
    }
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $Socials
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,int $id)
    {if (!$request->session()->get('IsAdmin')) {
        $Socials = Social::findOrFail($id);
        $UserID = $Socials->UserId;
        $Socials->delete();
        return redirect()->route('users.show', $UserID)->with('success', 'Social Link has been deleted successfully');
    } else {
            abort(404);
    }
        
    }
}