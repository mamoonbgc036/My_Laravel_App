@extends('layouts.app')
@section('content')
    <div>
       <form action="{{ route('post') }}" method="post">
            @csrf
            <textarea name="body" id="" cols="30" rows="10" placeholder="type your post here"></textarea>
                @error('body')
                    <div id="error">
                        {{ $message }}
                    </div>
                @enderror
            <button type="submit">Submit</button>
       </form>
    </div>
    @if($posts->count())
            @foreach($posts as $post)
                    <div id="post">
                        {{ $post->body }} posted at <h4>{{ $post->created_at->diffForHumans() }}</h4>
                        <p>Posted by <h3>{{ $post->user->name }}</h3></p>
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