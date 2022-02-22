<x-app-layout>
    <div class=" py-8 px-20">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <div class="text-lg text-gray-500 mb-2">{!!$post->extract!!}</div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- //main content  --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="{{$post->name}}">

                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/06/24/11/18/background-6360865_960_720.png" alt="{{$post->name}}">

                    @endif
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>
            </div>
            {{-- //relatione content  --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{$post->category->name}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('post.show', $similar)}}">

                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="{{$similar->name}}">                             
                                
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/06/24/11/18/background-6360865_960_720.png" alt="{{$similar->name}}">                                
                                @endif

                                <span class="ml-2 text-gray-600 w-full">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>