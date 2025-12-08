@extends('layout')

@section('content')
    <div class="bg-white p-6 md:p-8 rounded-xl shadow overflow-y-auto h-auto md:h-[92vh] lg:h-[82vh] small-scroll space-y-1">

        <h2 class="text-xl md:text-2xl font-bold mb-2">សូមជ្រើសរើសបេក្ខជនចំនួន​ ៥</h2>
        <p class="text-gray-500 mb-4">
            NGO Name: <strong>{{ $member->short_name }}</strong>
        </p>

        {{-- Errors --}}
        @if (session('error'))
            <div class="bg-red-100 text-red-700 border border-red-300 rounded-lg px-4 py-2 mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 rounded-lg px-4 py-2 mb-4">
                {{ implode(', ', $errors->all()) }}
            </div>
        @endif

        <form method="POST" action="{{ route('vote.submit') }}">
            @csrf

            {{-- Grid --}}
            <div class="grid gap-6 lg:gap-7 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($candidates as $candidate)
                    <div class="border rounded-xl p-5 mt-2 bg-white shadow-sm hover:shadow-md transition">

                        <div class="flex items-start gap-4">
                            <img src="{{ $candidate->photo }}"
                                class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border">

                            <div>
                                <h3 class="font-bold text-lg">{{ $candidate->name }}</h3>
                                <p class="italic text-gray-500 text-sm mt-2">{{ $candidate->meta }}</p>
                            </div>
                        </div>

                        <p class="mt-3 text-gray-600 text-sm leading-relaxed">
                            {{ $candidate->bio }}
                        </p>

                        <div class="flex items-center justify-between mt-4">
                            <span class="px-3 py-1 text-sm rounded-full bg-blue-50 text-blue-700 border border-blue-200">
                                អាចជ្រើស
                            </span>

                            <label class="cursor-pointer">
                                <input type="checkbox" name="candidates[]" value="{{ $candidate->id }}" class="peer hidden">

                                <div
                                    class="w-7 h-7 border-2 border-blue-600 rounded-md flex items-center justify-center
                                        text-transparent peer-checked:text-green-600 peer-checked:border-green-600
                                        peer-checked:bg-green-50 transition text-lg font-bold">
                                    ✅
                                </div>
                            </label>
                        </div>

                    </div>
                @endforeach
            </div>

            <p class="text-gray-500 text-sm mt-3">
                ប្រព័ន្ធនឹងបិទការជ្រើសរើសបន្ទាប់ពីថ្ងៃទី ១៥ ខែធ្នូ ឆ្នាំ២០២៥។
            </p>

            <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
                បញ្ជូនបោះឆ្នោត
            </button>

        </form>
    </div>

    {{-- JS to limit 3 selections --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const max = 5;
            const all = document.querySelectorAll("input[name='candidates[]']");

            function check() {
                const selected = document.querySelectorAll("input[name='candidates[]']:checked").length;

                all.forEach(cb => {
                    const card = cb.closest(".border");
                    if (!cb.checked && selected >= max) {
                        cb.disabled = true;
                        card.classList.add("opacity-40");
                    } else {
                        cb.disabled = false;
                        card.classList.remove("opacity-40");
                    }
                });
            }

            all.forEach(cb => cb.addEventListener("change", check));
        });
    </script>
@endsection
