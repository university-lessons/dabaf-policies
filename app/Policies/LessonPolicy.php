<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Models\User;

class LessonPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user):bool
    {
        return $user->isTeacher(); 
    }

    public function delete(User $user, Lesson $lesson)
    {
        return $user->id === $lesson->created_by;
    }
}
