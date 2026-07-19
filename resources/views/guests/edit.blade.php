@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Edit Guest

    </h2>

    <form action="{{ route('guests.update', $guest) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

            <!-- Full Name -->
            <div>

                <label class="block mb-2 font-semibold">

                    Full Name

                </label>

                <input
                    type="text"
                    name="full_name"
                    value="{{ old('full_name', $guest->full_name) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

            </div>

            <!-- Gender -->
            <div>

                <label class="block mb-2 font-semibold">

                    Gender

                </label>

                <select
                    name="gender"
                    class="w-full border rounded-lg px-4 py-3">

                    <option value="Male"
                        {{ old('gender', $guest->gender) == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender', $guest->gender) == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                </select>

            </div>

            <!-- Phone -->
            <div>

                <label class="block mb-2 font-semibold">

                    Phone

                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $guest->phone) }}"
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <!-- Email -->
            <div>

                <label class="block mb-2 font-semibold">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $guest->email) }}"
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <!-- Institution -->
            <div class="col-span-2">

                <label class="block mb-2 font-semibold">

                    Diocese / Congregation / Institution

                </label>

                <input
                    type="text"
                    name="institution"
                    value="{{ old('institution', $guest->institution) }}"
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <!-- Purpose -->
            <div class="col-span-2">

                <label class="block mb-2 font-semibold">

                    Purpose of Visit

                </label>

                <input
                    type="text"
                    name="purpose"
                    value="{{ old('purpose', $guest->purpose) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

            </div>

            <!-- Check In -->
            <div>

                <label class="block mb-2 font-semibold">

                    Check In

                </label>

                <input
                    type="date"
                    name="check_in"
                    value="{{ old('check_in', $guest->check_in) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

            </div>

            <!-- Expected Checkout -->
            <div>

                <label class="block mb-2 font-semibold">

                    Expected Check Out

                </label>

                <input
                    type="date"
                    name="expected_checkout"
                    value="{{ old('expected_checkout', $guest->expected_checkout) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

            </div>

            <!-- Status -->
            <div class="col-span-2">

                <label class="block mb-2 font-semibold">

                    Status

                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3">

                    <option value="Checked In"
                        {{ old('status', $guest->status) == 'Checked In' ? 'selected' : '' }}>
                        Checked In
                    </option>

                    <option value="Checked Out"
                        {{ old('status', $guest->status) == 'Checked Out' ? 'selected' : '' }}>
                        Checked Out
                    </option>

                </select>

            </div>

        </div>

        <div class="mt-8 flex justify-between">

            <a href="{{ route('guests.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Update Guest

            </button>

        </div>

    </form>

</div>

@endsection