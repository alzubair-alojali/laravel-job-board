<x-layout :title="$pageTitle">

    <div class="container max-w-4xl mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-white mb-8">Edit Comment</h2>

        <form action="/comment/{{ $comment->id }}" method="POST" class="space-y-6 bg-gray-900 p-6 rounded-lg shadow-lg">
            @csrf
            @method ('put')
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Your name</label>
                <input type="text" name="author" value="{{ old('author',$comment->author) }}"
                    class="w-full bg-gray-800 text-white px-4 py-2 rounded-md border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                @error('author') <p class="text-sm text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Comment</label>
                <textarea name="content" rows="4"
                    class="w-full bg-gray-800 text-white px-4 py-2 rounded-md border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('content',$comment->content) }}</textarea>
                @error('content') <p class="text-sm text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors duration-200">
                    Post comment
                </button>

                <a href="/blog/{{ $comment->post_id }}"
                    class="px-6 py-2 bg-gray-800 text-gray-300 rounded-md border border-gray-700 hover:bg-gray-700 transition-colors duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</x-layout>