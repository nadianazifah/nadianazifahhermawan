<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function edit() {
        // Mengambil data pertama, jika tidak ada buat baru
        $info = Information::first() ?? new Information();
        return view('admin.information.edit', compact('info'));
    }

    public function update(Request $request) {
        $request->validate(['visi' => 'required', 'misi' => 'required']);
        
        Information::updateOrCreate(['id' => 1], [
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return back()->with('success', 'Informasi Visi & Misi diperbarui!');
    }
}