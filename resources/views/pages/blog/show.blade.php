<x-base-layout>
    <main class="min-h-screen">
        <section class="container pt-24 mx-auto space-y-4">

            {{-- Meta description --}}
            @section('meta-description', $post->metaDescription())

            {{-- Facebook Meta --}}
            @section('og:title', $post->title)
            @section('og:image', 'storage/images/'. $post->cover_image)

            {{-- Title --}}
            @section('og:title', $post->title)

            <article class="p-4 bg-white">
                <h1 class="font-bold text-2xl mb-2">{{ $post->title }}</h1>

                <div>
                    {!! $post->body !!}
                </div>

            </article>

            <div>

                <button class="p-2 mt-16 text-xs text-white bg-blue-500">
                    <a href="https://www.faceboook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">
                        SHARE ON FACEBOOK
                    </a>
                </button>
               
            </div>

        </section>
    </main>
</x-base-layout>