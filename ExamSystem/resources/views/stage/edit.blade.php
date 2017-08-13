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
                        <th scope="col">地點</th>
                        <th scope="col">職位</th>
                        <th scope="col">階段</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stages as $stage)
                        <tr>
                            <th scope="row">{{$stage->id}}</th>
                            <td data-title="location">{{$stage->position->location->name}}</td>
                            <td data-title="position">{{$stage->name}}</td>
                            <td data-title="stage">{{$stage->stage}}</td>
                            <td data-title="edit_stage">
                                <a href="#" data-toggle="modal" data-target="#{{$stage->id}}"
                                   style="padding-right:20px;">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                       style="font-size: 2em;color:#bd832d"></i>
                                </a>
                                <a href="/delete_stage/{{$stage->id}}">
                                    <i class="fa fa-trash-o" aria-hidden="true" style="font-size:2em;color:#b78282"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($stages as $stage)
            <div id="{{$stage->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">職稱編輯</h4>
                        </div>
                        <form action="/update_stage/{{$stage->id}}" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="location_id" class="control-label col-md-offset-2 col-md-2">地點</label>
                                    <div class="col-md-5">
                                        <select name="location_id" class="form-control">
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}" {{$location->id === $stage->position->location->id ? 'selected': ''}}>{{$location->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label col-md-offset-2 col-md-2">名稱</label>
                                    <div class="col-md-5">
                                        <input type="text " name="name" class="form-control"
                                               value="{{$stage->name}}">
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