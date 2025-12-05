@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 md:p-8 shadow-lg rounded-xl">

    <h2 class="text-xl md:text-2xl font-bold text-red-600 mb-3">អ្នកបានបោះឆ្នោតរួចហើយ</h2>

    <p class="text-gray-600 mb-5">
        ប្រព័ន្ធបានកត់ត្រាបោះឆ្នោតរបស់អ្នករួច។ មិនអាចចូលម្តងទៀតបានទេ។
    </p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button
            class="px-5 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">
            ត្រលប់ទៅទំព័រចូល
        </button>
    </form>

</div>
@endsection
