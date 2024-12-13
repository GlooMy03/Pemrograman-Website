<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        // Mengambil semua data booking
        return response()->json(Booking::all());
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'room_type' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'phone_number' => 'required|string',
            'total_rooms' => 'required|integer',
            'payment_method' => 'required|string',
        ]);

        // Simpan data baru
        $booking = Booking::create($validated);
        return response()->json($booking, 201);
    }

    public function show($id)
    {
        // Menampilkan detail booking
        return response()->json(Booking::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        // Update data booking
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return response()->json($booking);
    }

    public function destroy($id)
    {
        // Hapus booking
        Booking::destroy($id);
        return response()->json(null, 204);
    }
}

