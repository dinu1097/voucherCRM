@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="border-b border-[#a8dadc]/15 pb-5">
        <h1 class="text-2xl font-black text-black">Your Digital Vouchers</h1>
        <p class="text-xs text-black mt-1">Manage and access your assigned promotional vouchers.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @forelse($vouchers as $voucher)
            <div class="bg-white p-6 rounded-3xl border border-[#a8dadc]/20 shadow-xl flex flex-col justify-between relative overflow-hidden group">
                <div class="space-y-2">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-lg text-black group-hover:text-black transition-colors">{{ $voucher->title }}</h3>
                        @if(now()->startOfDay()->gte($voucher->publish_date))
                            <span class="text-[10px] uppercase font-bold bg-[#a8dadc]/20 text-black border border-[#a8dadc]/30 px-2.5 py-1 rounded-full shrink-0">Available</span>
                        @else
                            <span class="text-[10px] uppercase font-bold bg-[#e63946]/20 text-[#e63946] border border-[#e63946]/30 px-2.5 py-1 rounded-full shrink-0">Locked</span>
                        @endif
                    </div>
                    <p class="text-xs text-black">Release Date: {{ $voucher->publish_date->format('M d, Y') }}</p>
                </div>

                <div class="mt-6 pt-4 border-t border-[#a8dadc]/10 flex items-center justify-between">
                    <a href="{{ route('vouchers.show', $voucher) }}" class="inline-flex items-center gap-2 bg-[#e63946] hover:bg-[#d62839] text-black font-semibold px-4 py-2 rounded-xl text-xs transition-all shadow-md shadow-[#e63946]/20">
                        View Details &rarr;
                    </a>
                </div>
            </div>
        @empty
            <div class="md:col-span-2 text-center py-16 bg-white rounded-3xl border border-[#a8dadc]/20">
                <p class="text-black text-sm">You don't have any vouchers assigned to your account yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection