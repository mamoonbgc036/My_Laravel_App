@extends('layouts.app')
@section('content')
@if($posts->count())
            @foreach($posts as $post)
                    <div id="post">
                        {{ $post->body }} posted at <h4>{{ $post->created_at->diffForHumans() }}</h4>
                        @can('delete', $post)
                            <form action="{{ route('post.destroy', $post->id ) }}" method="post">
                                @csrf 
                                @method('delete')
                                <button type="submit">Delete</button>
                            </form>
                        @endcan
                        <p>Posted by <h3><a href="{{ route('user.posts', $post->user) }}">{{ $post->user->name }}</a></h3></p>
                        <div id="like">
                            @if(!$post->likedBy(auth()->user()))
                            <form action="{{ route('post.likes', $post->id)}}" method="post">
                                @csrf
                                    <button>Like</button>
                                </form>
                                @else
                                <form action="">
                                    <button>Dislike</button>
                            </form>
                            @endif
                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count())}}</span>
                        </div>
                    </div>
            @endforeach
    @else 
        <p>There is no post</p>
    @endif
@endsection