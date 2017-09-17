@extends('layouts.master')

@section('content')

    <div class="breakthrough">
        <h3>Course List</h3>
    </div>

    <div class="course">

        @foreach( $courses as $course )

            @include('layouts.course.single', compact('$course'))

        @endforeach

    </div>

    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In iste cum excepturi tempora id, consectetur, mollitia sapiente, corrupti molestias tempore dolorem ullam nobis. Rerum, repellat architecto voluptatibus nisi id. Fugit, temporibus architecto perferendis vel repellat accusantium doloremque cum labore aperiam.</div>
    <div>Velit distinctio maxime eius nihil adipisci temporibus, harum incidunt veritatis a aliquid nisi pariatur vero repudiandae iste amet esse iusto doloremque consequuntur. Dolor, dolores perspiciatis numquam optio expedita rem, natus a nemo voluptatum, doloribus, error dolorum eos ipsam itaque sed?</div>

    <div style="display: grid;grid-auto-flow: column;grid-gap: 1rem;">

        @include('layouts.course.single')

        <span>
            Consectetur esse debitis dicta sint veritatis libero porro nisi repellat iusto dolorem quam, cum excepturi fuga ipsum molestias illum facere praesentium ipsa inventore recusandae hic enim rerum ut. Eos, nobis culpa consectetur quo, saepe iste iusto suscipit voluptatem doloremque minus!
        </span>

    </div>

    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, dolorem.</div>
    <div>Eligendi vel molestiae neque ipsum omnis beatae similique voluptates placeat!</div>

    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia architecto porro voluptatem esse accusantium quos expedita earum natus ipsa doloribus magnam omnis libero, ratione at maiores amet sed nobis fugiat!</div>
    <div>Facere velit dolores accusamus ut eius vero voluptates, ea sequi veritatis incidunt? Dicta libero rerum ipsum nisi natus provident veritatis, velit nemo illum dolorem ipsam amet dolore veniam laborum. Voluptatem.</div>
    <div>Laborum labore, obcaecati officia. Labore laboriosam, obcaecati pariatur quos, quas magni consequatur illo reiciendis porro voluptas quisquam voluptates cum perferendis facilis fugit eius quae veritatis fuga sint, libero nemo dolores.</div>

@endsection
