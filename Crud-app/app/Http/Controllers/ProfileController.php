<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        Profile::create($request->post());

        return redirect()->route('profiles.index')->with('success','profile has been created successfully.');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show',compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit',compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {


        $profile->fill($request->post())->save();

        return redirect()->route('profiles.index')->with('success','profile Has Been updated successfully');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success','profile has been deleted successfully');
    }
}
