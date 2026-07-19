<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Reception Display</title>

<meta http-equiv="refresh" content="30">

<script src="https://cdn.tailwindcss.com"></script>

<style>

.slide{

display:none;

}

.active{

display:flex;

}

</style>

</head>

<body class="bg-green-900 text-white overflow-hidden">

<div id="slides" class="h-screen">

<!-- Slide 1 -->

<div class="slide active flex-col justify-center items-center h-screen">

<h1 class="text-7xl font-bold">

WELCOME TO

</h1>

<h2 class="text-8xl mt-8 text-yellow-300">

LOYOLA HOUSE

</h2>

<p class="mt-10 text-3xl">

Ad Majorem Dei Gloriam

</p>

</div>

<!-- Slide 2 -->

<div class="slide flex-col justify-center items-center h-screen">

<h1 class="text-6xl mb-10">

Today's Meals

</h1>

<div class="flex gap-20">

<div>

<p class="text-4xl">

Lunch

</p>

<p class="text-8xl font-bold">

{{ $lunch }}

</p>

</div>

<div>

<p class="text-4xl">

Supper

</p>

<p class="text-8xl font-bold">

{{ $supper }}

</p>

</div>

</div>

</div>

<!-- Slide 3 -->

<div class="slide flex-col p-20 h-screen">

<h1 class="text-5xl mb-8">

Expected Arrivals

</h1>

@forelse($arrivals as $guest)

<div class="text-3xl py-2">

{{ $guest->guest_name }}

—

Room {{ $guest->room->room_number }}

—

{{ $guest->arrival_time }}

</div>

@empty

<div class="text-3xl">

No arrivals today.

</div>

@endforelse

</div>

<!-- Slide 4 -->

<div class="slide flex-col p-20 h-screen">

<h1 class="text-5xl mb-8">

Announcements

</h1>

@foreach($announcements as $item)

<div class="text-3xl py-3">

• {{ $item->title }}

</div>

@endforeach

</div>

</div>

<script>

let slides=document.querySelectorAll(".slide");

let current=0;

setInterval(function(){

slides[current].classList.remove("active");

current++;

if(current>=slides.length){

current=0;

}

slides[current].classList.add("active");

},8000);

</script>

</body>

</html>