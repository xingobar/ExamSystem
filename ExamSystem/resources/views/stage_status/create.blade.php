@extends('layouts.app')


@section('script')
    <script type="text/javascript" src="{{asset('js/stageStatus.js')}}"></script>
@endsection

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
                        新增階段種類
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="/store_stage_status" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="location" class="control-label col-md-offset-2 col-md-2">地點</label>
                                <div class="col-md-5">
                                    <select name="location" class="form-control" id=""
                                            onchange="getPositionByLocation(this)">
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position_id" class="control-label col-md-offset-2 col-md-2">職位</label>
                                <div class="col-md-5">
                                    <select name="position_id" class="form-control" onchange="getPositionByLocation(this)">
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stage_id" class="control-label col-md-2 col-md-offset-2">階段</label>
                                <div class="col-md-5">
                                    <select name="stage_id" class="form-control" id="" onchange="getStageByPosition(this)">
                                        @foreach($stages as $stage)
                                            <option value="{{$stage->id}}">{{$stage->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label col-md-2 col-md-offset-2">階段名稱</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-4 col-md-5">
                                    <button type="submit" class="btn btn-success btn-block">新增</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection