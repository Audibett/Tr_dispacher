<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white shadow dark:bg-gray-800">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 dark:border-gray-700 rounded-lg h-96 flex items-center justify-center">
                        <div class="text-center">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Welcome to Truck Dispatcher</h2>
                            <p class="text-gray-600 dark:text-gray-400">You are logged in as {{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>