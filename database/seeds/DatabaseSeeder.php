<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = 30;

        function get_range( $size = 30 )
        {
//            global $size;
            $min = mt_rand(1, $size);
            $max = mt_rand($min, $size);
            return range( $min, $max );
        };

        function get_random( $size = 30 )
        {
//            global $size;
            return mt_rand( 1, $size );
        };



        factory( App\Models\User::class, $size )->create();
//            ->each( function ($u) {
//                $u->mono_schedules()->saveMany( factory( App\Models\MonoSchedule::class, mt_rand(0, 3) ) );
//            });

        factory( App\Models\Instructor::class, $size )->create();

        factory( App\Models\Requirement::class, $size )->create();

        factory( App\Models\Course::class, $size )->create()
            ->each( function ($c) {
                $c->completed_users()->attach(  get_range() );
                $c->instructors()->sync( [get_random() => ['primary' => false],
                                          get_random() => ['primary' => false],
                                          get_random() => ['primary' => false],
                                          get_random() => ['primary' => true]] );

                foreach ( factory( App\Models\Meeting::class, 3 )->make() as $m )
                {
                    $c->meetings()->save( $m );
                    $m->instructors()->attach( get_random() );
                }

                foreach ( factory( App\Models\Review::class, rand(0, 3) )->make() as $r)
                {
                    $r['user_id'] = get_random();
                    $r['instructor_id'] = get_Random();
                    $r['course_id'] = get_Random();
                    $c->reviews()->save( $r );
                    $r->users_liked()->attach( get_range() );
                }
            });

        foreach ( factory( App\Models\MonoSchedule::class, $size )->make() as $ms )
        {
            App\Models\User::find( get_random() )->mono_schedules()->save( $ms );
            $ms->courses()->sync( [get_random(), get_random(), get_random()] );
            $ms->users_applied()->attach( get_range(), ['active' => false] );
            $ms->users_liked()->attach( get_range() );
        }

        foreach ( factory( App\Models\PolySchedule::class, $size )->make() as $ps )
        {
            App\Models\User::find( get_random() )->poly_schedules()->save( $ps );
            $ps->mono_schedules()->sync( [get_random(), get_random(), get_random()] );
            $ps->users_applied()->attach( get_range(), ['active' => false] );
            $ps->users_liked()->attach( get_range() );
        }
        
    }
}
