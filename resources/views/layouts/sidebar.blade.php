<aside class="w-72 bg-green-900 text-white min-h-screen">

    <div class="p-6 border-b border-green-800">

        <h1 class="text-2xl font-bold">
            Loyola House
        </h1>

        <p class="text-green-200 text-sm">
            Management System
        </p>

    </div>

    <nav class="mt-6">

        <a href="{{ route('dashboard') }}"
           class="block px-6 py-3 hover:bg-green-800">
            🏠 Dashboard
        </a>

        <a href="{{ route('community-members.index') }}"
           class="block px-6 py-3 hover:bg-green-800">
            👥 Community Members
        </a>

        <div class="px-6 pt-5 pb-2 text-green-300 font-bold uppercase text-sm">
            Accommodation
        </div>

        <a href="{{ route('buildings.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Buildings
        </a>

        <a href="{{ route('wings.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Wings
        </a>

        <a href="{{ route('floors.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Floors
        </a>

        <a href="{{ route('rooms.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Rooms
        </a>

        <a href="{{ route('room-allocations.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Room Allocation
        </a>

        <div class="px-6 pt-5 pb-2 text-green-300 font-bold uppercase text-sm">
            Guests
        </div>

        <a href="{{ route('guests.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Guest Registration
        </a>

        <a href="{{ route('guest-room-allocations.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Guest Room Allocation
        </a>

        <div class="px-6 pt-5 pb-2 text-green-300 font-bold uppercase text-sm">
            Meals
        </div>

        <a href="{{ route('kitchen.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Kitchen Dashboard
        </a>

        <a href="{{ route('meal-attendances.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Community Attendance
        </a>

        <a href="{{ route('guest-meal-attendances.index') }}"
           class="block px-10 py-2 hover:bg-green-800">
            Guest Attendance
        </a>

        <div class="px-6 pt-5 pb-2 text-green-300 font-bold uppercase text-sm">
            Future Modules
        </div>

        <span class="block px-10 py-2 text-gray-300">
            📺 Reception Display
        </span>

        <span class="block px-10 py-2 text-gray-300">
            📢 Noticeboard
        </span>

        <span class="block px-10 py-2 text-gray-300">
            📊 Reports
        </span>

    </nav>

</aside>