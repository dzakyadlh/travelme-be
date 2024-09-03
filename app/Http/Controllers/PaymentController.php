<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = $request->input('user_id');

            if ($userId) {
                $payment = Payment::where('user_id', $userId)->get();

                return ResponseFormatter::success(
                    $payment,
                    'Payment methods fetched successfully'
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
            $provider = $request->input('provider');
            $accountNumber = $request->input('account_number');
            $expiryDate = $request->input('expiry_date');

            if ($userId && $provider && $accountNumber) {
                $payment = Payment::create([
                    'user_id' => $userId,
                    'provider' => $provider,
                    'account_number' => $accountNumber,
                    'expiry_date' => $expiryDate,
                ]);

                return ResponseFormatter::success(
                    $payment,
                    'Payment method added'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Please provide a valid input',
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
