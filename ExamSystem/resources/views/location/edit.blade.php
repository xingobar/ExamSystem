@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="row">
                @if($errors->first() === 'update_success')
                    <div class="alert alert-success">
                        <strong>Success!</strong>修改成功
                    </div>
                @else
                    <div class="alert alert-success">
                        <strong>Success!</strong>刪除成功
                    </div>
                @endif
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th scope="col">編號</th>
                        <th scope="col">位置名稱</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($locations as $location)
                            <th scope="row">{{$location->id}}</th>
                            <td data-title="name">{{$location->name}}</td>
                            <td data-title="edit_location">
                                <a href="#" data-toggle="modal" data-target="#{{$location->id}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                       style="font-size: 2em;color:#bd832d"></i>
                                </a>
                            </td>
                            <td data-title="delete_location">
                                <a href="/delete_location/{{$location->id}}">
                                    <i class="fa fa-trash-o" aria-hidden="true" style="font-size:2em;color:#b78282"></i>
                                </a>
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($locations as $location)
            <div id="{{$location->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">位置名稱編輯</h4>
                        </div>
                        <form action="/update_location/{{$location->id}}}" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name" class="control-label col-md-offset-2 col-md-2">名稱</label>
                                    <div class="col-md-5">
                                        <input type="text " name="name" class="form-control" value="{{$location->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit">修改</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection