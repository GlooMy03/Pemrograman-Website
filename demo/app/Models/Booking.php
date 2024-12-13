<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Tabel terkait (pastikan sesuai dengan nama tabel)
    protected $table = 'booking';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'full_name',
        'email',
        'room_type',
        'check_in',
        'check_out',
        'phone_number',
        'total_rooms',
        'payment_method',
    ];
}
