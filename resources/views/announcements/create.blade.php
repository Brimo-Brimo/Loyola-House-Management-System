@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-green-900">
            New Announcement
        </h1>

        <p class="text-gray-500 mt-2">
            Create a community announcement
        </p>

    </div>

    @if ($errors->any())

        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">

            <ul class="list-disc ml-5">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form method="POST"
          action="{{ route('announcements.store') }}">

        @csrf

        <div class="bg-white rounded-xl shadow-lg p-8 space-y-6">

            <div>

                <label class="block font-semibold mb-2">

                    Title

                </label>

                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       class="w-full border rounded-lg p-3">

            </div>

            <div>

                <label class="block font-semibold mb-2">

                    Message

                </label>

                <textarea
                    name="message"
                    rows="6"
                    class="w-full border rounded-lg p-3">{{ old('message') }}</textarea>

            </div>

            <div>

                <label class="block font-semibold mb-2">

                    Audience

                </label>

                <select name="audience"
                        class="w-full border rounded-lg p-3">

                    <option value="Everyone">Everyone</option>

                    <option value="Community Members">
                        Community Members
                    </option>

                    <option value="Guests">
                        Guests
                    </option>

                    <option value="Kitchen Staff">
                        Kitchen Staff
                    </option>

                    <option value="Reception">
                        Reception
                    </option>

                    <option value="Administrators">
                        Administrators
                    </option>

                </select>

            </div>

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold mb-2">

                        Start Date

                    </label>

                    <input type="date"
                           name="start_date"
                           value="{{ old('start_date') }}"
                           class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block font-semibold mb-2">

                        End Date

                    </label>

                    <input type="date"
                           name="end_date"
                           value="{{ old('end_date') }}"
                           class="w-full border rounded-lg p-3">

                </div>

            </div>

            <div class="flex justify-end gap-3">

                <a href="{{ route('announcements.index') }}"
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg">

                    Cancel

                </a>

                <button type="submit"
                        class="bg-green-900 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                    Save Announcement

                </button>

            </div>

        </div>

    </form>

</div>

@endsection