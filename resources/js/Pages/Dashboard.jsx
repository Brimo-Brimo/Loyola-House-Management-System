import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, usePage } from '@inertiajs/react';
import {
    BarChart,
    Bar,
    XAxis,
    YAxis,
    Tooltip,
    ResponsiveContainer
} from 'recharts';

export default function Dashboard() {

    const {
        auth,
        totalMembers,
        totalStaff,
        totalGuests,
        totalRooms,
        totalBuildings,
        totalBookings
    } = usePage().props;

    const today = new Date();
const chartData = [

    {
        name: 'Members',
        total: totalMembers
    },

    {
        name: 'Staff',
        total: totalStaff
    },

    {
        name: 'Guests',
        total: totalGuests
    },

    {
        name: 'Rooms',
        total: totalRooms
    }

];
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-3xl font-bold text-green-900">
                    Loyola House Management System
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-8">
                <div className="mx-auto max-w-7xl px-6">

                    {/* Welcome */}

                    <div className="bg-gradient-to-r from-green-900 to-green-700 rounded-xl shadow-lg text-white p-8 mb-8">

                        <h1 className="text-4xl font-bold">
                            Welcome,
                        </h1>

                        <h2 className="text-2xl mt-2">
                            {auth.user.first_name} {auth.user.last_name}
                        </h2>

                        <p className="mt-4 text-green-100">
                            {today.toDateString()}
                        </p>

                    </div>

                    {/* Statistics */}

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <div className="bg-green-900 text-white rounded-xl shadow p-6">
                            <p className="uppercase text-sm">
                                Community Members
                            </p>

                            <h2 className="text-5xl font-bold mt-3">
                                {totalMembers}
                            </h2>
                        </div>

                        <div className="bg-blue-700 text-white rounded-xl shadow p-6">
                            <p className="uppercase text-sm">
                                Staff
                            </p>

                            <h2 className="text-5xl font-bold mt-3">
                                {totalStaff}
                            </h2>
                        </div>

                        <div className="bg-orange-600 text-white rounded-xl shadow p-6">
                            <p className="uppercase text-sm">
                                Guests
                            </p>

                            <h2 className="text-5xl font-bold mt-3">
                                {totalGuests}
                            </h2>
                        </div>

                        <div className="bg-red-700 text-white rounded-xl shadow p-6">
                            <p className="uppercase text-sm">
                                Rooms
                            </p>

                            <h2 className="text-5xl font-bold mt-3">
                                {totalRooms}
                            </h2>
                        </div>

                        <div className="bg-purple-700 text-white rounded-xl shadow p-6">
                            <p className="uppercase text-sm">
                                Buildings
                            </p>

                            <h2 className="text-5xl font-bold mt-3">
                                {totalBuildings}
                            </h2>
                        </div>

                        <div className="bg-indigo-700 text-white rounded-xl shadow p-6">
                            <p className="uppercase text-sm">
                                Room Bookings
                            </p>

                            <h2 className="text-5xl font-bold mt-3">
                                {totalBookings}
                            </h2>
                        </div>

                    </div>
                    {/* Second Statistics Row */}

<div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

    <div className="bg-purple-700 text-white rounded-xl p-6 shadow">
        <h3 className="uppercase text-sm">
            Buildings
        </h3>

        <p className="text-4xl font-bold mt-3">
            {totalBuildings}
        </p>
    </div>

    <div className="bg-pink-700 text-white rounded-xl p-6 shadow">
        <h3 className="uppercase text-sm">
            Room Bookings
        </h3>

        <p className="text-4xl font-bold mt-3">
            {totalBookings}
        </p>
    </div>

    <div className="bg-yellow-500 text-white rounded-xl p-6 shadow">
        <h3 className="uppercase text-sm">
            Today's Date
        </h3>

        <p className="text-xl font-bold mt-3">
            {today.toLocaleDateString()}
        </p>
    </div>

</div>

                                        {/* Quick Actions */}

                    <div className="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">

<a href="/community-members"
className="bg-green-100 hover:bg-green-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
👥
</div>

<p className="font-bold text-green-900">
Community Members
</p>

</a>


<a href="/staff"
className="bg-blue-100 hover:bg-blue-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
👔
</div>

<p className="font-bold text-blue-900">
Staff
</p>

</a>


<a href="/guests"
className="bg-orange-100 hover:bg-orange-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
🧳
</div>

<p className="font-bold text-orange-900">
Guests
</p>

</a>


<a href="/rooms"
className="bg-red-100 hover:bg-red-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
🛏️
</div>

<p className="font-bold text-red-900">
Rooms
</p>

</a>


<a href="/room-bookings"
className="bg-purple-100 hover:bg-purple-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
📅
</div>

<p className="font-bold text-purple-900">
Room Booking
</p>

</a>


<a href="/meal-bookings"
className="bg-green-100 hover:bg-green-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
🍽️
</div>

<p className="font-bold text-green-900">
Meal Booking
</p>

</a>


<a href="/announcements"
className="bg-gray-100 hover:bg-gray-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
📢
</div>

<p className="font-bold text-gray-900">
Announcements
</p>

</a>


<a href="/away-notices"
className="bg-indigo-100 hover:bg-indigo-200 rounded-xl p-6 text-center transition">

<div className="text-5xl mb-3">
🚶
</div>

<p className="font-bold text-indigo-900">
Away Notices
</p>

</a>

</div>
                    {/* System Overview */}

<div className="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">

    <div className="bg-white rounded-xl shadow p-6">

        <h2 className="text-2xl font-bold text-green-900 mb-4">
            System Summary
        </h2>

        <table className="w-full">

            <tbody>

                <tr className="border-b">
                    <td className="py-3 font-semibold">Buildings</td>
                    <td className="text-right">{totalBuildings}</td>
                </tr>

                <tr className="border-b">
                    <td className="py-3 font-semibold">Rooms</td>
                    <td className="text-right">{totalRooms}</td>
                </tr>

                <tr className="border-b">
                    <td className="py-3 font-semibold">Community Members</td>
                    <td className="text-right">{totalMembers}</td>
                </tr>

                <tr className="border-b">
                    <td className="py-3 font-semibold">Staff</td>
                    <td className="text-right">{totalStaff}</td>
                </tr>

                <tr className="border-b">
                    <td className="py-3 font-semibold">Guests</td>
                    <td className="text-right">{totalGuests}</td>
                </tr>

                <tr>
                    <td className="py-3 font-semibold">Room Bookings</td>
                    <td className="text-right">{totalBookings}</td>
                </tr>

            </tbody>

        </table>

    </div>

    <div className="bg-white rounded-xl shadow p-6">

        <h2 className="text-2xl font-bold text-green-900 mb-4">
            Administrator Notes
        </h2>

        <ul className="space-y-3 text-gray-700">

            <li>✓ Manage Buildings, Wings and Floors.</li>

            <li>✓ Allocate Rooms to Members and Guests.</li>

            <li>✓ Approve Room Bookings.</li>

            <li>✓ Manage Meal Attendance.</li>

            <li>✓ Publish Announcements.</li>

            <li>✓ Review Away Notices.</li>

        </ul>

    </div>
{/* Today's Summary */}

<div className="mt-10 bg-white rounded-xl shadow p-6">

    <h2 className="text-2xl font-bold text-green-900 mb-6">
        Today's Summary
    </h2>

    <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">

        <div className="text-center">
            <h3 className="text-gray-500">Members</h3>
            <p className="text-3xl font-bold text-green-900">
                {totalMembers}
            </p>
        </div>

        <div className="text-center">
            <h3 className="text-gray-500">Staff</h3>
            <p className="text-3xl font-bold text-blue-700">
                {totalStaff}
            </p>
        </div>

        <div className="text-center">
            <h3 className="text-gray-500">Guests</h3>
            <p className="text-3xl font-bold text-orange-600">
                {totalGuests}
            </p>
        </div>

        <div className="text-center">
            <h3 className="text-gray-500">Rooms</h3>
            <p className="text-3xl font-bold text-red-700">
                {totalRooms}
            </p>
        </div>

        <div className="text-center">
            <h3 className="text-gray-500">Buildings</h3>
            <p className="text-3xl font-bold text-purple-700">
                {totalBuildings}
            </p>
        </div>

        <div className="text-center">
            <h3 className="text-gray-500">Bookings</h3>
            <p className="text-3xl font-bold text-indigo-700">
                {totalBookings}
            </p>
        </div>

    </div>

</div>
{/* Recent Activity */}
{/* Dashboard Statistics Chart */}

<div className="mt-10 bg-white rounded-xl shadow p-6">

    <h2 className="text-2xl font-bold text-green-900 mb-6">

        Community Overview

    </h2>

    <div style={{ width: "100%", height: 350 }}>

        <ResponsiveContainer>

            <BarChart data={chartData}>

                <XAxis dataKey="name" />

                <YAxis />

                <Tooltip />

                <Bar
                    dataKey="total"
                    fill="#166534"
                    radius={[8,8,0,0]}
                />

            </BarChart>

        </ResponsiveContainer>

    </div>

</div>

<div className="mt-10 bg-white rounded-xl shadow p-6">

    <h2 className="text-2xl font-bold text-green-900 mb-6">
        Recent Activity
    </h2>

    <div className="space-y-4">

        <div className="flex justify-between border-b pb-3">

            <span>🛏 Room Booking</span>

            <span className="text-gray-500">
                No recent bookings
            </span>

        </div>

        <div className="flex justify-between border-b pb-3">

            <span>🍽 Meal Booking</span>

            <span className="text-gray-500">
                No recent meals
            </span>

        </div>

        <div className="flex justify-between border-b pb-3">

            <span>🧳 Guest Registration</span>

            <span className="text-gray-500">
                No guests today
            </span>

        </div>

        <div className="flex justify-between border-b pb-3">

            <span>📢 Announcements</span>

            <span className="text-gray-500">
                None today
            </span>

        </div>

        <div className="flex justify-between">

            <span>🏃 Away Notices</span>

            <span className="text-gray-500">
                None today
            </span>

        </div>

    </div>

</div>
</div>

{/* Footer */}

                    <div className="mt-10 text-center text-gray-500 text-sm">

                        © {new Date().getFullYear()} Loyola House Management System

                        <br />

                        Administrator Dashboard

                    </div>

                </div>
                
            </div>

        </AuthenticatedLayout>
    );
}