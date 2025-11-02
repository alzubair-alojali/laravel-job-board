<x-layout :title="$pageTitle">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/blog/create"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">create</a>
    </div>
    @foreach ($posts as $post)
        <div class="flex justify-between items-center border border-grey-200 px-4 py-3 rounded-lg my-6">
            <div>
                <a class="hover:text-indigo-400" href="/blog/{{ $post->id }}"> <h1 class="text-2xl">{{ $post->title }}</h1> </a>
                <p class="text-1xl">{{ $post->author }}</p>
            </div>
            <div class="flex items-center space-x-4 py-4">
                <a href="/blog/{{ $post->id }}/edit"
                    class="px-4 py-2 text-sm rounded-lg font-semibold text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 shadow-md">
                    edit
                </a>

                <form method="post" action="/blog/{{ $post->id }}" class="inline-block" onsubmit="return confirm('are you sure you want to delete this?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class=" hover:cursor-pointer px-4 py-2 text-sm rounded-lg font-semibold text-red-600 bg-red-50 hover:bg-red-100 transition duration-150 border border-red-200">
                        delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach
    <!-- Display pagination links -->
    {{ $posts->links() }}
</x-layout>