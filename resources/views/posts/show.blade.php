<x-app-layout>
    <div class="bg-white rounded-xl px-8 py-4 mb-4">
        <h1 class="text-3xl font-bold mb-4">{{$post->name}}</h1>
        <div class="text-lg ">
            {{$post->extract}}
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @php
            $mainImage = $post->images->where('isMain', true)->first();
            $imgs = $post->images->where('isMain', false);
         @endphp
        
         <div class="col-span-2 bg-white rounded-xl ">
            <figure class="m-2">
                <img class="w-full h-80 object-cover object-center py-4 px-2" src="{{Storage::url('posts/'.$mainImage->url)}}" >
                @foreach ( $post->tags as $tag )

                <a class="p-2 bg-slate-600 rounded-xl px-4 m-1"
                    href="{{route('posts.tag', $tag)}}"    
                >
                    {{ $tag->name }}</a>

                @endforeach
            </figure>
    
            <div>
                <p class="px-4">
                    {{ $post->body}}
                </p>
                
            </div>
            <div class="max-w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($imgs as $img)
                    <img class=" object-cover object-center py-4 px-2 mx-auto" src="{{ Storage::url('posts/' . $img->url) }}">
                @endforeach
            </div>
            
            
            
        </div>

        <aside>
            <div class="bg-white rounded-xl px-10 py-5">
                <h1 class="text-2xl mb-2">Mas  de <strong>{{$post->category->name}}</strong> </h1>


                <ul>    

                    @foreach ($postsRelated as $related)
                        @php
                            $mainImage = $related->images->where('isMain', true)->first();
                        @endphp

                        <li class="">
                            <div class="grid sm:grid-cols-3 md:grid-cols-1 lg:grid-cols-3 justify-center items-center">
                                <a class="mb-2" href="{{ route('posts.show', $related) }}">
                                    @if ($mainImage)
                                        <img class="w-20 sm:w-40 h-20" src="{{ Storage::url('posts/'.$mainImage->url) }}" alt="">
                                    @endif
                                </a>
                                <a class="col-span-1 sm:col-span-2   hover:text-orange-500" href="{{ route('posts.show', $related) }}">
                                    <span >{{$related->name}}</span>
                                </a>
                             </div>
                        </li>
                    @endforeach
                </div>
                
                </ul>
            
        </aside>
    
   
    </div>

</x-app-layout>
    