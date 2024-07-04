<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Tag;


class RelationshipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function user_lessons($id)
    {
        $lessons = User::findOrFail($id)->lessons;
        $fields = array();
        $filtred = array();
        foreach ($lessons as $lesson) {
            $fields['title'] = $lesson->title;
            $fields['body'] = $lesson->body;
            $filtred[] = $fields;
        }

        return response()->json(
            ['data' => $filtred],
            200
        );
    }

    public function lesson_tags($id, Request $request)
    {
        $lesson = Lesson::findOrFail($id);

        // Get tags associated with the lesson
        $tags = $lesson->tags();

        // Paginate the tags
        $perPage = $request->query('per_page', 10); // Number of items per page, default 10
        $tags = $tags->paginate($perPage);

        // Return paginated tags as JSON response
        return response()->json(['data' => $tags], 200);
    }

    public function tag_lessons($id)
    {
        $tag = Tag::find($id);

        $lessons = $tag->lessons;

        // Return lessons as JSON response
        return response()->json(['data' => $lessons], 200);
    }

}
