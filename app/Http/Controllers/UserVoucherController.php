<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;

class UserVoucherController extends Controller {
    public function index() {
        $vouchers = Auth::user()->vouchers()->latest()->get();
        return view('user.dashboard', compact('vouchers'));
    }

    public function show(Voucher $voucher) {
        if ($voucher->user_id !== Auth::id()) {
            abort(403);
        }

        return view('user.voucher-detail', compact('voucher'));
    }
}