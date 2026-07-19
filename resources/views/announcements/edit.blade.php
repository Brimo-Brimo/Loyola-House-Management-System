@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg">

        <div class="bg-green-900 text-white p-6 rounded-t-xl">

            <h1 class="text-3xl font-bold">
                Edit Announcement
            </h1>

        </div>

        <form method="POST"
              action="{{ route('announcements.update',$announcement) }}"
              class="p-8 space-y-6">

            @csrf
            @method('PUT')

            <div>

                <label class="block font-semibold mb-2">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title',$announcement->title) }}"
                    class="w-full border rounded-lg p-3">

            </div>

            <div>

                <label class="block font-semibold mb-2">
                    Message
                </label>

                <textarea
                    name="message"
                    rows="8"
                    class="w-full border rounded-lg p-3">{{ old('message',$announcement->message) }}</textarea>

            </div>

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold mb-2">
                        Audience
                    </label>

                    <select
                        name="audience"
                        class="w-full border rounded-lg p-3">

                        @foreach([
                            'Everyone',
                            'Community Members',
                            'Guests',
                            'Kitchen Staff',
                            'Reception',
                            'Administrators'
                        ] as $audience)

                            <option
                                value="{{ $audience }}"
                                @selected($announcement->audience==$audience)>

                                {{ $audience }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Pin Announcement
                    </label>

                    <select
                        name="is_pinned"
                        class="w-full border rounded-lg p-3">

                        <option value="0"
                            @selected(!$announcement->is_pinned)>
                            No
                        </option>

                        <option value="1"
                            @selected($announcement->is_pinned)>
                            Yes
                        </option>

                    </select>

                </div>

            </div>

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold mb-2">
                        Start Date
                    </label>

                    <input
                        type="date"
                        name="start_date"
                        value="{{ old('start_date',$announcement->start_date->format('Y-m-d')) }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        End Date
                    </label>

                    <input
                        type="date"
                        name="end_date"
                        value="{{ optional($announcement->end_date)->format('Y-m-d') }}"
                        class="w-full border rounded-lg p-3">

                </div>

            </div>

            <div class="flex justify-end">

                <button
                    class="bg-green-900 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                    Update Announcement

                </button>

            </div>

        </form>

    </div>

</div>

@endsection