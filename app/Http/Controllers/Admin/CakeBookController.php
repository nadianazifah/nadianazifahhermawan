<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CakeBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CakeBookController extends Controller
{
    public function index()
    {
        $books = CakeBook::latest()->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_buku'   => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf'    => 'required|mimes:pdf|max:10240' // Max 10MB
        ]);

        $coverPath = $request->file('foto_sampul')->store('covers', 'public');
        $pdfPath   = $request->file('file_pdf')->store('pdfs', 'public');

        CakeBook::create([
            'nama_buku'   => $request->nama_buku,
            'deskripsi'   => $request->deskripsi,
            'foto_sampul' => $coverPath,
            'file_pdf'    => $pdfPath,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diunggah ke katalog!');
    }

    public function edit(CakeBook $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, CakeBook $book)
    {
        $request->validate([
            'nama_buku'   => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'foto_sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf'    => 'nullable|mimes:pdf|max:10240'
        ]);

        // Cek dan update foto sampul
        if ($request->hasFile('foto_sampul')) {
            if ($book->foto_sampul) {
                Storage::disk('public')->delete($book->foto_sampul);
            }
            $book->foto_sampul = $request->file('foto_sampul')->store('covers', 'public');
        }

        // Cek dan update file PDF
        if ($request->hasFile('file_pdf')) {
            if ($book->file_pdf) {
                Storage::disk('public')->delete($book->file_pdf);
            }
            $book->file_pdf = $request->file('file_pdf')->store('pdfs', 'public');
        }

        $book->update([
            'nama_buku'   => $request->nama_buku,
            'deskripsi'   => $request->deskripsi,
            'foto_sampul' => $book->foto_sampul,
            'file_pdf'    => $book->file_pdf,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(CakeBook $book)
    {
        // Hapus kedua file dari storage
        if ($book->foto_sampul) Storage::disk('public')->delete($book->foto_sampul);
        if ($book->file_pdf) Storage::disk('public')->delete($book->file_pdf);
        
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Buku telah dihapus dari sistem.');
    }
}