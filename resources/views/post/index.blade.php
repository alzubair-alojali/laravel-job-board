<x-layout :title="$pageTitle">
    <h2>blog</h2>
    @foreach ($posts as $post)
        <h1 class="text-2xl">{{ $post->title }}</h1>
        <p class="text-1xl">{{ $post->author }}</p>
        <p>{{ $post->body }}</p>
    @endforeach
    <!-- Display pagination links -->
    {{ $posts->links() }}
</x-layout>