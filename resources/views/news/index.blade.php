@extends('layouts.front')

@section('content')
<div class="container">
    <hr color="#c0cc0">
    <!--headline=最新記事を大きく取り上げる-->
    @if (!is_null($headline))
    <div class="row">
        <div class="headline col-md-10 mx-auto">
            <div class="row">
                
                <!--左に表示する画像-->
                <div class="col-md-6">
                    <div class="caption mx-auto">
                    <div class="image">
                        @if ($headline->image_path)
                            <!--<img src="{{ asset('storage/image' . $headline->iamge_path) }}">-->
                            <!--S3に保存してある画像を表示-->
                            <img src="{{ $headline->image_path }}">
                        @endif
                    </div>
                    
                    <div class="title p-2">
                        <h1>{{ \Str::limit($headline->title, 70) }}</h1>
                    </div>
                    
                    </div>
                </div>
                
                <!--右に表示する本文-->
                <div class="col-md-6">
                    <p class="body-mx-auto">{{ \Str::limit($headline->body, 650) }}</p>
                </div>
                
            </div>
        </div>
    </div>
    @endif
    
    <!--その他記事-->
    <hr color="#c0c0c0">
    <div class="row">
        <div class="posts col-md-8 mx-auto mt-3">
            @foreach ($posts as $post)
            <div class="post">
                <div class="row">
                    
                    <div class="text col-md-6">
                        <div class="date">
                            {{ $post->updated_at->format('Y年m月d日') }}
                        </div>
                        
                        <div class="title">
                            {{ \Str::limit($post->title, 150) }}
                        </div>
                        
                        <div class="body mt-3">
                            {{ \Str::limit($post->body, 1500) }}
                        </div>
                    </div>
                    
                    <div class="image col-md-6 text-right mt-4">
                        @if ($post->image_path)
                        
                            <!--<img src="{{ asset('storage/image/' . $post->image_path) }}">-->
                            <!--S3に保存してある画像表示用-->
                            <img src="{{ $post->image_path }}">
                        @endif
                    </div>
                    
                    
                </div>
            </div>
            
            <hr color="#c0c0c0">
            @endforeach
        </div>
    </div>
</div>
@endsection