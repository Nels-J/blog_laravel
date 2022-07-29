<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @foreach($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl"><a href="{{ route('post.show', $post) }}">{{ $post->title }}<a></h1>
                        <p class="text-blue-500">Crée {{ $post->created_at->diffForHumans() }}</p>
                        <p class="text-orange-500">{{ $post->comments_count }} Commentaires</p>
                        <p>{{ Str::limit($post->content, 500) }}</p>
                    </div>
                </div>
                    @endforeach
                    {{ $posts->links() }}

        </div>
    </div>
</x-guest-layout>
