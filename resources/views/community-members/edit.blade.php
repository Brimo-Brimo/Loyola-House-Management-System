@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto bg-white rounded-xl shadow">

    <div class="bg-green-900 text-white px-8 py-5 rounded-t-xl">

        <h2 class="text-2xl font-bold">
            Edit Community Member
        </h2>

        <p class="text-yellow-300">
            Loyola House • Jesuit Eastern Africa Province
        </p>

    </div>

    <form action="{{ route('community-members.update', $member) }}"
          method="POST"
          class="p-8">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="block font-medium mb-2">First Name</label>

                <input
                    type="text"
                    name="first_name"
                    value="{{ $member->first_name }}"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            <div class="mt-4">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Other Names
    </label>

    <input
        type="text"
        name="other_names"
        value="{{ old('other_names', $member->other_names) }}"
        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-700 focus:outline-none">
</div>

            <div>
                <label class="block font-medium mb-2">Last Name</label>

                <input
                    type="text"
                    name="last_name"
                    value="{{ $member->last_name }}"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block font-medium mb-2">Religious Name</label>

                <input
                    type="text"
                    name="religious_name"
                    value="{{ $member->religious_name }}"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block font-medium mb-2">Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ $member->email }}"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block font-medium mb-2">Phone</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ $member->phone }}"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block font-medium mb-2">Room</label>

                <input
                    type="text"
                    name="room"
                    value="{{ $member->room }}"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

        </div>

        <div class="mt-8 flex justify-end">

            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-lg">

                Update Member

            </button>

        </div>

    </form>

</div>

@endsection