@extends('Basic.operateModel')
@section('createProject')

    {{--添加项目--}}
    <div class="container">
        {!! Form::open(['url'=>'/createproject']) !!}

        <div class="col-md-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: 微软雅黑; font-size: large">添加项目</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{url('#')}}">

                        <div class="form-group">
                            {!! Form::label('name', '项目名称:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', '项目描述') !!}
                            {!! Form::text('description', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('创建项目', ['class'=>'btn btn-primary form-control']) !!}

                        </div>
                    </form>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>

@stop