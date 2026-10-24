<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminVoucherController extends Controller {
    public function index() {
        $vouchers = Voucher::with('user')->latest()->get();
        $users = User::where('is_admin', false)->get();
        return view('admin.vouchers', compact('vouchers', 'users'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'publish_date' => 'required|date',
        ]);

        if ($request->user_id === 'all') {
            // Fetch all non-admin users
            $users = User::where('is_admin', false)->get();

            foreach ($users as $user) {
                // Generate a unique code for each user by appending a random suffix
                $uniqueCode = strtoupper($request->code . '-' . Str::random(6));

                Voucher::create([
                    'user_id' => $user->id,
                    'title' => $request->title,
                    'code' => $uniqueCode,
                    'publish_date' => $request->publish_date,
                ]);
            }

            $message = 'Unique vouchers successfully created and assigned to all users!';
        } else {
            $request->validate([
                'user_id' => 'exists:users,id',
            ]);

            // For a single user, use the exact code entered
            Voucher::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'code' => strtoupper($request->code),
                'publish_date' => $request->publish_date,
            ]);

            $message = 'Voucher created and scheduled successfully!';
        }

        return redirect()->back()->with('success', $message);
    }
}