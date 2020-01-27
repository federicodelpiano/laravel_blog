<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|max:100',
            'content' => 'required',
        ]);

        $entry = new Entry;
        $entry->title = $request->title;
        $entry->content = $request->content;
        $entry->user_id = $request->user()->id;
        $entry->save();

        return redirect()->route('home');
    }

    public function show(Request $request, $id)
    {
        $entry = Entry::find($id)->load('user');
        return view('entries.show')->with([ 'entry' => $entry ]);
    }

    public function edit(Request $request, $id)
    {
        $entry = Entry::find($id);
        return view('entries.edit')->with([ 'entry' => $entry ]);
    }

    public function update(Request $request, $id)
    {
        $entry = Entry::find($id);
        $entry->title = $request->title;
        $entry->content = $request->content;
        $entry->save();

        return redirect('/entries/' . $id);
    }

    public function destroy(Request $request, $id)
    {
        $entry = Entry::find($id);
        $entry->delete();

        return redirect()->route('home');
    }
}
