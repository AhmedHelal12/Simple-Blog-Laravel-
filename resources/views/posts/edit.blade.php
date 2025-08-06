@extends('layout')

@section('title','Edit')

@section('content')
    
    <form method = "POST" action="{{ route('update',$post->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" value="{{$post->title}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">description</label>
        <input name="description" value="{{$post->description}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <select class="form-select" name="post_creator" id="">
            @foreach( $users as $user)

                <option @selected($user->id == $post->user_id) value="{{$user->id}}">
                        {{$user->name}}
                </option>
            @endforeach

        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection