<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schedule;

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AwayNoticeController;
use App\Http\Controllers\BookingApprovalController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CommunityMemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GuestMealAttendanceController;
use App\Http\Controllers\GuestRoomAllocationController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\MealAttendanceController;
use App\Http\Controllers\MealBookingController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\MemberMealController;
use App\Http\Controllers\MyMealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\RoomAllocationController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\WingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth','verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');

    Route::resource('buildings', BuildingController::class)->except(['show','destroy']);
    Route::delete('/buildings/{building}',[BuildingController::class,'destroy'])->name('buildings.destroy');

    Route::resource('wings', WingController::class)->except(['show','destroy']);
    Route::resource('floors', FloorController::class);
    Route::resource('rooms', RoomController::class);

    Route::resource('community-members', CommunityMemberController::class)->except(['destroy']);

    Route::resource('guests', GuestController::class)->except(['show']);

    Route::resource('guest-room-allocations', GuestRoomAllocationController::class)
        ->except(['show','edit','update']);

    Route::resource('guest-meal-attendances', GuestMealAttendanceController::class)
        ->except(['show','edit','update']);

    Route::resource('room-allocations', RoomAllocationController::class)
        ->except(['show','edit','update']);

    Route::resource('meal-attendances', MealAttendanceController::class);

    Route::resource('staff', StaffController::class);

    Route::get('/kitchen',[KitchenController::class,'index'])->name('kitchen.index');
    Route::post('/kitchen/save',[KitchenController::class,'saveMeals'])->name('kitchen.save');

    Route::get('/reception',[ReceptionController::class,'index'])->name('reception.index');
    Route::get('/reception-display',[ReceptionController::class,'index'])->name('reception.display');

    Route::get('/member/dashboard',[MemberDashboardController::class,'index'])
        ->name('member.dashboard');

    Route::view('/staff/dashboard','staff.dashboard')
        ->name('staff.dashboard');

    Route::view('/guest/dashboard','guest.dashboard')
        ->name('guest.dashboard');
            /*
    |--------------------------------------------------------------------------
    | Room Booking
    |--------------------------------------------------------------------------
    */

    Route::get('/book-room', [RoomBookingController::class, 'index'])
        ->name('room.booking');

    Route::post('/book-room', [RoomBookingController::class, 'store'])
        ->name('room.booking.store');

    Route::resource('room-bookings', RoomBookingController::class);

    Route::get('/room-bookings/pending',
        [RoomBookingController::class, 'pending'])
        ->name('room-bookings.pending');

    Route::patch('/room-bookings/{roomBooking}/approve',
        [RoomBookingController::class, 'approve'])
        ->name('room-bookings.approve');

    Route::patch('/room-bookings/{roomBooking}/reject',
        [RoomBookingController::class, 'reject'])
        ->name('room-bookings.reject');

    /*
    |--------------------------------------------------------------------------
    | Booking Approvals
    |--------------------------------------------------------------------------
    */

    Route::get('/booking-approvals',
        [BookingApprovalController::class, 'index'])
        ->name('booking-approvals.index');

    Route::put('/booking-approvals/{booking}/approve',
        [BookingApprovalController::class, 'approve'])
        ->name('booking-approvals.approve');

    Route::put('/booking-approvals/{booking}/reject',
        [BookingApprovalController::class, 'reject'])
        ->name('booking-approvals.reject');

    /*
    |--------------------------------------------------------------------------
    | Meal Booking
    |--------------------------------------------------------------------------
    */

    Route::resource('meal-bookings', MealBookingController::class);

    /*
    |--------------------------------------------------------------------------
    | My Meals
    |--------------------------------------------------------------------------
    */

    Route::get('/my-meals',
        [MyMealController::class, 'index'])
        ->name('my-meals');

    Route::post('/my-meals',
        [MyMealController::class, 'store'])
        ->name('my-meals.save');

    Route::get('/member/meals',
        [MemberMealController::class, 'index'])
        ->name('member.meals');

    Route::post('/member/meals',
        [MemberMealController::class, 'store'])
        ->name('member.meals.store');

    /*
    |--------------------------------------------------------------------------
    | Away Notices
    |--------------------------------------------------------------------------
    */

    Route::resource('away-notices', AwayNoticeController::class);

    Route::get('/away-notices/pending',
        [AwayNoticeController::class, 'pending'])
        ->name('away-notices.pending');

    Route::patch('/away-notices/{awayNotice}/approve',
        [AwayNoticeController::class, 'approve'])
        ->name('away-notices.approve');

    Route::patch('/away-notices/{awayNotice}/reject',
        [AwayNoticeController::class, 'reject'])
        ->name('away-notices.reject');

    Route::get('/away-notices/{awayNotice}/returned',
        [AwayNoticeController::class, 'returned'])
        ->name('away-notices.returned');

    /*
    |--------------------------------------------------------------------------
    | Announcements
    |--------------------------------------------------------------------------
    */

    Route::resource('announcements', AnnouncementController::class);

    Route::post('/announcements/{announcement}/approve',
        [AnnouncementController::class, 'approve'])
        ->name('announcements.approve');

    Route::post('/announcements/{announcement}/reject',
        [AnnouncementController::class, 'reject'])
        ->name('announcements.reject');

    /*
    |--------------------------------------------------------------------------
    | Scheduler
    |--------------------------------------------------------------------------
    */

    Schedule::command('loyola:process-bookings')
        ->everyMinute();
        });
    
require __DIR__.'/auth.php';