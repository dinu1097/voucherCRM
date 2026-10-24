@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-3xl border border-[#a8dadc]/20 shadow-2xl text-center relative overflow-hidden">
        <!-- Glow Sockets -->
        <div class="absolute -top-16 -left-16 w-32 h-32 bg-[#e63946]/10 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-[#a8dadc]/10 rounded-full blur-2xl"></div>

        <h2 class="text-2xl font-black text-black mb-1">{{ $voucher->title }}</h2>
        <p class="text-xs text-black mb-8">Scheduled Release Date: {{ $voucher->publish_date->format('M d, Y') }}</p>

        @if(now()->startOfDay()->gte($voucher->publish_date))
            <div class="bg-a8dadc border border-[#a8dadc]/30 p-6 rounded-2xl relative">
                <p class="text-[10px] text-black font-bold uppercase tracking-wider mb-2">Your Voucher Code</p>
                <p class="text-3xl font-mono font-black text-black tracking-wider select-all">{{ $voucher->code }}</p>
            </div>
        @else
            <div class="bg-a8dadc border border-[#e63946]/30 p-6 rounded-2xl">
                <div class="w-10 h-10 rounded-full bg-[#e63946]/20 text-[#e63946] mx-auto flex items-center justify-center mb-3">
                    🔒
                </div>
                <p class="text-sm font-bold text-black">Voucher Locked</p>
                <p class="text-xs text-black mt-1">This voucher code will unlock on {{ $voucher->publish_date->format('M d, Y') }}.</p>
            </div>
        @endif

        <div class="mt-8">
            <a href="{{ route('dashboard') }}" class="text-xs text-black font-semibold hover:text-black transition-colors">&larr; Back to Dashboard</a>
        </div>
    </div>
</div>
@endsection