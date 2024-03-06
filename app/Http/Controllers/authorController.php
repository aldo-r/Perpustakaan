<?php

namespace App\Http\Controllers;

use App\Models\authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class authorController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => authors::all()
        ]);
    }
    public function create()
    {
        return view('authors.create');
    }
    public function store(request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'name.required' => 'isi kolom ini',
                'photo.required' => 'format tidak tersedia',
            ]
        );


        $author = new authors();

        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('/photos');
        }

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        return redirect()->route('authors')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $author = authors::find($id);

        return view('authors.edit', [
            'author' => $author
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'string|max:255',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
        );

        $author = authors::findOrFail($id);

        $photo = $author->photo;

        if ($request->hasFile('photo')) {
            if ($author->photo !== null && Storage::exists($author->photo)) {
                Storage::delete($author->photo);
            }

            $photo = $request->file('photo')->store('/photos');
        }

        $author->name = $request->name;
        $author->photo = $photo;
        $author->save();

        return redirect()->route('authors')->with('success', 'Data penulis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $author = authors::find($id);
        $author->delete();
        return redirect()->route('authors')->with('hapus', 'Data Berhasil Dihapus!');
    }
}
