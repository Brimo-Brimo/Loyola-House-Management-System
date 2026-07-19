@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Register Guest

    </h2>

    <form action="{{ route('guests.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-6">

            <div>

                <label class="block mb-2 font-semibold">Full Name</label>

                <input type="text"
                       name="full_name"
                       class="w-full border rounded-lg px-4 py-3"
                       required>

            </div>

            <div>

                <label class="block mb-2 font-semibold">Gender</label>

                <select name="gender"
                        class="w-full border rounded-lg px-4 py-3">

                    <option>Male</option>

                    <option>Female</option>

                </select>

            </div>

            <div>

                <label class="block mb-2 font-semibold">Phone</label>

                <input type="text"
                       name="phone"
                       class="w-full border rounded-lg px-4 py-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold">Email</label>

                <input type="email"
                       name="email"
                       class="w-full border rounded-lg px-4 py-3">

            </div>

            <div class="col-span-2">

                <label class="block mb-2 font-semibold">

                    Diocese / Congregation / Institution

                </label>

                <input type="text"
                       name="institution"
                       class="w-full border rounded-lg px-4 py-3">

            </div>

            <div class="col-span-2">

                <label class="block mb-2 font-semibold">

                    Purpose of Visit

                </label>

                <input type="text"
                       name="purpose"
                       class="w-full border rounded-lg px-4 py-3"
                       required>

            </div>

            <div>

                <label class="block mb-2 font-semibold">

                    Check In

                </label>

                <input type="date"
                       name="check_in"
                       value="{{ date('Y-m-d') }}"
                       class="w-full border rounded-lg px-4 py-3"
                       required>

            </div>

            <div>

                <label class="block mb-2 font-semibold">

                    Expected Check Out

                </label>

                <input type="date"
                       name="expected_checkout"
                       class="w-full border rounded-lg px-4 py-3"
                       required>

            </div>

        </div>

        <div class="mt-8 flex justify-between">

            <a href="{{ route('guests.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Save Guest

            </button>

        </div>

    </form>

</div>

@endsection