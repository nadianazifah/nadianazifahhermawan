<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->get();
        return view('admin.recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('admin.recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_resep'  => 'required|string|max:255',
            'jenis_resep' => 'required|string|max:100',
            'deskripsi'   => 'nullable|string',
            'bahan'       => 'required|string',
            'cara_masak'  => 'required|string',
            'foto_resep'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('foto_resep')->store('recipes', 'public');

        Recipe::create([
            'nama_resep'  => $request->nama_resep,
            'jenis_resep' => $request->jenis_resep,
            'deskripsi'   => $request->deskripsi,
            'bahan'       => $request->bahan,
            'cara_masak'  => $request->cara_masak,
            'foto_resep'  => $path,
        ]);

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil ditambahkan ke katalog!');
    }

    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'nama_resep'  => 'required|string|max:255',
            'jenis_resep' => 'required|string|max:100',
            'deskripsi'   => 'nullable|string',
            'bahan'       => 'required|string',
            'cara_masak'  => 'required|string',
            'foto_resep'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto_resep')) {
            if ($recipe->foto_resep) {
                Storage::disk('public')->delete($recipe->foto_resep);
            }
            $recipe->foto_resep = $request->file('foto_resep')->store('recipes', 'public');
        }

        $recipe->update([
            'nama_resep'  => $request->nama_resep,
            'jenis_resep' => $request->jenis_resep,
            'deskripsi'   => $request->deskripsi,
            'bahan'       => $request->bahan,
            'cara_masak'  => $request->cara_masak,
            'foto_resep'  => $recipe->foto_resep,
        ]);

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy(Recipe $recipe)
    {
        if ($recipe->foto_resep) {
            Storage::disk('public')->delete($recipe->foto_resep);
        }
        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Resep telah dihapus dari katalog.');
    }
}