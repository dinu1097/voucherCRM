@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-[#a8dadc]/15 pb-5">
        <div>
            <h1 class="text-2xl font-black text-black">Voucher Manager</h1>
            <p class="text-xs text-black mt-1">Generate and distribute scheduled digital vouchers to users.</p>
        </div>
    </div>

    <!-- Create Voucher Form -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-[#a8dadc]/20 shadow-xl relative overflow-hidden">
        <div class="flex items-center gap-2 mb-6">
            <div class="w-2.5 h-2.5 rounded-full bg-[#e63946]"></div>
            <h2 class="text-lg font-bold text-black">Create & Schedule Voucher</h2>
        </div>

        @if(session('success'))
            <div class="bg-[#a8dadc]/10 border border-[#a8dadc]/30 text-black p-4 rounded-2xl mb-6 text-xs flex items-center gap-2">
                <svg class="w-4 h-4 text-black shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.vouchers.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @csrf
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Assign Target</label>
                <select name="user_id" required class="w-full bg-a8dadc border border-[#a8dadc]/20 text-[#f1faee] px-4 py-2.5 rounded-xl focus:outline-none focus:border-[#e63946] text-sm">
                    <option value="">Select User Target...</option>
                    <option value="all" class="font-bold text-[#e63946]">&mdash; All Users (Batch Generate) &mdash;</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Voucher Title</label>
                <input type="text" name="title" required placeholder="e.g. Early Bird Promo" class="w-full bg-a8dadc border border-[#a8dadc]/20 text-[#f1faee] placeholder-black/30 px-4 py-2.5 rounded-xl focus:outline-none focus:border-[#e63946] text-sm">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Code or Base Prefix</label>
                <input type="text" name="code" required placeholder="e.g. SAVE50" class="w-full bg-a8dadc border border-[#a8dadc]/20 text-[#f1faee] placeholder-black/30 px-4 py-2.5 rounded-xl focus:outline-none focus:border-[#e63946] text-sm">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Publish Release Date</label>
                <input type="date" name="publish_date" required class="w-full bg-a8dadc border border-[#a8dadc]/20 text-[#f1faee] px-4 py-2.5 rounded-xl focus:outline-none focus:border-[#e63946] text-sm">
            </div>
            <div class="md:col-span-2 pt-2">
                <button type="submit" class="bg-[#e63946] hover:bg-[#d62839] text-black font-semibold px-6 py-2.5 rounded-xl text-sm shadow-lg shadow-[#e63946]/25 transition-all">
                    Issue Voucher &rarr;
                </button>
            </div>
        </form>
    </div>

    <!-- All Issued Vouchers List -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-[#a8dadc]/20 shadow-xl">
        <h2 class="text-lg font-bold text-black mb-6">Issued Voucher Stream</h2>
        <div class="space-y-3">
            @forelse($vouchers as $v)
                <div class="p-4 rounded-2xl bg-a8dadc border border-[#a8dadc]/15 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-black text-sm">{{ $v->title }}</span>
                            <span class="text-xs text-black">&bull; {{ $v->user->name ?? 'Unknown User' }}</span>
                        </div>
                        <p class="text-xs text-black/50">Scheduled for {{ $v->publish_date->format('M d, Y') }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        @if(now()->startOfDay()->gte($v->publish_date))
                            <span class="text-[10px] uppercase font-bold bg-[#a8dadc]/20 text-black border border-[#a8dadc]/30 px-2.5 py-1 rounded-full">Active</span>
                        @else
                            <span class="text-[10px] uppercase font-bold bg-[#e63946]/20 text-[#e63946] border border-[#e63946]/30 px-2.5 py-1 rounded-full">Scheduled</span>
                        @endif
                        <span class="font-mono bg-white border border-[#a8dadc]/20 text-[#f1faee] px-3 py-1.5 rounded-xl text-xs font-semibold tracking-wider">{{ $v->code }}</span>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 text-black text-sm">
                    No vouchers issued yet.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection