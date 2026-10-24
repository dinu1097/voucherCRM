@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" required class="w-full border p-2 rounded mt-1">
        </div>
        <div>
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" required class="w-full border p-2 rounded mt-1">
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">Login</button>
    </form>
    <p class="text-sm text-center mt-4">Don't have an account? <a href="{{ route('signup') }}" class="text-indigo-600">Sign up</a></p>
</div>
@endsection