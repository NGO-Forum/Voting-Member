@extends('layout')

@section('content')
    {{-- Header --}}
    <div class="bg-white shadow rounded-xl p-5 mb-6 flex items-center justify-between">
        <h2 class="text-xl md:text-3xl font-bold text-blue-700 flex items-center gap-2">
            📊 ស្ថានភាពបោះឆ្នោតរបស់អង្គការ
        </h2>

        <div class="flex gap-3">
            {{-- Results --}}
            <a href="{{ route('admin.results') }}"
                class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition shadow">
                លទ្ធផលបោះឆ្នោត
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition shadow">
                    ចេញពីគណនី
                </button>
            </form>
        </div>
    </div>

    {{-- Content --}}
    <div class="container mx-auto">

        {{-- Page Title --}}
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                បញ្ជីអង្គការ និងស្ថានភាពបោះឆ្នោត
            </h1>
        </div>

        {{-- Table Card --}}
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-blue-600 text-white border-b">
                    <tr>
                        <th class="p-3 text-left font-semibold">ឈ្មោះពេញ</th>
                        <th class="p-3 text-left font-semibold">ឈ្មោះអក្សរកាត់</th>
                        <th class="p-3 text-center font-semibold">ចំនួនបោះឆ្នោត</th>
                        <th class="p-3 text-left font-semibold">ឈ្មោះបេក្ខជន</th>
                        <th class="p-3 text-center font-semibold">ស្ថានការ​ ការបោះឆ្នោត</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ngos as $ngo)
                        <tr class="border-b hover:bg-green-100 transition">
                            <td class="p-3 text-gray-800">{{ $ngo->full_name }}</td>
                            <td class="p-3 text-gray-600 font-semibold">{{ $ngo->short_name }}</td>
                            <td class="p-3 text-center font-bold text-blue-700">
                                {{ $ngo->supported_count }} {{-- number of candidates supported --}}
                            </td>

                            <td class="p-3 text-gray-700">
                                @if ($ngo->supported_candidates->count() > 0)
                                    <ul class="list-disc ml-5">
                                        @foreach ($ngo->supported_candidates as $c)
                                            <li>{{ $c->name }} <span class="text-gray-500">({{ $c->meta }})</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-400"> មិនបានគាំទ្រ </span>
                                @endif
                            </td>

                            <td class="p-3 text-center">
                                @if ($ngo->has_voted)
                                    <span class="px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-700">
                                        ✔ បោះឆ្នោតរួចហើយ
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-sm font-bold bg-red-100 text-red-700">
                                        ✘ មិនទាន់បោះឆ្នោត
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
