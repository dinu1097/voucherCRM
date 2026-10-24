@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow text-center mt-10">
    <h2 class="text-2xl font-bold mb-2">{{ $voucher->title }}</h2>
    <p class="text-sm text-gray-500 mb-6">Scheduled Publish Date: {{ $voucher->publish_date->format('M d, Y') }}</p>

    @if(now()->startOfDay()->gte($voucher->publish_date))
        <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
            <p class="text-xs text-green-600 font-semibold uppercase mb-1">Your Voucher Code</p>
            <p class="text-2xl font-mono font-bold text-green-700 tracking-wider">{{ $voucher->code }}</p>
        </div>
    @else
        <div class="bg-amber-50 border border-amber-200 p-4 rounded-lg">
            <p class="text-sm font-semibold text-amber-800">🔒 Voucher Locked</p>
            <p class="text-xs text-amber-700 mt-1">This voucher code will be revealed on {{ $voucher->publish_date->format('M d, Y') }}.</p>
        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('dashboard') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to Dashboard</a>
    </div>
</div>
@endsection