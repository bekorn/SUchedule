<?php
//Debugbar::info( $course );

//dd($course->instructors[1]->pivot->primary);

// Course
["id" => 1,
"cdn" => 1,
"term" => "Fall 2016-2017",
"code" => "100",
"title" => "Et est nobis animi vel.",
"section" => "y",
"type" => "course",
"faculty" => "FMAN",
"ECTS" => 1,
"su_credit" => 8,
"capacity" => 89,
"remaining" => 89,
"catalog_entry_link" => null,
"detailed_information_link" => null,
"rating" => "2.00936000",
"number_of_ratings" => 13];

//  Instructor
["id" => 13,
"name" => "Dr. Rodger Funk Jr.",
"email" => "Dr..Rodger.Funk.Jr.@sabanciuniv.edu"];
//->pivot
["course_id" => 1,
"instructor_id" => 13,
"primary" => 1];

$primary_instructor = null;

foreach ($course->instructors as $instructor)
{
    if( $instructor->pivot->primary == 1 ) {
        $primary_instructor = $instructor;
        unset( $instructor );
        break;
    }
}


//  Meeting
["id" => 1,
"day" => "T",
"start_time" => "12:57:56",
"end_time" => "19:31:48",
"type" => "meeting",
"start_date" => "1971-03-27",
"end_date" => "1986-09-29",
"schedule_type" => "schedule_type",
"course_id" => 1];
?>

<section class="course_card">

    <span class="rating" style="--rating_color : hsl( {{ $course->rating * 72 }}, 48%, 48% );">{{ round( $course->rating, 1 ) }}</span>

    <h3 class="code">{{ $course->code }}</h3>

    {{--<span class="more"></span>--}}
    <span class="more">
        <svg width='20' height='15' style=''>
            <polyline points="5 5 10 10 15 5" stroke="rgba(0,0,0,0.8)" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="miter" fill="none" />
            more
        </svg>
    </span>

    <span class="title">{{ $course->title }}</span>

    <span class="credits">SU:{{ $course->su_credit }} | ECTS:{{ $course->ECTS }}</span>

    <div class="primary-instructor">
        <img src="{{ asset('media/default_profile_picture.png') }}" class="profile">
        <a href="{{ route('instructor', $primary_instructor->id) }}">
            {{ $primary_instructor->name }}
        </a>
    </div>

    <span class="cdn">CDN {{ $course->cdn }}</span>

    <div class="instructors">
        @foreach( $course->instructors as $instructor )
            <a href="{{ route('instructor', $instructor->id) }}">
                <img src="{{ asset('media/default_profile_picture.png') }}" class="profile">
            </a>
        @endforeach
    </div>

</section>

@include('layouts.course.details')