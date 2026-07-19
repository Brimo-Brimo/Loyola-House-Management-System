<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loyola House Community Management System</title>

    @vite('resources/js/app.jsx')

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-white flex flex-col shadow-lg">

        <!-- Logo -->
        <div class="bg-white p-6 border-b border-gray-200">

            <div class="flex items-center space-x-3">

                <img src="{{ asset('images/logo.png') }}"
                     alt="Province Logo"
                     class="w-32 h-32 object-contain">

                <div>

                    <p class="text-2xl font-bold text-green-900">
                        LOYOLA HOUSE
                    </p>

                </div>

            </div>

        </div>

        <!-- Menu -->

        <nav class="flex-1 bg-green-900 text-white pt-4 overflow-y-auto">

        @php
            $role = strtolower(Auth::user()->role->name);
        @endphp

        <!-- Dashboard -->

        <div class="px-6 pb-2">

            <a href="{{ route('dashboard') }}"
               class="block px-4 py-3 rounded hover:bg-green-800
               {{ request()->routeIs('dashboard') ? 'bg-green-800' : '' }}">

                🏠 Dashboard

            </a>

        </div>

        <!-- Administrator -->

        @if($role == 'administrator')

        <div class="px-6 pt-4 pb-2 text-green-300 uppercase text-xs font-bold">

            Administration

        </div>

        <a href="{{ route('community-members.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            👥 Community Members

        </a>

        <a href="{{ route('staff.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            👔 Staff

        </a>

        <a href="{{ route('buildings.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🏢 Buildings

        </a>

        <a href="{{ route('wings.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🪽 Wings

        </a>

        <a href="{{ route('rooms.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🚪 Rooms

        </a>

        <hr class="my-4 border-green-700">

        <div class="px-6 pb-2 text-green-300 uppercase text-xs font-bold">

            Accommodation

        </div>

        <a href="{{ route('guests.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🧳 Guests

        </a>

        <a href="{{ route('room-bookings.pending') }}"
class="block px-10 py-2 hover:bg-green-800">

✅ Pending Bookings

</a>

        <a href="{{ route('room-allocations.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🏠 Community Rooms

        </a>

        <hr class="my-4 border-green-700">

        <div class="px-6 pb-2 text-green-300 uppercase text-xs font-bold">

            Meals

        </div>

        <a href="{{ route('kitchen.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🍽 Kitchen Dashboard

        </a>

        <hr class="my-4 border-green-700">

        <div class="px-6 pb-2 text-green-300 uppercase text-xs font-bold">

            Community

        </div>

        <a href="#"
           class="block px-10 py-2 hover:bg-green-800">

            📢 Announcements

        </a>

        <a href="#"
           class="block px-10 py-2 hover:bg-green-800">

            🚶 Away Notices

        </a>

        <hr class="my-4 border-green-700">

        <div class="px-6 pb-2 text-green-300 uppercase text-xs font-bold">

            Display

        </div>

        <a href="#"
           class="block px-10 py-2 hover:bg-green-800">

            📺 Reception Screen

        </a>

        @endif

        <!-- Reception -->

        @if($role == 'receptionist')

        <div class="px-6 pt-4 pb-2 text-green-300 uppercase text-xs font-bold">

            Reception

        </div>

        <a href="{{ route('guest-room-allocations.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🛏 Pending Bookings

        </a>

        <a href="{{ route('guests.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🧳 Guests

        </a>

        <a href="{{ route('rooms.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🚪 Rooms

        </a>

        @endif

        <!-- Kitchen -->

        @if($role == 'kitchen')

        <div class="px-6 pt-4 pb-2 text-green-300 uppercase text-xs font-bold">

            Kitchen

        </div>

        <a href="{{ route('kitchen.index') }}"
           class="block px-10 py-2 hover:bg-green-800">

            🍽 Meal Dashboard

        </a>

        @endif

        <!-- Community Member -->

        @if($role == 'community member')

        <div class="px-6 pt-4 pb-2 text-green-300 uppercase text-xs font-bold">

            My Account

        </div>

        <a href="{{ route('my-meals') }}"
class="block px-10 py-2 hover:bg-green-800">

🍽 My Meals

</a>

        <a href="{{ route('room.booking') }}"
class="block px-10 py-2 hover:bg-green-800
{{ request()->routeIs('room.booking*') ? 'bg-green-800 border-l-4 border-yellow-400' : '' }}">

🛏 Book Guest Room

</a>

<a href="{{ route('booking-approvals.index') }}"
class="block px-10 py-2 hover:bg-green-800">

✅ Pending Bookings

</a>
        <a href="{{ route('away-notices.pending') }}"
class="block px-10 py-2 hover:bg-green-800">

🚶 Pending Away Notices

</a>

        <a href="#"
           class="block px-10 py-2 hover:bg-green-800">

            📢 My Announcements

        </a>

        @endif

        <!-- Guest -->

        @if($role == 'guest')

        <div class="px-6 pt-4 pb-2 text-green-300 uppercase text-xs font-bold">

            Guest Portal

        </div>

        <a href="#"
           class="block px-10 py-2 hover:bg-green-800">

            🛏 My Booking

        </a>

        <a href="#"
           class="block px-10 py-2 hover:bg-green-800">

            🍽 My Meals

        </a>

        @endif

        <!-- Staff -->

        @if($role == 'staff')

        <div class="px-6 pt-4 pb-2 text-green-300 uppercase text-xs font-bold">

            Staff Portal

        </div>

        <a href="{{ route('member.meals') }}"
class="block px-10 py-2 hover:bg-green-800
{{ request()->routeIs('member.meals*') ? 'bg-green-800 border-l-4 border-yellow-400' : '' }}">

🍽 My Meals

</a>

        @endif

        </nav>

        <!-- Footer -->

        <div class="bg-green-900 p-6 text-center text-sm text-yellow-300 border-t border-green-700">

            Ad Majorem Dei Gloriam

        </div>

    </aside>

    <!-- Main Content -->

    <main class="flex-1 overflow-auto">

        <!-- Header -->

        <header class="bg-white shadow px-8 py-5 flex justify-between items-center">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    @yield('title', 'Dashboard')

                </h2>

                <p class="text-gray-500">

                    Loyola House Community Management System

                </p>

            </div>

            <div class="flex items-center space-x-5">

    <div class="text-right">

        <p class="font-semibold text-gray-800">
            {{ Auth::user()->first_name }}
            {{ Auth::user()->last_name }}
        </p>

        <span class="inline-block mt-1 px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs font-semibold">
            {{ Auth::user()->role->name }}
        </span>

    </div>

    <div>

        @if(Auth::user()->profile_photo)

            <img src="{{ asset('storage/'.Auth::user()->profile_photo) }}"
                 class="w-12 h-12 rounded-full object-cover border">

        @else

            <div class="w-12 h-12 rounded-full bg-green-900 text-white flex items-center justify-center font-bold">
                {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
            </div>

        @endif

    </div>

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            type="submit"
            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2 rounded-lg transition">
            Logout
        </button>
    </form>

</div>

        </header>

        <!-- Page Content -->

        <section class="p-8">

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>