@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow-lg p-8">

    <div class="flex justify-between items-center mb-8">

        <h2 class="text-3xl font-bold text-green-900">

            Guest Meal Attendance

        </h2>

        <a href="{{ route('guest-meal-attendances.create') }}"
           class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

            + Record Meal

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    <table class="w-full border-collapse">

        <thead>

        <tr class="bg-green-900 text-white">

            <th class="p-3 text-left">Guest</th>

            <th class="p-3">Meal Date</th>

            <th class="p-3">Meal</th>

            <th class="p-3">Status</th>

            <th class="p-3">Action</th>

        </tr>

        </thead>

        <tbody>

        @forelse($attendances as $attendance)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-3">

                    {{ $attendance->guest->full_name }}

                </td>

                <td class="p-3 text-center">

                    {{ $attendance->meal_date }}

                </td>

                <td class="p-3 text-center">

                    {{ $attendance->meal }}

                </td>

                <td class="p-3 text-center">

                    @if($attendance->status == 'Present')

                        <span class="text-green-700 font-semibold">

                            Present

                        </span>

                    @else

                        <span class="text-red-700 font-semibold">

                            Absent

                        </span>

                    @endif

                </td>

                <td class="p-3 text-center">

                    <form method="POST"
                          action="{{ route('guest-meal-attendances.destroy', $attendance) }}">

                        @csrf

                        @method('DELETE')

                        <button onclick="return confirm('Delete this record?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5"
                    class="text-center text-gray-500 py-8">

                    No meal attendance recorded.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection