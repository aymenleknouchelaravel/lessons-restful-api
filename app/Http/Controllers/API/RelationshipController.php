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
        $lessons = User::find($id)->lessons;
        return $lessons;
    }
    public function lesson_tags($id)
    {
        $tags = Lesson::find($id)->tags;
        return $tags;
    }
    public function tag_lessons($id)
    {
        $lessons = Tag::find($id)->lessons;
        return $lessons;
    }
}
