<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="name">
            24SNS
        </h1>
    </x-slot>
    <a href="/create" class="ml-2 mt-2 border-2 bg-red-500">create</a>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post mt-4 p-8 bg-white w-full rounded-2xl">
                <div class="title text-lg font-semibold">
                    <font size="5">
                        <a href="posts/{{$post->id}}">{{$post->title}}</a>
                    </font>
                </div>
                <hr class="w-full">
                <div class="body mt-2">
                    {{$post->body}}
                    <div class="text-xs text-gray-400 text-right">
                        有効期限:{{$post->expired_at}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
    