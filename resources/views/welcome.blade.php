@extends('layouts.app')

@section('title', 'Welcome to Laravel 13')

@section('content')
    <div class="max-w-2xl mx-auto text-center">
        <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 mb-6">
            Build Something <span class="text-primary">Amazing</span>
        </h1>
        <p class="text-lg text-gray-600 mb-8">
            Laravel 13 + PostgreSQL + Tailwind 4 via CDN.
        </p>
        
        <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 text-left">
            <h3 class="text-xl font-semibold mb-2">System Status:</h3>
            <ul class="space-y-2">
                <li class="flex items-center text-green-600">
                    <span class="mr-2">✔</span> Database Connected (PostgreSQL)
                </li>
                <li class="flex items-center text-green-600">
                    <span class="mr-2">✔</span> Tailwind 4 Ready
                </li>
            </ul>
        </div>
    </div>
@endsection