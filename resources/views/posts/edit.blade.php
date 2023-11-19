head>
    <meta charset="utf-8">
    <title>Feel Free!!</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<x-app-layout>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight ml-8">
            Feel Free!!
        </h1>

    <form action="/posts/{{$post->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="content">
            <x-primary-button class="store bg-red-500 ml-8 mt-8">
                update
            </x-primary-button>
            <div class="m-8">
                Title:<br>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{$post->title}}" />
                <p class="title_error text-red-600">{{$errors->first('post.title')}}</p>
            </div>

            <div class="m-8">
                Body:<br>
                <textarea name="post[body]" placeholder="今日のご飯は何ですか?" cols="100" rows="7">{{$post->body}}</textarea>
                <p class="body_error text-red-600">{{$errors ->first('post.body')}}</p>
            </div>
        </div>
    </form>
    <a href="/posts/index" class="underline decoration-blue-500 text-blue-500 ml-8">戻る</a>
</x-app-layout>