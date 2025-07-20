@extends('layouts.app')
@section('title', 'Point of Sale')
@section('content')
<div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Point of Sale (POS)</h1>
    <p class="mb-4">This is a placeholder for the POS system. Here you can build your in-person sales interface.</p>
    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back to Dashboard</a>
</div>
@endsection


