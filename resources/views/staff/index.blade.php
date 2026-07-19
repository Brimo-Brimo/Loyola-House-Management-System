@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-green-900">

                Staff Management

            </h1>

            <p class="text-gray-500 mt-2">

                Manage Loyola House Staff

            </p>

        </div>

        <a href="{{ route('staff.create') }}"
           class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

            + Register Staff

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow">

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Staff No.</th>

                    <th class="p-4 text-left">Name</th>

                    <th class="p-4 text-left">Department</th>

                    <th class="p-4 text-left">Position</th>

                    <th class="p-4 text-center">Lunch</th>

                    <th class="p-4 text-center">Supper</th>

                    <th class="p-4 text-center">Status</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($staff as $member)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">

                        {{ $member->staff_number }}

                    </td>

                    <td class="p-4">

                        {{ $member->first_name }}
                        {{ $member->other_names }}
                        {{ $member->last_name }}

                    </td>

                    <td class="p-4">

                        {{ $member->department }}

                    </td>

                    <td class="p-4">

                        {{ $member->position }}

                    </td>

                    <td class="text-center">

                        {{ $member->takes_lunch ? '✔' : '✖' }}

                    </td>

                    <td class="text-center">

                        {{ $member->takes_supper ? '✔' : '✖' }}

                    </td>

                    <td class="text-center">

                        @if($member->active)

                            <span class="text-green-700 font-bold">
                                Active
                            </span>

                        @else

                            <span class="text-red-600 font-bold">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td class="text-center">

                        <a href="{{ route('staff.edit',$member) }}"
                           class="text-blue-700 font-semibold">

                            Edit

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        class="text-center py-8 text-gray-500">

                        No staff members have been registered.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection