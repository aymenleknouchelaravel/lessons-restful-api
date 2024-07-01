<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Tag;


class RelationshipController extends Controller
{
    public function user_lessons($id)
    {
        $user = User::findOrFail($id);

        $lessons = $user->lessons;
        return response()->json(['data' => $lessons], 200);
    }

    public function lesson_tags($id)
    {
        $lesson = Lesson::findOrFail($id);

        $tags = $lesson->tags;
        return response()->json(['data' => $tags], 200);
    }

    public function tag_lessons($id)
    {
        $tag = Tag::find($id);

        $lessons = $tag->lessons;
        return response()->json(['data' => $lessons], 200);
    }

}
