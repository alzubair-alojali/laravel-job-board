<x-layout :title="$pageTitle">
    <h2>blog</h2>
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
    @endforeach
</x-layout>
