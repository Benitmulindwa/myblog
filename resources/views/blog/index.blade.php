<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge" />
    <title> 
    
        Blog
    </title>
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}" />
</head>
<body class="w-full h-full bg-gray-100">
    <div class="w-4/5 mx-auto">
        <div class="text-center pt-20">
            <h1 class="text-3xl text-gray-700">
                All Articles
            </h1>
            <hr class="border border-1 border-gray-300 mt-10">
        </div>

        <div class="py-10 sm:py-20">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
               href="{{route('blog.create')}}">
                New Article
            </a>

            <form 
                action="{{route('logout')}}"
                method="POST" class="inline-block" enctype="multipart/form-data">
                @csrf
            
                <button
                    type="submit"
                    class="italic" style="color: black; margin-left:800px; background-color: #22C55E; padding: 12px 24px; border-radius: 30px">
                    LOG OUT
                </button>  
            </form>

        </div>
    </div>

    @foreach($posts as $post)
        <div class="w-4/5 mx-auto pb-10">
            <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
                <div class="w-11/12 mx-auto pb-10">
                    <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                        <a href="{{ route('blog.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <p class="text-gray-900 text-lg py-8 w-full break-words">
                        {{ $post->body }}
                    </p>

                    <span class="text-gray-500 text-sm sm:text-base">
                    Made by:
                        <a href=""
                           class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                           {{$post->user->name}}
                        </a>
                    on {{$post->created_at}}
                </span>
                @auth
                    <div class="mt-2">
                        <span class="text-gray-500 text-sm sm:text-base">
                                <a href="{{route('blog.edit',$post->id)}}"
                                class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                                    Edit
                                </a>
                        </span>
                        <form 
                            action="{{route('blog.destroy',$post->id)}}"
                            method="POST" class="inline-block ml-2" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
    
                            <button
                                type="submit"
                                class="italic" style="color: red;">
                                Delete
                            </button>
                            
                        </form>
    
                    </div>
                @endauth
                
            </div>
               
            </div>
        </div>
    @endforeach

        {{$posts->links()}}

</body>
</html>
