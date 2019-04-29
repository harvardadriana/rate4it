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
 * App\Degree
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Degree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Degree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Degree query()
 */
	class Degree extends \Eloquent {}
}

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
 * App\Review
 *
 * @property-read \App\Course $course
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review query()
 */
	class Review extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \App\Degree $degree
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
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
 * @property-read \App\Rate $rate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @property-read \App\Subject $subject
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 */
	class Course extends \Eloquent {}
}

namespace App{
/**
 * App\Rate
 *
 * @property-read \App\Course $course
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rate query()
 */
	class Rate extends \Eloquent {}
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

