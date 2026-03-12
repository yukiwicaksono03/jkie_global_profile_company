<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(){
        $event = Event::latest()->paginate(10);
        return view("dashboard-event", compact("event"));
    }
    public function create(){
        return view("input.event");
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('input.event', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'desc'       => 'required|string',
            'date'       => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time'   => 'nullable|date_format:H:i',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,webp|max:2048',
        ]);

        $endTime = ($request->boolean('until_finish') || !$request->end_time) 
            ? null 
            : $request->end_time;

        $hasConflict = Event::where('date', $request->date)
            ->where(function ($query) use ($request, $endTime) {
                $query->whereNull('end_time')
                    ->where('start_time', '<=', $request->start_time);

                if ($endTime) {
                    $query->orWhere(function ($q) use ($request, $endTime) {
                        $q->where('start_time', '<', $endTime)
                        ->where('end_time', '>', $request->start_time);
                    });
                }
            })
            ->exists();

        if ($hasConflict) {
            return back()
                ->withErrors(['start_time' => 'Jadwal bentrok dengan event lain'])
                ->withInput();
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('events', 'public');
        }

        Event::create([
            'name'       => $request->name,
            'desc'       => $request->desc,
            'date'       => $request->date,
            'start_time' => $request->start_time,
            'end_time'   => $endTime,
            'photo'      => $photoPath,
        ]);

        return redirect()
            ->route('admin.event')
            ->with('success', 'Event berhasil ditambahkan!');

    }
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:255',
            'desc'       => 'required|string',
            'date'       => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'nullable',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,webp|max:2048',
        ]);

        $endTime = ($request->boolean('until_finish') || !$request->end_time) 
            ? null 
            : $request->end_time;

        $hasConflict = Event::where('date', $request->date)
            ->where('id', '!=', $event->id)
            ->where(function ($query) use ($request, $endTime) {
                $query->whereNull('end_time')
                    ->where('start_time', '<=', $request->start_time);

                if ($endTime) {
                    $query->orWhere(function ($q) use ($request, $endTime) {
                        $q->where('start_time', '<', $endTime)
                        ->where('end_time', '>', $request->start_time);
                    });
                }
            })
            ->exists();

        if ($hasConflict) {
            return back()
                ->withErrors(['start_time' => 'Jadwal bentrok dengan event lain'])
                ->withInput();
        }

        $photoPath = $event->photo;

        if ($request->hasFile('photo')) {
            if ($event->photo && \Storage::disk('public')->exists($event->photo)) {
                \Storage::disk('public')->delete($event->photo);
            }

            $photoPath = $request->file('photo')->store('events', 'public');
        }

        $event->update([
            'name'       => $request->name,
            'desc'       => $request->desc,
            'date'       => $request->date,
            'start_time' => $request->start_time,
            'end_time'   => $endTime, 
            'photo'      => $photoPath,
        ]);

        return redirect()
            ->route('admin.event')
            ->with('success', 'Event berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->photo && \Storage::disk('public')->exists($event->photo)) {
            \Storage::disk('public')->delete($event->photo);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event berhasil dihapus!');
    }
}
