<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ArchivedEvent;

class EventController extends Controller
{
    /**
     * Store a newly created event.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event_images', 'public');
        }

        // Create event
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Event added successfully!');
    }

    /**
     * Display all events on the news page.
     */
    public function showNews()
    {
        $events = Event::latest()->get();
        return view('news', compact('events'));
    }

    /**
     * Get events as JSON (for APIs or FullCalendar).
     */
    public function getEvents()
    {
        $events = Event::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'description' => $event->description,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'url' => route('events.show', $event->id), // Optional: link to event details
            ];
        });

        return response()->json($events);
    }

    public function show($id)
    {
        $news = Event::findOrFail($id);
        $relatedNews = Event::where('id', '!=', $id)
                            ->orderBy('start_date', 'desc')
                            ->paginate(4); // Change to paginate instead of take

        return view('news-details', compact('news', 'relatedNews'));
    }

    public function managePost()
    {
        $events = Event::all();
        return view('admin.managePost', compact('events'));
    }

    public function exportToPDF()
    {
        $news = Event::all();

        $pdf = Pdf::loadView('admin.pdfPost', compact('news'))->setPaper('a4', 'landscape');

        return $pdf->download('news_list.pdf');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.editPost', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            // Store the new image
            $event->image = $request->file('image')->store('event_images', 'public');
        }

        if ($event->save()) {
            return redirect()->route('admin.managePost')->with('success', 'Post updated successfully');
        }

        return redirect()->route('admin.managePost.edit', $id)->with('error', 'Failed to update post');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Archive the event
        $archivedEvent = new ArchivedEvent();
        $archivedEvent->id = $event->id;
        $archivedEvent->title = $event->title;
        $archivedEvent->description = $event->description;
        $archivedEvent->start_date = $event->start_date;
        $archivedEvent->end_date = $event->end_date;
        $archivedEvent->image = $event->image;
        $archivedEvent->created_at = $event->created_at;
        $archivedEvent->updated_at = $event->updated_at;
        $archivedEvent->save();

        if ($event->delete()) {
            return redirect()->route('admin.managePost')->with('success', 'Post deleted and archived successfully');
        }

        return redirect()->route('admin.managePost')->with('error', 'Failed to delete post');
    }

    public function getArchivedEvents()
    {
        $archivedEvents = ArchivedEvent::all();
        return view('admin.archivedEvents', compact('archivedEvents'));
    }
}
