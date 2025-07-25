<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dog Care - @yield('title', __('messages.home'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-blue-600 text-white shadow-lg fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="font-bold text-xl">🐕 Dog Care</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('diseases.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded-md">{{ __('messages.diseases') }}</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="flex-grow mt-16 mb-16">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @hasSection('title')
                <h1 class="text-3xl font-bold text-gray-900 mb-6">
                    @yield('title')
                </h1>
            @endif

            @yield('content')
        </div>
    </main>
    <footer class="bg-white shadow-inner fixed bottom-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-600">
                © {{ date('Y') }} Dog Care. {{ __('messages.all_rights_reserved.') }}
            </p>
        </div>
    </footer>
</body>
</html>
