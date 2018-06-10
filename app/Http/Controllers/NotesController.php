<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allNotes = Note::latest()->get();

        return response()->json($allNotes);
    }
    public function favourites()
    {
        $allNotes = Note::where('is_favourite', true)->latest()->get();

        return response()->json($allNotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateNoteData = $request->validate([
            'title' => 'required',
            'is_favourite'=> 'required'
        ]);

        $note = Note::create($validateNoteData);

        return response()->json($note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note= Note::find($id)->update(['title'=>$request->get('title')]);

        return response()->json($note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);

        return response()->json($note->delete());
    }

    public function toggleFavourite($id)
    {
        $note = Note::find($id);
        $note = $note->update(['is_favourite'=> !$note->is_favourite]);

        return response()->json($note);
    }
}
