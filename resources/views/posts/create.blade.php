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
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="content">
            <x-primary-button class="store">
                store
            </x-primary-button>
            <div class="title">
                title:<br>
                <input type="text" name="post[title]" placeholder="タイトル" />
            </div>
            
            <div class="body"><!--今のままだとBodyがフォームの下部にいってしまうので修正が必要。-->
                Body:<br>
                <textarea name="post[body]" placeholder="今日のご飯は何ですか?" cols="100" rows="10"></textarea> 
            </div>
        </div>
    </form>
    <a href="/index">戻る</a>
    
</x-app-layout>
    