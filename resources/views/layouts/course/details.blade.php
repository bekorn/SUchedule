<section class="course_details">

    <span class="credits">3 Credits</span>

    <div class="primary-instructor">
        <img src="{{ asset('media/default_profile_picture.png') }}" class="profile">
        <span>Instructor's Name</span>
    </div>

    <span class="cdn">CDN 10234</span>

    <div class="instructors">
        @for( $i = 0 ; $i < mt_rand(0, 7) ; $i++ )
            <img src="{{ asset('media/default_profile_picture.png') }}" class="profile">
        @endfor
    </div>

</section>