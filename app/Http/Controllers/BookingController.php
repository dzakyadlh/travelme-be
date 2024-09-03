<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = $request->input('user_id');

            if ($userId) {
                $booking = Booking::where('user_id', $userId)->get();

                return ResponseFormatter::success(
                    $booking,
                    'Booking data fetched successfully'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Please provide a valid user id',
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

    public function store(Request $request)
    {
        try {
            $userId = $request->input('user_id');
            $hotelId = $request->input('hotel_id');
            $hotelRoomId = $request->input('hotel_room_id');
            $checkIn = $request->input('check_in');
            $checkOut = $request->input('check_out');
            $paidAmount = $request->input('paid_amount');
            $payment = $request->input('payment_id');

            $booking = Booking::create([
                'user_id' => $userId,
                'hotel_id' => $hotelId,
                'hotel_room_id' => $hotelRoomId,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'paid_amount' => $paidAmount,
                'payment_id' => $payment,
            ]);

            return ResponseFormatter::success(
                $booking,
                'Booking data stored successfully'
            );
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                null,
                'Internal Server Error: ' . $e->getMessage(),
                500
            );
        }
    }
}
