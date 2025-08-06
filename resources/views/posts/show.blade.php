@extends('layout')

@section('title','show')

@section('content')

    <div class="card">
    <div class="card-header">
        {{$post['title']}}
    </div>
    <div class="card-body">
        <h1>
            {{$post['description']}}
        </h1>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    </div>
    </div>

    <div class="card">
        <div class="card-header">
            Name: {{$post->user ? $post->user->name : 'not found'}}
        </div>
        <div class="card-body">
            <h1>
                {{$post->user ? $post->user->email : 'not found'}}
            </h1>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
@endsection