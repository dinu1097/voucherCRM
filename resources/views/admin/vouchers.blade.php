@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Create & Assign Voucher</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.vouchers.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Assign User</label>
                <select name="user_id" required class="w-full border p-2 rounded mt-1">
                    <option value="">Select User</option>
                    <option value="all" class="font-bold text-indigo-600">&mdash; All Users &mdash;</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Voucher Title</label>
                <input type="text" name="title" required placeholder="e.g. 20% Off Holiday Deal" class="w-full border p-2 rounded mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium">Voucher Code</label>
                <input type="text" name="code" required placeholder="e.g. SAVE20NOW" class="w-full border p-2 rounded mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium">Publish Date</label>
                <input type="date" name="publish_date" required class="w-full border p-2 rounded mt-1">
            </div>
            <div class="md:col-span-2">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Create Voucher</button>
            </div>
        </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">All Issued Vouchers</h2>
        <div class="divide-y">
            @forelse($vouchers as $v)
                <div class="py-3 flex justify-between items-center">
                    <div>
                        <p class="font-bold">{{ $v->title }} &mdash; <span class="text-gray-500 font-normal">Assigned to: {{ $v->user->name ?? 'Unknown' }}</span></p>
                        <p class="text-xs text-gray-500">Publish Date: {{ $v->publish_date->format('Y-m-d') }}</p>
                    </div>
                    <span class="font-mono bg-gray-100 px-2 py-1 rounded text-sm">{{ $v->code }}</span>
                </div>
            @empty
                <p class="text-gray-500">No vouchers issued yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection