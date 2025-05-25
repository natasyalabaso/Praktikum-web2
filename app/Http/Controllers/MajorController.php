<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Majors;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Majors::all();
        return view('majors.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:majors|max:10',
            'description' => 'required',
        ]);

        Majors::create([
            'name' => $validated['name'],
            'code' => $validated['code'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('majors.index')->with('success', 'Major created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $major = Majors::find($id);
        return view('majors.detail', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major = Majors::find($id);
        return view('majors.update', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => "required|unique:majors,code,$id|max:10",
            'description' => 'required',
        ]);
        $major = Majors::find($id);
        if ($major) {
            $major->update([
                'name' => $validated['name'],
                'code' => $validated['code'],
                'description' => $validated['description'],
            ]);
            return redirect()->route('majors.index')->with('success', 'Major updated successfully');
        } else {
            return redirect()->route('majors.index')->with('error', 'Major not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $major = Majors::find($id);
        if ($major) {
            $major->delete();
            return redirect()->route('majors.index')->with('success', 'Major deleted successfully');
        } else {
            return redirect()->route('majors.index')->with('error', 'Major not found');
        }
    }
}
