@extends('layouts.app')

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Hi There! I'm {{ $user->name }}</h2>
            <p class="mb-5"><img src="{{ url($user->image) }}" alt="Image placeholder" class="img-fluid"></p>
            <p>{{$user->bio}}</p>
        </div>
    </div>
@endsection