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

                <!--项目列表-->
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: 微软雅黑; font-size: medium;">项目列表</div>
                <div class="panel-body">

                    <div class="panel panel-default">
                        <!-- Table -->
                        <table class="table">

                            <tr>
                                <th>ID</th>
                                <th>项目名</th>
                                <th>项目描述</th>
                            </tr>

                            @foreach($projects as $project)
                                <tr>
                                    <th>{{ $project->id }}</th>  <!--ID-->
                                    <th>{{ $project->name }}</th>  <!--项目名-->
                                    <th>{{ $project->description }}</th>  <!--项目描述-->
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@stop