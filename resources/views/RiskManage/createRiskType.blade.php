@extends('Basic.operateModel')
@section('createRiskType')

    {{--添加风险类型--}}
    <div class="container">
        {!! Form::open(['url'=>'/createrisktype']) !!}

        <div class="col-md-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: 微软雅黑; font-size: large">添加风险类型</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{url('#')}}">

                        <div class="form-group">
                            {!! Form::label('name', '风险类型名称:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('创建风险类别', ['class'=>'btn btn-primary form-control']) !!}

                        </div>
                    </form>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>

@stop