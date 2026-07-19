@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">
                Buildings
            </h2>

            <p class="text-gray-500">
                Loyola House Campus Buildings
            </p>

        </div>

        <a href="{{ route('buildings.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

            + Add Building

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    @if($buildings->isEmpty())

        <div class="text-center py-12 text-gray-500">

            No buildings have been created yet.

        </div>

    @else

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Building</th>

                    <th class="p-4 text-left">Code</th>

                    <th class="p-4 text-left">Type</th>

                    <th class="p-4 text-center">Floors</th>

                    <th class="p-4 text-left">Status</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($buildings as $building)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4 font-medium">
                        {{ $building->name }}
                    </td>

                    <td class="p-4">
                        {{ $building->code }}
                    </td>

                    <td class="p-4">
                        {{ $building->type }}
                    </td>

                    <td class="p-4 text-center">
                        {{ $building->floors }}
                    </td>

                    <td class="p-4">

                        @if($building->active)

                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                Active
                            </span>

                        @else

                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td class="p-4">

                        <div class="flex justify-center items-center gap-4">

                            <a href="{{ route('buildings.edit', $building) }}"
                               class="text-green-700 hover:text-green-900 font-medium">

                                ✏ Edit

                            </a>

                            <form action="{{ route('buildings.destroy', $building) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this building?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium">

                                    🗑 Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    @endif

</div>

@endsection