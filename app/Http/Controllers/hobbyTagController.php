<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;
use App\Tag;

class hobbyTagController extends Controller
{
    public function getFilteredHobbies($tag_id) {

        //echo "filtern nach tag id: " . $tag_id;
        $tag = new Tag();

        $filter = $tag::findOrFail($tag_id);

        $filteredHobbies = $filter->filteredHobbies()->paginate(10);

        return view('hobby.filteredByTag')->with(
            [
                'hobbies' => $filteredHobbies,
                'tag' => $filter
            ]
        );

    }


    public function attachTag($hobby_id, $tag_id){

        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);

        return back()->with('meldg_success', 'Der Tag <b>' .$tag->name . '</b> wurde hinzugefügt.');

    }


    public function detachTag($hobby_id, $tag_id){

        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);

        return back()->with('meldg_success', 'Der Tag <b>' .$tag->name . '</b> wurde entfernt.');

    }

}
