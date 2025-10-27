@extends('layouts.app')
{{-- inherit app.blade --}}
@section('title', 'Posts List')
{{-- Shows 'Post List' as title name else will show inherited layouts title 'My Blog' --}}

@section('content')
    <h1>All Posts</h1>s
    {{-- forelse - loop with empty fallback. --}}
    @forelse ($posts as $post)
        <article>
            <h2>
                <a href="{{ route('posts.show', $post->slug) }}">
                    {{!! $post->title !!}} {{-- if you trust this field then !! use this to output htmls etc only use when not have XSS risk --}}
                </a>
            </h2>
            <p>{{ $post->excerpt }}</p>

            <p>
                Published:{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}
            </p>
        </article>
    @empty
        <p>No posts yet.</p>
    @endforelse
    {{ $posts->links() }} {{-- links() for paginations --}}
@endsection
