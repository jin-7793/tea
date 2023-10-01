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
        <a　href="/create">create</a>
    </x-slot>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post">
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
    