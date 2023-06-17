<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check())
        {
            return redirect('/');
        }

        $note = Notes::get();

        $note = [
            'note' => $note
        ];

        return view('notes.index', $note);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $title = $request->input('title');
        $note = $request->input('note');

        Notes::create([
            'title' => $title,
            'note' => $note,
        ]);

        return redirect('/note');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if(Auth::check()) {
            return redirect('/note');
        }

        return view('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $selected = Notes::where('id', $id)->first();
    
        $note = [
            'note' => $selected
        ];

        return view('notes.edit', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $input = $request->all();

        $title = $request->input('title');
        $note = $request->input('note');

        Notes::where('id', $id)->update([
            'title' => $input['title'],
            'note' => $input['note']
        ]);

        return redirect('/note');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        Notes::where('id', $id)->delete();

        return redirect('/note');
    }
}
