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
        <a class="bg-blue-900" href="/create">create</a>
    </x-slot>
    <div class="bg-blue-400">
        @foreach($posts as $post)
            <div class="underline decoration-blue-100">
                <div class="title">
                    <a href="posts/{{$post->id}}">{{$post->title}}</a>
                </div>
                <div class="body">
                    {{$post->body}}
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
    