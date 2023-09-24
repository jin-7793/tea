<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            24SNS
        </h1>
    </x-slot>
    <a href="/create">create</a>
    <div class="content">
        @foreach($posts as $post)
        <div class="title">
            <a href="posts/{{$post->id}}">{{$post->title}}</a>
        </div>
        <div class="body">
            {{$post->body}}
        </div>
        @endforeach
    </div>
    
</x-app-layout>
    