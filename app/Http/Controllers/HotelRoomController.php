<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    public function index(Request $request)
    {
        try {
            $hotelId = $request->input('hotel_id');
            $checkIn = $request->input('check_in'); // Not used in this implementation
            $checkOut = $request->input('check_out'); // Not used in this implementation

            if ($hotelId) {
                // Fetch rooms associated with the given hotel_id
                $rooms = HotelRoom::where('hotel_id', $hotelId)->get();

                if ($rooms->isNotEmpty()) {
                    return ResponseFormatter::success(
                        $rooms,
                        'Hotel room list fetched successfully'
                    );
                } else {
                    return ResponseFormatter::error(
                        null,
                        'No rooms found for this hotel',
                        404
                    );
                }
            } else {
                return ResponseFormatter::error(
                    null,
                    'Hotel ID is required',
                    400
                );
            }
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                null,
                'Internal Server Error: ' . $e->getMessage(),
                500
            );
        }
    }
}
