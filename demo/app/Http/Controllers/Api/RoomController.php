<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Menampilkan semua data room
    public function index()
    {
        return response()->json(Room::all());
    }

    // Menambahkan room baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'type' => 'required|string',
            'description' => 'required|string',
        ]);

        // Simpan data room baru
        $room = Room::create($validated);
        return response()->json($room, 201);
    }

    // Menampilkan detail room
    public function show($id)
    {
        return response()->json(Room::findOrFail($id));
    }

    // Update data room
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());
        return response()->json($room);
    }

    // Hapus room
    public function destroy($id)
    {
        Room::destroy($id);
        return response()->json(null, 204);
    }
}

