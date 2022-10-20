<div class="bg-white p-2 shadow">
    <a href="{{ route('posts.show', $post) }}">
        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
        <p>{!! Str::limit($post->body, 200, '...') !!}</p>
    </a>
</div>