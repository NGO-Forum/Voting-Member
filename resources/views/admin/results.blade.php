@extends('layout')

@section('content')
    {{-- Admin Header --}}
    <div class="bg-white shadow rounded-xl p-5 mb-4 flex items-center justify-between">
        <h2 class="text-xl md:text-3xl font-bold text-blue-700">
            📊 លទ្ធផលបោះឆ្នោត
        </h2>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition">
                ចេញពីគណនី
            </button>
        </form>
    </div>

    {{-- Total votes --}}
    <div class="flex justify-between bg-blue-50 border border-blue-200 text-blue-700 rounded-xl px-5 py-4 shadow mb-4">
        <p class="text-lg font-semibold">
            🗳️ សរុបការបោះឆ្នោត:
            <span class="font-bold text-blue-900">{{ $totalVotes }}</span> សន្លឹក
        </p>
        <a href="{{ route('admin.results.pdf') }}"
            class="px-3 py-1 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">
            📥 ទាញយក PDF
        </a>
    </div>

    {{-- Candidate Results Grid --}}
    <div
        class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 space-y-1">

        @foreach ($candidates as $index => $candidate)
            @php
                $percent = $totalVotes > 0 ? round(($candidate->votes_count / $totalVotes) * 100) : 0;

                // Rank color
                $rankColors = [
                    0 => 'bg-yellow-100 text-yellow-700 border-yellow-300', // 1st
                    1 => 'bg-gray-100 text-gray-700 border-gray-300', // 2nd
                    2 => 'bg-orange-100 text-orange-700 border-orange-300', // 3rd
                ];
                $badge = $rankColors[$index] ?? 'bg-blue-50 text-blue-700 border-blue-300';
            @endphp

            <div class="border rounded-xl p-5 bg-white shadow hover:shadow-lg transition-all">

                {{-- Ranking Badge --}}
                <span class="px-3 py-1 text-sm border rounded-full {{ $badge }}">
                    ចំណាត់ថ្នាក់ #{{ $loop->iteration }}
                </span>

                <div class="flex items-center gap-4 mt-3">
                    <img src="{{ $candidate->photo }}" class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border">

                    <div>
                        <h3 class="text-lg font-bold">{{ $candidate->name }}</h3>
                        <p class="italic text-gray-500 mt-2">{{ $candidate->meta }}</p>
                    </div>
                </div>

                {{-- Vote count --}}
                <p class="mt-4 text-gray-700 font-medium text-lg">
                    {{ number_format($candidate->votes_count) }} សន្លឹក
                    <span class="text-gray-500 text-sm">({{ $percent }}%)</span>
                </p>

                {{-- Animated Progress Bar --}}
                <div class="w-full h-4 bg-gray-200 rounded-full mt-2 overflow-hidden">
                    <div class="h-full bg-blue-600 rounded-full transition-all duration-700"
                        style="width: {{ $percent }}%">
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
