<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{

    public function index()
    {
        if (!$request->session()->get('IsAdmin')) {
            $businesses = Business::all();
            return view('business.index', compact('businesses'));
        } else {
            abort(404);
        }

    }

    public function create(Request $request, int $id)
    {
        if (!$request->session()->get('IsAdmin')) {
            return view('business.create', compact('id'));
        } else {
            abort(404);
        }

    }

    public function store(Request $request)
    {
        if (!$request->session()->get('IsAdmin')) {
            $request->validate([
                'Name' => 'required',
                'Link' => 'required',
            ]);
            if ($request->hasFile('Photo')) {
                $image = $request->file('Photo');
                if ($image->isValid()) {
                    $Photo = base64_encode(file_get_contents($image));
                    $request->merge(['Photo' => $Photo]);
                } else {
                    return redirect()->back()->with('error', 'Invalid file upload');
                }
            }
            Business::create($request->post());
            return redirect()->route('users.show', $request->input('UserId'))->with('success', 'Business has been created successfully');

        } else {
            abort(404);
        }
    }

    public function show(Request $request, Business $business)
    {
        if (!$request->session()->get('IsAdmin')) {
            return view('business.show', compact('business'));
        } else {
            abort(404);
        }

    }

    public function edit(Request $request, int $id)
    {
        if (!$request->session()->get('IsAdmin')) {
            $business = Business::find($id);
            if (!$business) {
                abort(404);
            }
            return view('business.edit', compact('business'));
        } else {
            abort(404);
        }

    }

    public function update(Request $request, $id)
    {
        if (!$request->session()->get('IsAdmin')) {
            $Users = Business::findOrFail($id);
            $request->validate([
                'Name' => 'required',
                'Link' => 'required'
            ]);

            if ($request->hasFile('Photo')) {
                $image = $request->file('Photo');
                if ($image->isValid()) {
                    $Photo = base64_encode(file_get_contents($image));
                    $request->merge(['Photo' => $Photo]);
                }
            }

            $Users->fill($request->post())->save();

            return redirect()->route('users.show', $Users->UserId)->with('success', 'Work has been Updated successfully');

        } else {
            abort(404);
        }
    }

    public function destroy(Request $request, int $id)
    {
        if (!$request->session()->get('IsAdmin')) {
            $business = business::findOrFail($id);
            $UserID = $business->UserId;
            $business->delete();
            return redirect()->route('users.show', $UserID)->with('success', 'Work has been deleted successfully');
        } else {
            abort(404);
        }

        // $business->delete();
        // return redirect()->route('businesses.index');
    }
}