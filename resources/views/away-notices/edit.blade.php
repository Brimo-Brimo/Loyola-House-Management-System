@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg">

        <div class="bg-green-900 text-white p-6">

            <h1 class="text-3xl font-bold">

                Edit Away Notice

            </h1>

            <p class="mt-2 text-green-100">

                Update this away notice.

            </p>

        </div>

        <form action="{{ route('away-notices.update',$awayNotice) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="p-8 grid grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold mb-2">

                        Departure Date

                    </label>

                    <input
                        type="date"
                        name="departure_date"
                        value="{{ old('departure_date',$awayNotice->departure_date->format('Y-m-d')) }}"
                        class="w-full border rounded-lg p-3"
                        required>

                </div>

                <div>

                    <label class="block font-semibold mb-2">

                        Departure Time

                    </label>

                    <input
                        type="time"
                        name="departure_time"
                        value="{{ old('departure_time',$awayNotice->departure_time) }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block font-semibold mb-2">

                        Return Date

                    </label>

                    <input
                        type="date"
                        name="return_date"
                        value="{{ old('return_date',$awayNotice->return_date->format('Y-m-d')) }}"
                        class="w-full border rounded-lg p-3"
                        required>

                </div>

                <div>

                    <label class="block font-semibold mb-2">

                        Return Time

                    </label>

                    <input
                        type="time"
                        name="return_time"
                        value="{{ old('return_time',$awayNotice->return_time) }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div class="col-span-2">

                    <label class="block font-semibold mb-2">

                        Destination

                    </label>

                    <input
                        type="text"
                        name="destination"
                        value="{{ old('destination',$awayNotice->destination) }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div class="col-span-2">

                    <label class="block font-semibold mb-2">

                        Reason

                    </label>

                    <textarea
                        name="reason"
                        rows="5"
                        class="w-full border rounded-lg p-3">{{ old('reason',$awayNotice->reason) }}</textarea>

                </div>

            </div>

            <div class="bg-gray-100 p-6 flex justify-between">

                <a href="{{ route('away-notices.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="bg-green-900 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                    Update Away Notice

                </button>

            </div>

        </form>

    </div>

</div>

@endsection