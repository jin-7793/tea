<head>
    <meta charset="utf-8">
    <title>Feel Free!!</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<x-guest-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Feel Free!!
        </h1>
    </x-slot>
    <div class="content">
        <div class="welcome">
            Feel Free!! を始めよう!
        </div>
        <div class="flex">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('index') }}">
                        <x-primary-button class="bg-red-500 ml-8 mt-8">
                            Let's Go!!
                        </x-primary-button>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="flex-1">
                        <x-primary-button class="bg-red-500 ml-8 mt-8">
                            Register
                        </x-primary-button>
                    </a>
                    <a href="{{ route('login') }}" class="flex-2">
                        <x-primary-button class="bg-red-500 ml-8 mt-8">
                            Login
                        </x-primary-button>
                    </a>
                @endauth
            @endif
        </div>
    </div>
</x-guest-layout>
    