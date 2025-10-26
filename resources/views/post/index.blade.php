<x-layout :title="$pageTitle">
    <h2>blog</h2>
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        @foreach ($post->comments as $comment )
        <h1>{{ $comment-> content }}, {{ $comment->author }}</h1>
        @endforeach
    @endforeach
</x-layout>
