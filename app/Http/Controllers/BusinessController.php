<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UsersController;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::all();
        return view('business.index', compact('businesses'));
    }

    public function create($id)
    {
        return view('business.create', compact('id'));
    }

    public function store(Request $request)
    {        
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
    }

    public function show(Business $business)
    {
        return view('business.show', compact('business'));
    }

    public function edit(int $id)
    {
        $business = Business::find($id);
        if (!$business) {
            abort(404);
        }
        return view('business.edit', compact('business'));
    }

    public function update(Request $request, $id)
    {
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
    }

    public function destroy(int $id)
    {
        $business = business::findOrFail($id);
        $UserID = $business->UserId;
        $business->delete();
        return redirect()->route('users.show', $UserID)->with('success', 'Work has been deleted successfully');
        // $business->delete();
        // return redirect()->route('businesses.index');
    }
}
