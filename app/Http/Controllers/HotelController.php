<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        try {
            $id = $request->input('id');
            $limit = $request->input('limit', 6);
            $name = $request->input('name');
            $description = $request->input('description');
            $location = $request->input('location');
            $min_rating = $request->input('min_rating');
            $min_price = $request->input('min_price');
            $max_price = $request->input('max_price');

            if ($id) {
                $hotel = Hotel::with(['facilities', 'gallery', 'reviews'])->find($id);

                if ($hotel) {
                    return ResponseFormatter::success(
                        $hotel,
                        'Hotel data fetched successfully'
                    );
                }
            } else {
                return ResponseFormatter::error(
                    null,
                    'Hotel not found',
                    404
                );
            }

            $hotel = Hotel::with(['facilities', 'gallery', 'reviews']);

            if ($name) {
                $hotel->where('name', 'like', '%', $name . '%');
            }
            if ($description) {
                $hotel->where('description', 'like', '%' . $description . '%');
            }
            if ($location) {
                $hotel->where('location', 'like', '%' . $location . '%');
            }
            if ($min_rating) {
                $hotel->where('rating', '>=', $min_rating);
            }
            if ($min_price) {
                $hotel->where('price', '>=', $min_price);
            }
            if ($max_price) {
                $hotel->where('price', '<=', $max_price);
            }

            return ResponseFormatter::success(
                $hotel->paginate($limit),
                'Hotel data fetched successfully',
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
