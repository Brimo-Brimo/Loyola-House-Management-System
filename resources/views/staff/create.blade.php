@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg">

        <div class="bg-green-900 text-white px-8 py-5 rounded-t-xl">

            <h1 class="text-3xl font-bold">
                Register Staff Member
            </h1>

            <p class="text-green-100 mt-2">
                Loyola House Community Management System
            </p>

        </div>

        <form action="{{ route('staff.store') }}" method="POST">

            @csrf

            @if ($errors->any())

            <div class="mx-8 mt-6 bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded">

                <strong>Please correct the following errors:</strong>

                <ul class="list-disc ml-6 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-8">

                <div>
                    <label class="font-semibold">Staff Number</label>

                    <input
                        type="text"
                        name="staff_number"
                        value="{{ old('staff_number') }}"
                        class="w-full border rounded-lg p-3 mt-2">
                </div>

                <div>
                    <label class="font-semibold">Department</label>

                    <input
                        type="text"
                        name="department"
                        value="{{ old('department') }}"
                        class="w-full border rounded-lg p-3 mt-2"
                        required>
                </div>

                <div>
                    <label class="font-semibold">First Name</label>

                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        class="w-full border rounded-lg p-3 mt-2"
                        required>
                </div>

                <div>
                    <label class="font-semibold">Other Names</label>

                    <input
                        type="text"
                        name="other_names"
                        value="{{ old('other_names') }}"
                        class="w-full border rounded-lg p-3 mt-2">
                </div>

                <div>
                    <label class="font-semibold">Last Name</label>

                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        class="w-full border rounded-lg p-3 mt-2"
                        required>
                </div>

                <div>
                    <label class="font-semibold">Position</label>

                    <input
                        type="text"
                        name="position"
                        value="{{ old('position') }}"
                        class="w-full border rounded-lg p-3 mt-2"
                        required>
                </div>

                <div>
                    <label class="font-semibold">Phone</label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="w-full border rounded-lg p-3 mt-2">
                </div>

                <div>
                    <label class="font-semibold">Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border rounded-lg p-3 mt-2"
                        required>
                </div>

                <div>
                    <label class="font-semibold">Password</label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-lg p-3 mt-2"
                        required>

                    <small class="text-gray-500">
                        Minimum 8 characters
                    </small>
                </div>

                <div>
                    <label class="font-semibold">Confirm Password</label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border rounded-lg p-3 mt-2"
                        required>
                </div>

            </div>

            <div class="border-t px-8 py-6">

                <h2 class="font-bold text-xl mb-4">
                    Meal Preferences
                </h2>

                <div class="flex gap-10">

                    <label>
                        <input
                            type="checkbox"
                            name="takes_lunch"
                            {{ old('takes_lunch', true) ? 'checked' : '' }}>

                        Takes Lunch
                    </label>

                    <label>
                        <input
                            type="checkbox"
                            name="takes_supper"
                            {{ old('takes_supper', true) ? 'checked' : '' }}>

                        Takes Supper
                    </label>

                    <label>
                        <input
                            type="checkbox"
                            name="active"
                            {{ old('active', true) ? 'checked' : '' }}>

                        Active
                    </label>

                </div>

            </div>

            <div class="bg-gray-100 px-8 py-6 flex justify-end rounded-b-xl">

                <button
                    type="submit"
                    class="bg-green-900 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                    Save Staff Member

                </button>

            </div>

        </form>

    </div>

</div>

@endsection