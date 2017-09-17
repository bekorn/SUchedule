@extends('layouts.master')

@section('content')

    <a href="{{route("google-auth")}}" style="color: dodgerblue">
        <h3>
            Login with your Sabanciuniv Google account
        </h3>
    </a>

    @if( $errors->any() )
        <div class="error-list" style="display: flex; align-items: center;
        color: red; background-color: ghostwhite; border-radius: 4px;
        box-shadow: 0 2px 4px grey, 0 0 0 6px red; padding: 0.4rem;">
            @foreach( $errors->all() as $error )
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

@endsection
