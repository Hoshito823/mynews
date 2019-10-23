@extends('layouts/profile')
@section('title','登録済みプロフィールの一覧')

@section('content')
    <div class="container">
        
        <div class="row">
            <h2>プロフィール覧</h2>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        
            <div class="col-md-8">
                <form action ="{{ action('Admin\ProfileController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}" >    
                        </div>
                        
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div >
                </form>
             </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <dev class="row">
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
                                    <td>{{ \Str::limit($profile->hobby, 150) }}</td>
                                    <td>{{ \Str::limit($profile->introduction, 250) }}</td>
                                    <td>
                                        <div>
                                             <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                             <a href="{{ action('Admin\ProfileController@delete',['id' => $profile->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </dev>
            </div>
        </div>
        
    </div>
@endsection