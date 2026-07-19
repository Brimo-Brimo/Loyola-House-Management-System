@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg">

        <div class="bg-green-900 text-white p-6">

            <h1 class="text-3xl font-bold">

                {{ $announcement->title }}

            </h1>

            <p class="mt-2">

                Audience:
                <strong>{{ $announcement->audience }}</strong>

            </p>

        </div>

        <div class="p-8">

            <p class="whitespace-pre-line">

                {{ $announcement->message }}

            </p>

            <hr class="my-6">

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <strong>Starts:</strong>

                    {{ $announcement->start_date }}

                </div>

                <div>

                    <strong>Ends:</strong>

                    {{ $announcement->end_date }}

                </div>

                <div>

                    <strong>Status:</strong>

                    {{ $announcement->status }}

                </div>

                <div>

                    <strong>Pinned:</strong>

                    {{ $announcement->is_pinned ? 'Yes' : 'No' }}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection