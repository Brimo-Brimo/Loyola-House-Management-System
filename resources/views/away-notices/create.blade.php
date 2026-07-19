@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg">

        <div class="bg-green-900 text-white p-6">

            <h1 class="text-3xl font-bold">

                New Away Notice

            </h1>

            <p class="mt-2 text-green-100">

                Notify the community when you will be away.

            </p>

        </div>

        <form action="{{ route('away-notices.store') }}" method="POST">

            @csrf

            <div class="p-8 grid grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold mb-2">

                        Departure Date

                    </label>

                    <input
                        type="date"
                        name="departure_date"
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
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block font-semibold mb-2">

                        Return Date

                    </label>

                    <input
                        type="date"
                        name="return_date"
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
                        class="w-full border rounded-lg p-3">

                </div>

                <div class="col-span-2">

                    <label class="block font-semibold mb-2">

                        Destination

                    </label>

                    <input
                        type="text"
                        name="destination"
                        class="w-full border rounded-lg p-3"
                        placeholder="Destination">

                </div>

                <div class="col-span-2">

                    <label class="block font-semibold mb-2">

                        Reason

                    </label>

                    <textarea
                        name="reason"
                        rows="5"
                        class="w-full border rounded-lg p-3"
                        placeholder="Reason for absence"></textarea>

                </div>

            </div>

            <div class="bg-gray-100 p-6 flex justify-end">

                <button
                    type="submit"
                    class="bg-green-900 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                    Submit Away Notice

                </button>

            </div>

        </form>

    </div>

</div>

@endsection