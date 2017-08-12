@extends('layouts.app')


@section('script')
    <script type="text/javascript" src="{{asset('js/stage.js')}}"></script>
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
                        新增階段
                    </div>
                    <div class="panel-body">
                        <form  class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="position_id" class="control-label col-md-offset-2 col-md-2">職位</label>
                                <div class="col-md-5">
                                    <select name="position_id" class="form-control">
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-offset-4 col-md-2">
                                <button type="button" class="btn btn-success btn-block submit">提交</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button"  class="btn btn-info btn-block" id="add_stage">新增一列</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-block">刪除一列</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection