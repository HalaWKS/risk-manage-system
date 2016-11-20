@extends('Basic.operateModel')
@section('showRiskType')

        <!--所有风险类别-->
<div class="col-lg-6 col-lg-offset-3">

        {{--{!! Form::open(['url'=>'/recognizeDesc']) !!}--}}
        {{--{!! Form::submit('按识别数降序', ['class'=>'btn btn-primary form-control', 'style'=>'width: 150px; height: 30px; font-size: 16px; font-weight: bold; font-family: 微软雅黑; font-size: 16px;']) !!}--}}
        {{--{!! Form::close() !!}--}}

    {{--@for($i = 0; $i < 1; $i++)--}}
        {{--<br>--}}
    {{--@endfor--}}

        {{--{!! Form::open(['url'=>'/appearDesc']) !!}--}}
        {{--{!! Form::submit('按演变数降序', ['class'=>'btn btn-primary form-control', 'style'=>'width: 150px; height: 30px; font-size: 16px; font-weight: bold; font-family: 微软雅黑; font-size: 16px;']) !!}--}}
        {{--{!! Form::close() !!}--}}

    {{--@for($i = 0; $i < 1; $i++)--}}
        {{--<br>--}}
    {{--@endfor--}}


    <div class="col-lg-offset-0">
        {!! Form::open(['url'=>'/sortRiskType']) !!}

        <div class="form-group">
            <br>
            <input type="radio" name="sortby" value="recognize" checked="checked" />按识别数降序
            <input type="radio" name="sortby" value="appear" />按演变数降序
        </div>

        {!! Form::input('date', 'begin_time', '2000-01-01') !!}
        <label> ~ </label>
        {!! Form::input('date', 'end_time' ,  '2999-12-31') !!}
        {!! Form::submit('查询', ['class'=>'btn btn-primary col-lg-offset-1', 'style'=>'width: 10%', 'name'=>'submit']) !!}
        {!! Form::close() !!}
    </div>

    @for($i = 0; $i < 2; $i++)
        <br>
    @endfor

    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 微软雅黑; font-size: medium;">风险类型列表</div>
        <div class="panel-body">

            <div class="panel panel-default">
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>风险类型</th>
                        <th>对应风险数</th>
                        <th>创建时间</th>
                    </tr>
                    @foreach($riskTypes as $riskType)
                        <tr>
                            <th>{{ $riskType->id }}</th>    <!--ID-->
                            <th>{{ $riskType->name }}</th>  <!--风险类型名-->
                            <th>{{ $riskType->numbers }}</th>  <!--对应风险数-->
                            <th>{{ $riskType->created_at }}</th>  <!--创建时间-->
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>

@stop