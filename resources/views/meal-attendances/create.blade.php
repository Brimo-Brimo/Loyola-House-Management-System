@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-3xl font-bold text-green-900 mb-6">

        Record Meal Attendance

    </h2>

    <form action="{{ route('meal-attendances.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-6">

            <div class="col-span-2">

                <label class="block mb-2 font-semibold">

                    Community Member

                </label>

                <select name="community_member_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                    <option value="">-- Select Member --</option>

                    @foreach($members as $member)

                        <option value="{{ $member->id }}">

                            {{ $member->first_name }}
                            {{ $member->last_name }}

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

            <div class="col-span-2">

                <label class="block mb-2 font-semibold">

                    Attendance Status

                </label>

                <select name="status"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Away">Away</option>
                    <option value="Excused">Excused</option>

                </select>

            </div>

        </div>

        <div class="mt-8 flex justify-between">

            <a href="{{ route('meal-attendances.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Cancel

            </a>

            <button
                class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                Save Attendance

            </button>

        </div>

    </form>

</div>

@endsection