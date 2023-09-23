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

        $userId = Auth::user()->id;
        $notes = Notes::where('user_id', $userId)->get();
        $notes = $notes->sortByDesc('created_at');

        return view('notes.index', compact('notes'));
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
        $userId = Auth::user()->id;

        Notes::create([
            'title' => $title,
            'note' => $note,
            'user_id' => $userId,
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

        $userId = Auth::user()->id;

        $notes = Notes::where('id', $id)->where('user_id', $userId)->first();

        if (!$notes) {
            return redirect('/note');
        }

        return view('notes.edit', compact('notes'));
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

        $userId = Auth::user()->id;

        Notes::where('id', $id)->where('user_id', $userId)->delete();

        return redirect('/note');
    }
}
