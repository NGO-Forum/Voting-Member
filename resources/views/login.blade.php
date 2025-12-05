@extends('layout')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 md:p-8">

        <h2 class="text-xl md:text-2xl font-bold text-blue-700 mb-4 text-center">
            ចូលប្រើប្រាស់ប្រព័ន្ធបោះឆ្នោត
        </h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 border border-red-300 rounded-lg px-4 py-2 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold mb-1">លេខ​ សម្គាល់ ( Member ID )</label>
                <input type="text" name="member_id"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    placeholder="បញ្ចូល Member ID..." required>
            </div>

            <button
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold
                   hover:bg-blue-700 transition duration-150">
                ចូលប្រើប្រាស់
            </button>
        </form>

    </div>
@endsection
