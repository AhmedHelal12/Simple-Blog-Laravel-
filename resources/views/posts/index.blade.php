@extends('layout')

@section('title','Home')

@section('content')
    <div class="text-center">
      <a href="{{route('create')}}" type="button" class="btn btn-success">Create</a>
    </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted_by</th>
            <th scope="col">Created_at</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->user ? $post->user->name : 'not found' }}</td>
            <td>{{ $post->created_at->format('Y-m-d') }}</td>
            <td>
              <a href="{{ route('show',$post['id'])}}" class="btn btn-info">View</a>
              <a href="{{route('edit',$post['id'])}}" class="btn btn-secondary">Edit</a>
              <form action="{{route('delete',$post['id'])}}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection

