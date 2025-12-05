@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 md:p-8 shadow-lg rounded-xl">

    <h2 class="text-2xl font-bold text-green-600 mb-3 text-center">
        ✔ សូមអរគុណ!
    </h2>

    <p class="text-gray-600 text-center mb-5">
        ការបោះឆ្នោតរបស់អ្នកត្រូវបានរក្សាទុកដោយជោគជ័យ។
    </p>

    <form method="POST" action="{{ route('logout') }}" class="text-center">
        @csrf
        <button
            class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
            បញ្ចប់
        </button>
    </form>

</div>
@endsection
