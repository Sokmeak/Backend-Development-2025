
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold text-gray-800">MyLaravelApp</h1>
                <div>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-4">Home</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-4">Features</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-4">Contact</a>

                    <!-- Conditional login or register buttons -->
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Login</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="relative bg-blue-500 text-white text-center py-20">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl font-bold">Welcome to MyLaravelApp</h1>
                <p class="mt-4 text-lg">Build amazing applications with the power of Laravel.</p>
                <a href="#" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold shadow-lg hover:bg-gray-100">
                    Get Started
                </a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="max-w-7xl mx-auto py-16 px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-8 mt-10">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800">Fast Performance</h3>
                    <p class="text-gray-600 mt-2">Optimized for speed and efficiency.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800">Scalability</h3>
                    <p class="text-gray-600 mt-2">Easily scale your application as you grow.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800">Secure & Reliable</h3>
                    <p class="text-gray-600 mt-2">Security best practices implemented.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer (Sticky) -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-sm">© 2025 MyLaravelApp. All rights reserved.</p>
            <div class="mt-2 space-x-4">
                <a href="#" class="text-gray-300 hover:text-white">Privacy Policy</a>
                <a href="#" class="text-gray-300 hover:text-white">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>
