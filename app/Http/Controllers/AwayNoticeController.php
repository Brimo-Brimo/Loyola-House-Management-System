<?php

namespace App\Http\Controllers;

use App\Models\AwayNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AwayNoticeController extends Controller
{
    public function index()
    {
        $awayNotices = AwayNotice::with(['member','approver'])
                        ->latest()
                        ->get();

        return view('away-notices.index', compact('awayNotices'));
    }

    public function create()
    {
        return view('away-notices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'departure_date'=>'required|date',

            'departure_time'=>'nullable',

            'return_date'=>'required|date|after_or_equal:departure_date',

            'return_time'=>'nullable',

            'destination'=>'nullable|max:255',

            'reason'=>'nullable|max:1000',

        ]);

        $validated['user_id']=Auth::id();

        $validated['status']='Pending';

        AwayNotice::create($validated);

        return redirect()
            ->route('away-notices.index')
            ->with('success','Away notice submitted successfully.');
    }

    public function edit(AwayNotice $awayNotice)
    {
        return view('away-notices.edit', compact('awayNotice'));
    }

    public function update(Request $request, AwayNotice $awayNotice)
    {
        $validated = $request->validate([

            'departure_date'=>'required|date',

            'departure_time'=>'nullable',

            'return_date'=>'required|date',

            'return_time'=>'nullable',

            'destination'=>'nullable|max:255',

            'reason'=>'nullable|max:1000',

        ]);

        $awayNotice->update($validated);

        return redirect()
            ->route('away-notices.index')
            ->with('success','Away notice updated.');
    }

    public function destroy(AwayNotice $awayNotice)
    {
        $awayNotice->delete();

        return back()->with('success','Away notice deleted.');
    }

    public function approve(AwayNotice $awayNotice)
    {
        $awayNotice->update([

            'status'=>'Approved',

            'approved_by'=>Auth::id(),

            'approved_at'=>now()

        ]);

        return back()->with('success','Away notice approved.');
    }

    public function reject(AwayNotice $awayNotice)
    {
        $awayNotice->update([

            'status'=>'Rejected',

            'approved_by'=>Auth::id(),

            'approved_at'=>now()

        ]);

        return back()->with('success','Away notice rejected.');
    }

    public function returned(AwayNotice $awayNotice)
    {
        $awayNotice->update([

            'status'=>'Returned'

        ]);

        return back()->with('success','Member marked as returned.');
    }
}