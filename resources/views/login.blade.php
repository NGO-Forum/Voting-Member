@extends('layout')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 md:p-8" x-data="ngoSearch()">

        <h2 class="text-xl md:text-2xl font-bold text-blue-700 mb-5 text-center">
            ចូលប្រើប្រាស់ប្រព័ន្ធបោះឆ្នោត
        </h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 border border-red-300 rounded-lg px-4 py-2 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5" autocomplete="off">
            @csrf

            <div class="relative">
                <label class="block font-semibold mb-1">
                    ឈ្មោះ NGO ឬ Short Name
                </label>

                <input type="text" name="login_input" x-model="search" x-on:input="filter()" x-on:focus="filter()"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    placeholder="បញ្ចូលឈ្មោះ NGO ឬ Short Name ..." required>

                <!-- Suggestions -->
                <ul x-show="filtered.length > 0"
                    class="absolute z-50 bg-white border rounded-lg mt-1 w-full max-h-56 overflow-y-auto shadow-lg">

                    <template x-for="item in filtered" :key="item.short_name">
                        <li x-on:click="choose(item)" class="px-4 py-2 hover:bg-blue-100 cursor-pointer">
                            <span x-text="item.full_name"></span>
                            <span class="text-gray-500">(<span x-text="item.short_name"></span>)</span>
                        </li>
                    </template>
                </ul>
            </div>

            <button
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold
                   hover:bg-blue-700 transition duration-150">
                ចូលប្រើប្រាស់
            </button>
        </form>
    </div>

    <script>
        function ngoSearch() {
            return {
                search: "",
                filtered: [],

                ngos: @json($ngos), // all NGOs from controller

                filter() {
                    let term = this.search.toLowerCase().trim();

                    if (term.length === 0) {
                        this.filtered = [];
                        return;
                    }

                    this.filtered = this.ngos.filter(n =>
                        n.full_name.toLowerCase().includes(term) ||
                        n.short_name.toLowerCase().includes(term)
                    );
                },

                choose(item) {
                    this.search = item.short_name; // auto-fill short name
                    this.filtered = [];
                }
            }
        }
    </script>
@endsection
