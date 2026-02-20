<!DOCTYPE html>
<html lang="km">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ការបោះឆ្នោតសមាជិកបណ្តាញ ២០២៦</title>
    <link rel="icon" type="logo" href="/logo.jpg" />

    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    {{-- Khmer Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans Khmer', sans-serif;
        }

        .small-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .small-scroll::-webkit-scrollbar-track {
            background: #ffffff;
            border-radius: 10px;
        }

        .small-scroll::-webkit-scrollbar-thumb {
            background: #ffffff;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Top Header --}}
    <header class="bg-white shadow text-center">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <h1 class="text-xl md:text-3xl font-bold text-blue-600">
                🗳️ ការបោះឆ្នោតសមាជិកបណ្តាញ NECCAW ឆ្នាំ ២០២៦
            </h1>
            <p class="text-gray-500 mt-1 text-xs md:text-base">ប្រព័ន្ធបោះឆ្នោតតាមប្រព័ន្ធអេឡិកត្រូនិច។​ សូមជ្រើសរើសបេក្ខជនច្រើនបំផុត ៥ នាក់
                និង អាចបោះឆ្នោតបានតែម្តងប៉ុណ្ណោះ!</p>
        </div>
    </header>

    {{-- Main Page Content --}}
    <main class="flex-1 max-w-8xl mx-auto w-full px-4 py-4 max-h-[85vh] overflow-auto">
        @yield('content')
    </main>

</body>

</html>
