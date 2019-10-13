{{-- Layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- admin.blade.phpの@yield('title')に第二引数を埋め込む --}}
@section('title' , 'プロフィールページ')
     
{{-- admin.blade.phpの@yield('content')に以下のタグwp読み込み --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
            </div>
        </div>
    </div>

@endsection