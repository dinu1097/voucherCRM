@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-6">Your Digital Vouchers</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($vouchers as $voucher)
            <div class="bg-white p-5 rounded-lg shadow flex flex-col justify-between">
                <div>
                    <h3 class="font-bold text-lg">{{ $voucher->title }}</h3>
                    <p class="text-xs text-gray-500 mt-1">Publish Date: {{ $voucher->publish_date->format('M d, Y') }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('vouchers.show', $voucher) }}" class="inline-block bg-indigo-600 text-white px-3 py-1.5 rounded text-sm hover:bg-indigo-700">
                        View Voucher
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">You don't have any vouchers assigned to you yet.</p>
        @endforelse
    </div>
</div>
@endsection