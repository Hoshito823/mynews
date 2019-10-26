@extends('layouts.front_profile')

@section('profile','一般ユーザー用プロフィール表示ページ')

@section('content')
<div class="container">
        
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        
        <div class="row">
            <div class="col-md-12">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="20%">氏名</th>
                            <th width="10%">性別</th>
                            <th width="20%">趣味</th>
                            <th width="30%">自己紹介</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($profiles as $profile)
                            <tr>
                                <td>{{ $profile->id }}</td>
                                <td>{{ $profile->name }}</td>
                                <td>{{ $profile->gender }}</td>
                                <td>{{ \Str::limit($profile->hobby,150) }}</td>
                                <td>{{ \Str::limit($profile->introduction,250) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
