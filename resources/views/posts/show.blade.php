<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl"><a href="{{ route('post.show', $post) }}">{{ $post->title }}<a></h1>
                    <p class="text-blue-500">Crée {{ $post->created_at->diffForHumans() }}</p>
                    <p class="text-green-700">Utilisateur : {{ $post->user->name }}</p>
                    <p class="text-orange-500">{{ $post->comments_count }} Commentaires</p>
                    <p>{{ nl2br($post->content) }}</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-xl">Commentaires</h3>
        </div>
        @foreach($post->comments as $comment)
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-blue-500">Crée {{ $comment->created_at->diffForHumans() }}</p>
                        @if ($comment->user)
                            <p class="text-green-700">Utilisateur : {{ $comment->user->name }}</p>
                        @else
                            <p class="italic text-green-500 text">Pseudo : {{ $comment->pseudo }}</p>
                        @endif
                        <p>{{ nl2br($comment->content) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
