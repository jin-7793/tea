<head>
    <meta charset="utf-8">
    <title>Feel Free!!</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="name">
            Feel Free!!
        </h1>
    </x-slot>
    <a href="/create">
        <x-primary-button class="create bg-red-500 ml-8 mt-4">
            create
        </x-primary-button>
    </a>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post mt-4 p-8 bg-white w-full rounded-2xl">
                <div class="title text-lg font-semibold">
                    <font size="5">
                        <a href="posts/{{$post->id}}">{{$post->title}}</a>
                    </font>
                    <a>投稿者:{{$post->user->name}}</a>
                </div>
                <hr class="w-full">
                <div class="body mt-2">
                    {{$post->body}}
                    <div class="text-xs text-gray-400 text-right">
                        有効期限:{{$post->expired_at}}
                    </div>
                    @if($post->like()->where('user_id','=',Auth::user()->id)->exists())
                        {{--もうすでにいいねしている投稿だったら赤くいいねを赤く表示する--}}
                        <a href='/unlike/{{$post->id}}' class="ml-2 mt-2 border-2 bg-red-500">いいね</a>
                    @else
                    <a href='/like/{{$post->id}}'>いいね</a>
                    @endif
                    <a>{{$post->like->count()}}</a>
                    
                    <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{$post->id}})">
                            delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script>
    function deletePost(id){
        if (confirm('削除すると復元できません。\n　本当に削除しますか？')){
            document.getElementById(`form_${id}`).submit();
            
        }
        
    }
    </script>
</x-app-layout>
