<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loyola House Community Management System</title>
    @vite('resources/js/app.jsx')
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-blue-700">
                Loyola House Community Management System
            </h1>

            <p class="mt-4 text-gray-600 text-lg">
                Welcome to the Provincial Headquarters
            </p>

            <div class="mt-8">
                <a href="{{ route('login') }}"
                   class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Login
                </a>
            </div>
        </div>
    </div>

</body>
</html>