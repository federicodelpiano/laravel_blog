<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::all()->load('user');
        return $entries;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $entry = Entry::find($id)->load('user');
        return view('entries.show')->with([ 'entry' => $entry ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $entry = Entry::find($id);
        return view('entries.edit')->with([ 'entry' => $entry ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entry = Entry::find($id);
        $entry->title = $request->title;
        $entry->content = $request->content;
        $entry->save();

        return redirect('/entries/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        //
    }
}
