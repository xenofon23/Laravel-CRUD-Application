<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class PersonController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

        $persons = Person::when($q, function ($query, $q) {
            return $query->where('name', 'like', "%{$q}%")
                ->orWhere('surname', 'like', "%{$q}%");
        })->simplePaginate(5);

        return view('persons.index', compact('persons'));
    }

    public function create()
    {
        return view('persons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'surname' => 'required|alpha'
        ]);

        Person::create($request->post());

        return redirect()->route('persons.index')->with('success', 'Person has been created successfully.');

    }

    public function show(Person $person)
    {
        return view('persons.show', compact('person'));
    }

    public function edit(Person $person)
    {
        return view('persons.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name' => 'required|alpha',
            'surname' => 'required|alpha'
        ]);
        $person->fill($request->post())->save();

        return redirect()->route('persons.index')->with('success', 'Person has been created successfully.');

    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('persons.index')->with('success', 'Person has been created successfully.');
    }
}
