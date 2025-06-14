<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    //
    public function index(){
        $notes = Note::orderBy('created_at', 'desc')->get();
        return view('notes.index', compact('notes'));
    }


    public function store(Request $request){

        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'nullable|string',
        ]);

        Note::create($data);
        return back();
    }

    public function destroy(Note $note){
        $note->delete();
        return back();
    }   
}
