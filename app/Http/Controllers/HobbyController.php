<?php

namespace App\Http\Controllers;

use App\Hobby;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$hobbies = Hobby::all();
        //$hobbies = Hobby::paginate(10);

        $meldg_success = Session::get('meldg_success');

        $hobbies = Hobby::orderBy('created_at', 'DESC')->paginate(10);
        return view('hobby.index')->with(
            [
                'hobbies' => $hobbies,
                'meldg_success' => $meldg_success
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|min:3',
                'beschreibung' => 'required|min:5'
            ]
        );


        $hobby = new Hobby(
            [
                'name' => $request['name'],
                'beschreibung' => $request['beschreibung'],
                'user_id' => auth()->id()
            ]
        );
        $hobby->save();
        //return redirect('/hobby');

        /*
        return $this->index()->with([
            'meldg_success' => 'Das Hobby <b>' . $hobby->name . '</b> wurde angelegt'
        ]);
        */

        return redirect('/hobby/' . $hobby->id)->with('meldg_hinweis', 'Bitte weise ein paar Tags zu.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby)
    {

        $alleTags = Tag::all(); // Alle Tags holen
        $verwendeteTags = $hobby->tags;
        $verfuegbareTags = $alleTags->diff($verwendeteTags);

        $meldg_success = Session::get('meldg_success');
        $meldg_hinweis = Session::get('meldg_hinweis');

        return view('hobby.show')->with(
            [
                'hobby' => $hobby,
                'meldg_success' => $meldg_success,
                'meldg_hinweis' => $meldg_hinweis,
                'verfuegbareTags' => $verfuegbareTags
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobby $hobby)
    {
        return view('hobby.edit')->with('hobby', $hobby);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hobby $hobby)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'beschreibung' => 'required|min:5'
            ]
        );

        $hobby->update([
            'name' => $request->name,
            'beschreibung' => $request->beschreibung
        ]);

        return $this->index()->with([
            'meldg_success' => 'Das Hobby <b>' . $request->name . '</b> wurde bearbeitet'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        $old_name = $hobby->name;
        $hobby->delete();
        return back()->with([
            'meldg_success' => 'Das Hobby <b>' . $old_name . '</b> wurde gelöscht'
        ]);
    }
}
