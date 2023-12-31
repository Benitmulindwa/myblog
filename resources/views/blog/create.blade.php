<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Add new post
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="m-auto pt-20">
    <form
        action="{{route('blog.store')}}"
        method="POST"
        enctype="multipart/form-data">

        {{-- <label for="is_published" class="text-gray-500 text-2xl">
            Is Published
        </label>
        <input
            type="checkbox"
            class="bg-transparent block border-b-2 inline text-2xl outline-none"
            name="is_published"> --}}
            
        @csrf

        <input
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none"
            value="{{old('title')}}">
        @error('title')
           <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <input
            type="number"
            name="min_to_read"
            placeholder="Minutes to read..."
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" 
            value="{{old('min_to_read')}}">
        @error('min_to_read')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <textarea
            name="body"
            placeholder="Body..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none" value="{{old('body')}}"></textarea>
        @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <div class="bg-grey-lighter py-10">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                <input
                    type="file"
                    name="image"
                    class="hidden">
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </label>
        </div>

        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>
    </form>
</div>
</body>
</html>