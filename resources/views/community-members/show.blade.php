@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">
                Community Member Profile
            </h2>

            <p class="text-gray-500">
                Loyola House • Jesuit Eastern Africa Province
            </p>

        </div>

        <div>

            <a href="{{ route('community-members.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">

                ← Back

            </a>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <!-- Top Banner -->
        <div class="bg-green-900 h-28"></div>

        <div class="px-10 pb-10">

            <!-- Photo -->
            <div class="-mt-16">

                @if($member->photo)

                    <img
                        src="{{ asset('storage/community-members/'.$member->photo) }}"
                        class="w-36 h-36 rounded-full border-4 border-white object-cover shadow-lg">

                @else

                    <img
                        src="{{ asset('images/default-user.png') }}"
                        class="w-36 h-36 rounded-full border-4 border-white object-cover shadow-lg">

                @endif

            </div>

            <!-- Name -->

            <div class="mt-4">

                <h1 class="text-3xl font-bold text-gray-800">

                    {{ $member->first_name }}
                    {{ $member->other_names }}
                    {{ $member->last_name }}

                </h1>

                @if($member->religious_name)

                    <p class="text-lg text-gray-600 italic">

                        {{ $member->religious_name }}

                    </p>

                @endif

                <div class="mt-3">

                    <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full">

                        {{ $member->status }}

                    </span>

                </div>

            </div>

            <!-- Details -->

            <div class="grid grid-cols-2 gap-8 mt-10">

                <div>

                    <h3 class="font-bold text-green-900 mb-4">
                        Personal Details
                    </h3>

                    <table class="w-full">

                        <tr class="border-b">
                            <td class="py-3 font-semibold">First Name</td>
                            <td>{{ $member->first_name }}</td>
                        </tr>

                        <tr class="border-b">
                            <td class="py-3 font-semibold">Other Names</td>
                            <td>{{ $member->other_names }}</td>
                        </tr>

                        <tr class="border-b">
                            <td class="py-3 font-semibold">Last Name</td>
                            <td>{{ $member->last_name }}</td>
                        </tr>

                        <tr class="border-b">
                            <td class="py-3 font-semibold">Religious Name</td>
                            <td>{{ $member->religious_name }}</td>
                        </tr>

                    </table>

                </div>

                <div>

                    <h3 class="font-bold text-green-900 mb-4">
                        Contact & Residence
                    </h3>

                    <table class="w-full">

                        <tr class="border-b">
                            <td class="py-3 font-semibold">Email</td>
                            <td>{{ $member->email }}</td>
                        </tr>

                        <tr class="border-b">
                            <td class="py-3 font-semibold">Phone</td>
                            <td>{{ $member->phone }}</td>
                        </tr>

                        <tr class="border-b">
                            <td class="py-3 font-semibold">Community</td>
                            <td>{{ $member->community }}</td>
                        </tr>

                        <tr class="border-b">
                            <td class="py-3 font-semibold">Room</td>
                            <td>{{ $member->room }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            <!-- Buttons -->

            <div class="mt-10 flex space-x-4">

                <a href="{{ route('community-members.edit', $member) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg">

                    ✏ Edit Member

                </a>

            </div>

        </div>

    </div>

</div>

@endsection