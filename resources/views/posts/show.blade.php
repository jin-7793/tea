<head>
    <meta charset="utf-8">
    <title>Feel Free!!</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            24SNS
        </h1>
    </x-slot>
    <div class="content">
        <div class="title">
            {{$post->title}}
        </div>
        <div class="body">
            {{$post->body}}
        </div>
    </div>
    <a href="/index">戻る</a>
    
</x-app-layout>
    