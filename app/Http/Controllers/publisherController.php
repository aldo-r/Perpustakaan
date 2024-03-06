<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use Illuminate\Http\Request;

class publisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publisher.index', [
            'publishers' => publisher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255'
            ],
            [
                'name.required' => 'isi kolom ini',
                'address.required' => 'isi kolom ini',
            ]
        );

        $publisher = new publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();

        return redirect()->route('publisher')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $publisher = publisher::find($id);
        return view('publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publisher = publisher::find($id);

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();

        return redirect()->route('publisher')->with('edit', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publisher = publisher::find($id);
        $publisher->delete();
        return redirect()->route('publisher')->with('hapus', 'Data Berhasil Dihapus!');
    }
}
