@extends('layout')

@section('title','Create')

@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>  
    @endif
    <form method = "POST" action="{{route('store')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input required type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">description</label>
        <input required name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <select required class="form-select" name="post_creator" id="">
            @foreach( $users as $user)
                dd($user)
                <option value="{{$user->id}}">
                        {{$user->name}}
                </option>
            @endforeach

        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection