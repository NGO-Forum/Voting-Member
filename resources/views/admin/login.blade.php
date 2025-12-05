@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 md:p-8 shadow-xl rounded-xl">

    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">
        🔐 ចូលគណនី Admin
    </h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-2 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold mb-1">ឈ្មោះគណនី (Username)</label>
            <input type="text" name="username" 
                class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                placeholder="បញ្ចូលឈ្មោះគណនី..." required>
        </div>

        <div>
            <label class="block font-semibold mb-1">ពាក្យសម្ងាត់ (Password)</label>
            <input type="password" name="password" 
                class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                placeholder="បញ្ចូលពាក្យសម្ងាត់..." required>
        </div>

        <button 
            class="w-full py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg font-semibold">
            ចូលប្រើប្រាស់
        </button>
    </form>

</div>
@endsection
