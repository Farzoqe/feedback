<?php

namespace Farzoqe\Feedback\Http\Controllers;

use App\Http\Controllers\Controller;
use Farzoqe\Feedback\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FeedbackController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('feedback-editor');
        $feedbacks = Feedback::latest()->paginate(100);
        return view('feedback::feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Feedback::create([
            'user_id' => auth()->id(),
            'url' => $request->url,
            'subject' => $request->subject,
            'description' => $request->description,
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->status = 'Closed';
        $feedback->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        Gate::authorize('feedback-editor');
        $feedback->delete();
        return redirect()->back();
    }
}
