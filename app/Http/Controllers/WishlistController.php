<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = $request->input('user_id');

            if ($userId) {
                $wishlist = Wishlist::with(['hotel'])->where('user_id', $userId)->get();

                return ResponseFormatter::success(
                    $wishlist,
                    'Wishlist data fetched successfully'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Please provide user id',
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
            $hotelId = $request->input('hotel_id');
            $userId = $request->input('user_id');

            if ($userId && $hotelId) {

                $existingWishlist = Wishlist::where('user_id', $userId)
                    ->where('hotel_id', $hotelId)
                    ->first();

                if ($existingWishlist) {
                    return ResponseFormatter::error(
                        $existingWishlist,
                        'Hotel is already in the wishlist',
                        400
                    );
                }

                $wishlist = Wishlist::create([
                    'hotel_id' => $hotelId,
                    'user_id' => $userId,
                ]);

                return ResponseFormatter::success(
                    $wishlist,
                    'Item added to wishlist'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Please provide a valid user id and hotel id',
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

    public function destroy(Request $request)
    {
        try {
            $userId = $request->input('user_id');
            $hotelId = $request->input('hotel_id');

            $wishlist = Wishlist::where('user_id', $userId)->where('hotel_id', $hotelId)->first();

            if ($wishlist) {
                $wishlist->delete();
                return ResponseFormatter::success(
                    $wishlist,
                    'Item removed from wishlist'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Item is not in wishlist',
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
