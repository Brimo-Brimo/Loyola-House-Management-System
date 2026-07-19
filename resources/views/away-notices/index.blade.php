@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-green-900">

                Away Notices

            </h1>

            <p class="text-gray-600 mt-2">

                Manage community members who will be away.

            </p>

        </div>

        <a href="{{ route('away-notices.create') }}"
           class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

            + New Away Notice

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-800 p-4 rounded-lg">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Member</th>

                    <th class="p-4">Departure</th>

                    <th class="p-4">Return</th>

                    <th class="p-4">Destination</th>

                    <th class="p-4">Status</th>

                    <th class="p-4">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($awayNotices as $notice)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">

                        {{ $notice->member->first_name }}

                        {{ $notice->member->other_names }}

                        {{ $notice->member->last_name }}

                    </td>

                    <td class="text-center">

                        {{ $notice->departure_date->format('d M Y') }}

                    </td>

                    <td class="text-center">

                        {{ $notice->return_date->format('d M Y') }}

                    </td>

                    <td class="text-center">

                        {{ $notice->destination }}

                    </td>

                    <td class="text-center">

                        @if($notice->status=='Approved')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                Approved

                            </span>

                        @elseif($notice->status=='Pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                Pending

                            </span>

                        @elseif($notice->status=='Rejected')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                Rejected

                            </span>

                        @else

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                                Returned

                            </span>

                        @endif

                    </td>

                    <td class="text-center space-x-2">

                        <a href="{{ route('away-notices.edit',$notice) }}"
                           class="text-blue-600">

                            Edit

                        </a>

                        @if($notice->status=='Pending')

                            <a href="{{ route('away-notices.approve',$notice) }}"
                               class="text-green-600">

                                Approve

                            </a>

                            <a href="{{ route('away-notices.reject',$notice) }}"
                               class="text-red-600">

                                Reject

                            </a>

                        @endif

                        @if($notice->status=='Approved')

                            <a href="{{ route('away-notices.returned',$notice) }}"
                               class="text-purple-600">

                                Returned

                            </a>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-10 text-gray-500">

                        No away notices found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection