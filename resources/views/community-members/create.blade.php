@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md">

    <div class="bg-green-900 text-white px-8 py-5 rounded-t-xl">
        <h2 class="text-2xl font-bold">
            Add Community Member
        </h2>

        <p class="text-yellow-300">
            Loyola House • Jesuit Eastern Africa Province
        </p>
    </div>

    <form action="{{ route('community-members.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @if ($errors->any())
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <strong>Please fix the following errors:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="p-8">

            {{-- Personal Information --}}
            <h3 class="text-lg font-semibold text-green-900 border-b pb-2 mb-6">
                Personal Information
            </h3>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block font-medium mb-2">
                        First Name
                    </label>

                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        class="w-full border rounded-lg px-4 py-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Other Names
                    </label>

                    <input
                        type="text"
                        name="other_names"
                        value="{{ old('other_names') }}"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Last Name
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        class="w-full border rounded-lg px-4 py-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Religious Name
                    </label>

                    <input
                        type="text"
                        name="religious_name"
                        value="{{ old('religious_name') }}"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Passport Photo
                    </label>

                    <input
                        type="file"
                        name="photo"
                        accept="image/*"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border rounded-lg px-4 py-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

            </div>

            {{-- Login Account --}}
            <h3 class="text-lg font-semibold text-green-900 border-b pb-2 mt-10 mb-6">
                Login Account
            </h3>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block font-medium mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-lg px-4 py-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border rounded-lg px-4 py-2"
                        required>
                </div>

            </div>

            {{-- Residence --}}
            <h3 class="text-lg font-semibold text-green-900 border-b pb-2 mt-10 mb-6">
                Residence
            </h3>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block font-medium mb-2">
                        Community
                    </label>

                    <select
                        name="community"
                        class="w-full border rounded-lg px-4 py-2">

                        <option value="Loyola House">
                            Loyola House
                        </option>

                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Room
                    </label>

                    <input
                        type="text"
                        name="room"
                        value="{{ old('room') }}"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-2">

                        <option value="Resident">Resident</option>
                        <option value="Guest">Guest</option>
                        <option value="Transferred">Transferred</option>

                    </select>
                </div>

            </div>

            <div class="mt-10 flex justify-end">

                <button
                    type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-lg">

                    Save Community Member

                </button>

            </div>

        </div>

    </form>

</div>

@endsection