<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use App\Models\Social;
use App\Models\Users;
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
        $User = Users::find($request->input('UserId'));
            return redirect()->route('users.show', ['username' => $User->Link])->with('success', 'Social Link has been created successfully');

    } else {
            abort(404);
    }
            }

    public function destroy(Request $request,int $id)
    {if (!$request->session()->get('IsAdmin')) {
        $Socials = Social::findOrFail($id);
        $User = Users::findOrFail($Socials->UserId);
        $Socials->delete();
        //$User = Users::find($request->input('UserId'));
            return redirect()->route('users.show', ['username' => $User->Link])->with('success', 'Social Link has been deleted successfully');
    } else {
            abort(404);
    }
        
    }
}