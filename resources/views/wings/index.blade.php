@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-green-900">
                Wings
            </h2>

            <p class="text-gray-500">
                Manage Building Wings
            </p>

        </div>

        <a href="{{ route('wings.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

            + Add Wing

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    @if($wings->isEmpty())

        <div class="text-center py-12 text-gray-500">

            No wings have been created yet.

        </div>

    @else

        <table class="w-full">

            <thead class="bg-green-900 text-white">

                <tr>

                    <th class="p-4 text-left">Building</th>

                    <th class="p-4 text-left">Wing</th>

                    <th class="p-4 text-left">Code</th>

                    <th class="p-4 text-left">Status</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($wings as $wing)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">
                        {{ $wing->building->name }}
                    </td>

                    <td class="p-4 font-medium">
                        {{ $wing->name }}
                    </td>

                    <td class="p-4">
                        {{ $wing->code }}
                    </td>

                    <td class="p-4">

                        @if($wing->active)

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

                        <div class="flex justify-center gap-4">

                            <a href="{{ route('wings.edit', $wing) }}"
                               class="text-green-700 hover:text-green-900">

                                ✏ Edit

                            </a>

                            <form action="{{ route('wings.destroy', $wing) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this wing?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 hover:text-red-800">

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