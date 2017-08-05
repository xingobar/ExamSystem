@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="row">
            @if($errors->first() === 'success')
                <div class="alert alert-success">
                    <strong>Success!</strong>新增成功。
                </div>
            @else
                <div class="alert alert-warning">
                    <strong>Warning!</strong>資料已存在！
                </div>
            @endif
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        新增位置
                    </div>
                    <div class="panel-body">
                        <form action="/store_location" method="post" class="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name" class="col-md-offset-2 col-md-2 control-label">位置</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection