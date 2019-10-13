{{-- Layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- admin.blade.phpの@yield('title')に第二引数を埋め込む --}}
@section('title' , 'プロフィールページ')
     
{{-- admin.blade.phpの@yield('content')に以下のタグwp読み込み --}}
@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの新規作成</h2>
                <form action='{{ action('Admin\ProfileController@create')}}' method="post" enctype="multipart/form-data">
                
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach  
                        </ul>
                    @endif
                    
                    <!--氏名入力欄-->
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <!--性別入力欄-->
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input type="radio" name="gender" value="男性">男性
                            <input type="radio" name="gender" value="女性">女性
                        </div>
                    </div>
                    
                    <!--趣味入力欄-->
                    <div class="form-group row">
                        <label class="col-md-2" name="hobby">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="5">{{ old('hobby')}}</textarea>
                        </div>
                    </div>
                    
                    <!--自己紹介記入欄-->
                    <div class="form-group row">
                        <label class="col-md-2" name="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    
                    <input type=submit class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection