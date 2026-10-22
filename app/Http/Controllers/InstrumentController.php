<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstrumentController extends Controller
{
    public function index()
    {
        $instruments = Instrument::latest()->get();

        return view('instruments.index', compact('instruments'));
    }

    public function create()
    {
        return view('instruments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['image'] = $request->file('image')->store('instruments', 'public');

        Instrument::create($data);

        return redirect()
            ->route('instruments.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Instrument $instrument)
    {
        return view('instruments.show', compact('instrument'));
    }

    public function edit(Instrument $instrument)
    {
        return view('instruments.edit', compact('instrument'));
    }

    public function update(Request $request, Instrument $instrument)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $newImage = $request->file('image')->store('instruments', 'public');

            if ($instrument->image) {
                Storage::disk('public')->delete($instrument->image);
            }

            $data['image'] = $newImage;
        } else {
            unset($data['image']);
        }

        $instrument->update($data);

        return redirect()
            ->route('instruments.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Instrument $instrument)
    {
        if ($instrument->image) {
            Storage::disk('public')->delete($instrument->image);
        }

        $instrument->delete();

        return redirect()
            ->route('instruments.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}