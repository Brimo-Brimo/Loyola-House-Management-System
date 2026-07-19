@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow">

    <!-- Header -->
    <div class="flex justify-between items-center p-6 border-b">

        <div>
            <h2 class="text-2xl font-bold text-green-900">
                Community Members
            </h2>

            <p class="text-gray-500">
                Loyola House Jesuit Community
            </p>
        </div>

        <a href="{{ route('community-members.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">
            + Add Member
        </a>

    </div>

    <!-- Success Message -->
    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 mx-6 mt-6 rounded">
            {{ session('success') }}
        </div>

    @endif

    <!-- Members Table -->
    <table class="w-full">

        <thead class="bg-green-900 text-white">

            <tr>
                <th class="p-4 text-left">Member</th>
                <th class="p-4 text-left">Community</th>
                <th class="p-4 text-left">Room</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-center">Actions</th>
            </tr>

        </thead>

        <tbody>

        @forelse($members as $member)

            <tr class="border-b hover:bg-gray-50">

                <!-- Photo + Name -->
                <td class="p-4">

                    <div class="flex items-center space-x-3">

                        @if($member->photo)

                            <img
                                src="{{ asset('storage/community-members/'.$member->photo) }}"
                                alt="Member Photo"
                                class="w-12 h-12 rounded-full object-cover border border-gray-300">

                        @else

                            <img
                                src="{{ asset('images/default-user.jpg') }}"
                                alt="Default Photo"
                                class="w-12 h-12 rounded-full object-cover border border-gray-300">

                        @endif

                        <div>

                            <div class="font-semibold text-gray-800">

                                {{ $member->first_name }}
                                {{ $member->other_names }}
                                {{ $member->last_name }}

                            </div>

                            @if($member->religious_name)

                                <div class="text-sm text-gray-500 italic">

                                    {{ $member->religious_name }}

                                </div>

                            @endif

                        </div>

                    </div>

                </td>

                <!-- Community -->
                <td class="p-4">
                    {{ $member->community }}
                </td>

                <!-- Room -->
                <td class="p-4">
                    {{ $member->room }}
                </td>

                <!-- Status -->
                <td class="p-4">

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                        {{ $member->status }}

                    </span>

                </td>

                <!-- Actions -->
                <td class="p-4 text-center">

                    <a href="{{ route('community-members.show', $member) }}"
                       class="text-blue-600 hover:text-blue-800 font-medium mr-4">
                        👁 View
                    </a>

                    <a href="{{ route('community-members.edit', $member) }}"
                       class="text-green-600 hover:text-green-800 font-medium">
                        ✏ Edit
                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center p-10 text-gray-500">

                    No community members found.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection