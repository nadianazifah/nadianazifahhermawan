<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        foreach ($events as $event) {
            $event->syncStatus();
        }

        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_event' => 'required|date|after_or_equal:today',
            'status' => 'required|in:akan datang,berlangsung,selesai',
            'foto_event' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('foto_event')->store('events', 'public');

        Event::create([
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'status' => $request->status,
            'foto_event' => $path,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dipublikasikan!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_event' => 'required|date',
            'status' => 'required|in:akan datang,berlangsung,selesai',
            'foto_event' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto_event')) {
            // Hapus foto lama
            if ($event->foto_event) {
                Storage::disk('public')->delete($event->foto_event);
            }
            $event->foto_event = $request->file('foto_event')->store('events', 'public');
        }

        $event->update([
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'status' => $request->status,
            'foto_event' => $event->foto_event,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        if ($event->foto_event) {
            Storage::disk('public')->delete($event->foto_event);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event telah dihapus.');
    }
}
