<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'foto_event',
        'tanggal_event',
        'status',
    ];

    /**
     * Fungsi untuk otomatis memperbarui status berdasarkan tanggal.
     */
    public function syncStatus()
    {
        $today = Carbon::today();
        $eventDate = Carbon::parse($this->tanggal_event);

        if ($eventDate->isToday()) {
            $newStatus = 'berlangsung';
        } elseif ($eventDate->isPast()) {
            $newStatus = 'selesai';
        } else {
            $newStatus = 'akan datang';
        }

        if ($this->status !== $newStatus) {
            $this->update(['status' => $newStatus]);
        }
    }
}