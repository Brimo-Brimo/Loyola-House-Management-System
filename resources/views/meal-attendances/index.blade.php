@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">
                Meals & Attendance
            </h2>

            <p class="text-gray-500">
                Community Meal Attendance Records
            </p>

        </div>

        <a href="{{ route('meal-attendances.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

            + Record Attendance

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    @if($attendances->isEmpty())

        <div class="text-center py-12 text-gray-500">

            No meal attendance records found.

        </div>

    @else

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Member</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Meal</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($attendances as $attendance)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">
                        {{ $attendance->communityMember->first_name }}
                        {{ $attendance->communityMember->last_name }}
                    </td>

                    <td class="p-4">
                        {{ $attendance->meal_date }}
                    </td>

                    <td class="p-4">
                        {{ $attendance->meal }}
                    </td>

                    <td class="p-4">

                        @if($attendance->status == 'Present')

                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full">
                                Present
                            </span>

                        @elseif($attendance->status == 'Absent')

                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full">
                                Absent
                            </span>

                        @elseif($attendance->status == 'Away')

                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full">
                                Away
                            </span>

                        @else

                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                                Excused
                            </span>

                        @endif

                    </td>

                    <td class="p-4 text-center">

                        <a href="{{ route('meal-attendances.edit', $attendance) }}"
                           class="text-green-700 hover:text-green-900 font-medium mr-4">

                            ✏ Edit

                        </a>

                        <form action="{{ route('meal-attendances.destroy', $attendance) }}"
                              method="POST"
                              class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete this attendance record?')"
                                class="text-red-600 hover:text-red-800">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-6">

            {{ $attendances->links() }}

        </div>

    @endif

</div>

@endsection