<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loyola House Management System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gradient-to-br from-green-100 via-white to-green-200 min-h-screen">

<div class="min-h-screen flex items-center justify-center p-6">

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-6xl grid md:grid-cols-2">

        <!-- LEFT SIDE -->

        <div class="hidden md:block relative">

            <img
                src="{{ asset('images/dashboard-banner.jpg') }}"
                alt="Loyola House"
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-green-900/40"></div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="p-10 flex flex-col justify-center">

            <div class="text-center mb-8">

                <h1 class="text-4xl font-bold text-green-900">

                    Loyola House

                </h1>

                <p class="text-lg text-gray-600">

                    Community Management System

                </p>

                <div
                    id="clock"
                    class="mt-4 text-green-800 font-semibold text-lg">

                </div>

            </div>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <!-- EMAIL -->

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">

                        Email Address

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-700 focus:outline-none">

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2" />

                </div>

                <!-- PASSWORD -->

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">

                        Password

                    </label>

                    <div class="relative">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            class="w-full border rounded-lg px-4 py-3 pr-12 focus:ring-2 focus:ring-green-700 focus:outline-none">

                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-3 top-3">

                            👁

                        </button>

                    </div>

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2" />

                </div>

                <!-- REMEMBER -->

                <div class="flex justify-between items-center mb-6">

                    <label class="flex items-center">

                        <input
                            type="checkbox"
                            name="remember"
                            class="mr-2">

                        Remember Me

                    </label>

                    @if(Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="text-green-900 hover:underline">

                            Forgot Password?

                        </a>

                    @endif

                </div>

                <!-- LOGIN BUTTON -->

                <button
                    class="w-full bg-green-900 hover:bg-green-800 text-white py-3 rounded-lg text-lg font-bold transition">

                    LOGIN

                </button>

            </form>

            <!-- FOOTER -->

            <div class="mt-10 border-t pt-6 text-center text-sm text-gray-500">

                <strong class="text-green-900">

                    Loyola House Community Management System

                </strong>

                <br>

                Version 1.0

                <br><br>

                © {{ date('Y') }}

                Jesuits Eastern Africa Province

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(){

    let password=document.getElementById('password');

    if(password.type==="password"){

        password.type="text";

    }else{

        password.type="password";

    }

}

function updateClock(){

    const now=new Date();

    document.getElementById("clock").innerHTML=

        now.toLocaleDateString('en-GB',{

            weekday:'long',

            year:'numeric',

            month:'long',

            day:'numeric'

        })

        +

        "<br>"

        +

        now.toLocaleTimeString();

}

setInterval(updateClock,1000);

updateClock();

</script>

</body>

</html>