@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">
                Floors
            </h2>

            <p class="text-gray-500">
                Manage Building Floors
            </p>

        </div>

        <a href="{{ route('floors.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

            + Add Floor

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    @if($floors->isEmpty())

        <div class="text-center py-12 text-gray-500">

            No floors have been created yet.

        </div>

    @else

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Building</th>

                    <th class="p-4 text-left">Wing</th>

                    <th class="p-4 text-left">Floor</th>

                    <th class="p-4 text-left">Code</th>

                    <th class="p-4 text-left">Status</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($floors as $floor)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">
                        {{ $floor->wing->building->name }}
                    </td>

                    <td class="p-4">
                        {{ $floor->wing->name }}
                    </td>

                    <td class="p-4 font-medium">
                        {{ $floor->name }}
                    </td>

                    <td class="p-4">
                        {{ $floor->code }}
                    </td>

                    <td class="p-4">

                        @if($floor->active)

                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                Active
                            </span>

                        @else

                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td class="p-4 text-center">

                        <a href="{{ route('floors.edit', $floor) }}"
                           class="text-green-700 hover:text-green-900 mr-4">

                            ✏ Edit

                        </a>

                        <form action="{{ route('floors.destroy', $floor) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Delete this floor?');">

                            @csrf
                            @method('DELETE')

                            <button
                                class="text-red-600 hover:text-red-800">

                                🗑 Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    @endif

</div>

@endsection