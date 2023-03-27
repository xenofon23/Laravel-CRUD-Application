<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

        $profiles = Profile::when($q, function ($query, $q) {
            return $query->where('name', 'like', "%{$q}%")
                ->orWhere('surname', 'like', "%{$q}%");
        })->simplePaginate(5);

        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'surname' => 'required|alpha'
        ]);

        Profile::create($request->post());

        return redirect()->route('profiles.index')->with('success', 'Profile has been created successfully.');

    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required|alpha',
            'surname' => 'required|alpha'
        ]);
        $profile->fill($request->post())->save();

        return redirect()->route('profiles.index')->with('success', 'Profile has been created successfully.');

    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile has been created successfully.');
    }
}
