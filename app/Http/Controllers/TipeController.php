<?php

namespace App\Http\Controllers;

use App\Models\type;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     $name = auth()->user()->username;
    //     $tipes = type::all();
    //     return view('Type.index', compact('name','tipes'));
    // }
    public function index(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->query('search');

        // If there is a search query, perform the search
        if (!empty($search)) {
            $tipes = Type::where('id', 'like', '%' . $search . '%')
                         ->orWhere('nama_type', 'like', '%' . $search . '%')
                         ->paginate(5)
                         ->appends(['search' => $search]);
        } else {
            // If there is no search query, retrieve all types with pagination
            $tipes = Type::paginate(7);
        }

        // Retrieve the username of the authenticated user
        $name = auth()->user()->username;

        // Return the view with the types data and other variables
        return view('type.index')->with([
            'tipes' => $tipes,
            'search' => $search,
            'name' => $name
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $name = auth()->user()->username;
        return view('Type.tambah',compact('name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_type' => 'required|string|max:255',
        ]);

        type::create($request->all());

        return redirect()->route('type.success')->with('success', 'Tipe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $name = auth()->user()->username;
        $type = Type::findOrFail($id);
        return view('Type.edit', compact('type','name'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the input fields
    $request->validate([
        'id' => 'required|integer|unique:types,id,' . $id,
        'nama_type' => 'required|string|max:255',
    ]);

    // Find the type by its current ID
    $type = Type::findOrFail($id);

    // Update the type fields
    $type->id = $request->input('id');
    $type->nama_type = $request->input('nama_type');
    $type->save();

    // Redirect to the index route with a success message
    return redirect()->route('type.success')->with('success', 'Type updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $type = Type::find($id);

        if (!$type) {
            return redirect()->route('type.index')->with('error', 'Type not found.');
        }

        $type->delete();

        return redirect()->route('type.index')->with('success', 'Type deleted successfully.');
    }
    public function success()
    {
        $name = auth()->user()->name;
        return view('Type.succes',compact('name'));
    }
}
