<x-layout :title="$pageTitle">
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <article class="bg-white p-6 rounded-xl shadow border border-gray-100">
            <header class="mb-4">
                <h1 class="text-3xl font-extrabold text-gray-900">{{ $post->title }}</h1>
                <div class="mt-2 text-sm text-gray-500">
                    Posted {{ $post->created_at->diffForHumans() }}
                </div>
            </header>

            <div class="prose max-w-none text-gray-800">
                {!! nl2br(e($post->content)) !!}
            </div>
        </article>

        <section class="mt-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Comments ({{ $post->comments->count() }})</h2>
            </div>

            <div class="space-y-4">
                @forelse($post->comments as $comment)
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0">
                                <div class="text-sm text-gray-600">
                                    <span class="font-semibold text-indigo-700">{{ $comment->author }}</span>
                                    <span class="mx-2">•</span>
                                    <span
                                        title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="mt-2 text-gray-800">{{ $comment->content }}</p>
                            </div>

                            <div class="flex items-center gap-2">
                                <a href="/comment/{{ $comment->id }}/edit"
                                    class="inline-flex items-center rounded-md bg-yellow-500 px-3 py-1.5 text-sm font-medium text-white hover:bg-yellow-400">
                                    Edit
                                </a>

                                <form action="/comment/{{ $comment->id }}" method="POST"
                                    onsubmit="return confirm('Delete this comment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-500">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <p class="text-gray-500">No comments yet — be the first to comment.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <section class="mt-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="text-lg font-medium text-gray-900 mb-3">Add a comment</h3>

                @if(session('success'))
                    <div class="mb-4 text-sm text-green-700 bg-green-50 p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="/comment" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Your name</label>
                        <input type="text" name="author" value="{{ old('author') }}"
                            class="text-black px-2 py-1 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('author') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Comment</label>
                        <textarea name="content" rows="4"
                            class="text-black px-2 py-1 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('content') }}</textarea>
                        @error('content') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                            Post comment
                        </button>

                        <a href="/blog/{{ $post->id }}"
                            class="inline-flex items-center rounded-md border border-gray-200 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </section>

    </div>
</x-layout>