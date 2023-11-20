<head>
    <meta charset="utf-8">
    <title>Feel Free!!</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Feel Free!!
        </h1>
    </x-slot>
    
    <div class="post mt-4 p-8 bg-white w-full rounded-2xl">
        <div class="title text-lg font-semibold">
            <font size="5">
                <a>{{$post->title}}</a>
            </font>
            <a>名前:{{$post->user->name}}</a>
        </div>
        
        <hr class="w-full">
        <div class="body mt-2">
            {!! nl2br(e($post->body)) !!}
            <div class="text-xs text-gray-400 text-right">
                有効期限:{{$post->expired_at}}
            </div>
            @if($post->like()->where('user_id','=',Auth::user()->id)->exists())
                {{--もうすでにいいねしている投稿だったらいいねを赤く表示する--}}
                <a href='/unlike_in_show/{{$post->id}}' class="ml-2 mt-2 border-2 bg-red-500">いいね</a>
            @else
                <a href='/like_in_show/{{$post->id}}'>いいね</a>
            @endif
            <a>{{$post->like->count()}}</a>
        </div>
    </div>
    
    <div class="ml-8">
        @if($post->user()->where('id','=',Auth::user()->id)->exists())
            <a href="/posts/{{$post->id}}/edit">
                <x-primary-button>編集</x-primary-button>
            </a>
            <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{$post->id}})"class="text-s text-gray-500">
                    delete
                </button>
            </form>
        @endif
    </div>
    <a href="/posts/index" class="underline decoration-blue-500 text-blue-500 ml-8">戻る</a>
</x-app-layout>

<script>
    function deletePost(id){
        if (confirm('削除すると復元できません。\n　本当に削除しますか？')){
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>