@extends('layouts.app')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center py-6">
    <div class="w-full max-w-md bg-white p-8 rounded-3xl border border-[#a8dadc]/20 shadow-2xl relative overflow-hidden">
        <!-- Glow Effect -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-[#e63946]/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-black">Welcome back</h2>
            <p class="text-sm text-black mt-2">Sign in to access your digital voucher hub</p>
        </div>
        
        @if($errors->any())
            <div class="bg-[#e63946]/10 border border-[#e63946]/30 text-[#e63946] p-3.5 rounded-2xl mb-6 text-xs flex items-center gap-2">
                <svg class="w-4 h-4 text-[#e63946] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Email Address</label>
                <input type="email" name="email" required placeholder="name@company.com" class="w-full bg-a8dadc border border-[#a8dadc]/20 text-[#f1faee] placeholder-black/30 px-4 py-3 rounded-xl focus:outline-none focus:border-[#e63946] transition-all text-sm">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-black mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-a8dadc border border-[#a8dadc]/20 text-[#f1faee] placeholder-black/30 px-4 py-3 rounded-xl focus:outline-none focus:border-[#e63946] transition-all text-sm">
            </div>
            <button type="submit" class="w-full bg-[#e63946] hover:bg-[#d62839] text-black font-semibold py-3 px-4 rounded-xl shadow-lg shadow-[#e63946]/25 transition-all text-sm">
                Sign In &rarr;
            </button>
        </form>

        <p class="text-xs text-center text-[#f1faee]/70 mt-6">
            Don't have an account? 
            <a href="{{ route('signup') }}" class="text-black font-semibold hover:text-black underline underline-offset-4">Create account</a>
        </p>
    </div>
</div>
@endsection