<x-app-layout>
<div class=" bg-indigo-100">
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-6">
        @foreach ($posts as $post)
            @php
                $mainImage = $post->images->where('isMain', true)->first();
            @endphp

            @if ($mainImage)
                <article class="p-4 w-full h-80 bg-cover bg-center"
                    style="background-image:url(/storage/posts/{{$mainImage->url}})"
                >
                    <div class="w-full h-full py-3 flex flex-col justify-end gap-2">
                        
                        <div>
                            @foreach ($post->tags as $tag)    
                                <a class="py-1 px-3 bg-slate-900 text-white rounded-md" href="">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <a class="text-white font-semibold text-xl" href="{{route('posts.show', $post)}}">{{ $post->name }}</a>
                    </div>
                </article>
            @endif
        @endforeach
    </div>

    <div class="mt-4">
        {{$posts->links()}}
    </div>
</div>

    
    
</x-app-layout>
