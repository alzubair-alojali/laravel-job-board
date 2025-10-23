<x-layout :title="$pageTitle">
    <h2>comments exploring</h2>
    @foreach ($comments as $comment)
        <h1>{{ $comment->author }}</h1>
        <h2>{{ $comment->content }}</h2>
        <p>{{ $comment ->post->title }}</p>
    @endforeach
</x-layout>