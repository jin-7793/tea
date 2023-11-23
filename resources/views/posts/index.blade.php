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
    
    <a href="/create">
        <x-primary-button class="create bg-red-500 ml-8 mt-4">
            create
        </x-primary-button>
    </a>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post mt-4 p-8 bg-white w-full rounded-2xl">
                <div class="title text-lg font-semibold flex">
                    <div class="flex-1">
                        <font size="5">
                             <a href="{{$post->id}}">{{$post->title}}</a>
                        </font>
                        <a>名前:{{$post->user->name}}</a>
                    </div>
                    <div class="delete_post text-xs text-gray-400 text-right flex-2">
                        @if($post->user()->where('id','=',Auth::user()->id)->exists())
                            <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{$post->id}})">
                                    delete
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                
                <hr class="w-full">
                <div class="body mt-2">
                    {!! nl2br(e($post->body)) !!}
                    <br><br>
                    <div class="flex">
                        <div class="flex-1">
                            @if($post->like()->where('user_id','=',Auth::user()->id)->exists())
                                {{--もうすでにいいねしている投稿だったらいいねを赤く表示する--}}
                                <a href='/unlike/{{$post->id}}' class="ml-2 mt-2 border-2 bg-red-500">いいね</a>
                            @else
                                <a href='/like/{{$post->id}}'>いいね</a>
                            @endif
                            <a>{{$post->like->count()}}</a>
                        </div>
                        <div class="text-xs text-gray-400 text-right flex-2">
                            有効期限:{{$post->expired_at}}
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination mt-4">
            {{$posts->links()}}
    </div>
</x-app-layout>
<script>
    function deletePost(id){
        if (confirm('削除すると復元できません。\n　本当に削除しますか？')){
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>