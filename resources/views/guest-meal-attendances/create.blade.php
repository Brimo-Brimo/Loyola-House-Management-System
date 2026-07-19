@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-8">
        Record Guest Meal Attendance
    </h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg mb-6">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guest-meal-attendances.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-semibold">
                    Guest
                </label>

                <select name="guest_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                    <option value="">Select Guest</option>

                    @foreach($guests as $guest)

                        <option value="{{ $guest->id }}">

                            {{ $guest->full_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Meal Date
                </label>

                <input type="date"
                       name="meal_date"
                       value="{{ date('Y-m-d') }}"
                       class="w-full border rounded-lg px-4 py-3"
                       required>

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Meal
                </label>

                <select name="meal"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                    <option value="Lunch">Lunch</option>

                    <option value="Supper">Supper</option>

                </select>

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Status
                </label>

                <select name="status"
                        class="w-full border rounded-lg px-4 py-3">

                    <option value="Present">
                        Present
                    </option>

                    <option value="Absent">
                        Absent
                    </option>

                </select>

            </div>

        </div>

        <div class="mt-8 flex justify-between">

            <a href="{{ route('guest-meal-attendances.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Save Attendance

            </button>

        </div>

    </form>

</div>

@endsection