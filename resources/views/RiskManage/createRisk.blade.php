@extends('Basic.operateModel')
@section('createRisk')

    {{--添加风险--}}
    <div class="container">
        {!! Form::open(['url'=>'/createrisk']) !!}

        <div class="col-md-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: 微软雅黑; font-size: large">提交风险</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{url('#')}}">
                        <div class="form-group">
                            {!! Form::label('name', '项目:') !!}
                            {{--{!! Form::text('name', null, ['class'=>'form-control']) !!}--}}
                            <select name = "p_id" class = "form-control" style="width: 150px;">
                                @foreach($projects as $project)
                                    <option name = "p_id" value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', '风险内容:') !!}
                            {!! Form::text('content', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('trigger', '触发条件/阈值:') !!}
                            {!! Form::text('trigger', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('possibility', '风险可能性:') !!}
                            <select name = "possibility" class = "form-control" style="width: 150px;">
                                <option name = "possibility" value="high">高</option>
                                <option name = "possibility" value="medium">中</option>
                                <option name = "possibility" value="low">低</option>
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label('effect', '影响程度:') !!}
                            <select name = "effect" class = "form-control" style="width: 150px;">
                                <option name = "effect" value="high">高</option>
                                <option name = "effect" value="medium">中</option>
                                <option name = "effect" value="low">低</option>
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('提交风险', ['class'=>'btn btn-primary form-control']) !!}

                        </div>
                    </form>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>


@stop