<x-app-layout>
    <div class="container  mt-6 ">
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6">
           @foreach ($posts as $post)
               <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if ($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2021/06/24/11/18/background-6360865_960_720.png @endif);">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a class="inline-block px-3 h-6 bg-{{$tag->color}}-500 text-white rounded-full"
                                     href="{{route('posts.tag', $tag)}}">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2"><a href="{{route('post.show', $post)}}">{{$post->name}}</a></h1>
                    </div>
                </art   icle>
           @endforeach
       </div>
       <div class="mt-4 mb-4">
            {{$posts->links()}}        
       </div>
    </div>

</x-app-layout>