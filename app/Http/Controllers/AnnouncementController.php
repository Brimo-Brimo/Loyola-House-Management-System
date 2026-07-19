<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display all announcements
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Save announcement
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|max:255',
            'message' => 'required',
            'audience' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',

        ]);

        $validated['user_id'] = Auth::id();

        $validated['status'] = 'Pending';

        $validated['is_active'] = true;

        $validated['is_pinned'] = false;

        Announcement::create($validated);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement submitted successfully.');
    }

    /**
     * Show one announcement
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Edit form
     */
    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update announcement
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([

            'title' => 'required|max:255',
            'message' => 'required',
            'audience' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_pinned' => 'required|boolean',

        ]);

        $announcement->update($validated);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement updated successfully.');
    }

    /**
     * Delete announcement
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }

    /**
     * Approve announcement
     */
    public function approve(Announcement $announcement)
    {
        $announcement->update([

            'status' => 'Approved',

            'approved_by' => Auth::id(),

            'approved_at' => now()

        ]);

        return back()->with('success', 'Announcement approved.');
    }

    /**
     * Reject announcement
     */
    public function reject(Announcement $announcement)
    {
        $announcement->update([

            'status' => 'Rejected',

            'approved_by' => Auth::id(),

            'approved_at' => now()

        ]);

        return back()->with('success', 'Announcement rejected.');
    }
}