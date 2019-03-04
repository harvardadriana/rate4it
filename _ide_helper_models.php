<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Instructor
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor query()
 */
	class Instructor extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Course
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Instructor[] $instructors
 * @property-read \App\Subject $subject
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 */
	class Course extends \Eloquent {}
}

namespace App{
/**
 * App\Subject
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject query()
 */
	class Subject extends \Eloquent {}
}

