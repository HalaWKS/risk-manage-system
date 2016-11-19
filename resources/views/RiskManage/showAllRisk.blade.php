@extends('Basic.operateModel')
@section('showAllRisk')

        <!--所有风险-->
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 微软雅黑; font-size: medium;">
            风险列表
        </div>

        <div class="panel-body">
            <div class="panel panel-default">
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>项目名</th>
                        <th>风险类型</th>
                        <th>风险内容</th>
                        <th>风险状态</th>
                        <th>可能性</th>
                        <th>影响程度</th>
                        <th>触发器</th>
                        <th>跟踪者</th>
                        @if( Auth::user()->type == 'pm' )
                            <th>更改跟踪者</th>
                        @endif
                    </tr>
                    @foreach($risks as $risk)
                        {!! Form::open(['url'=>'/updaterisktracker/'.$risk->r_id])!!}
                        <tr>
                            <th>{{ $risk->r_id }}</th>
                            <!--ID-->
                            <th>{{ $risk->p_name }}</th>
                            <!--项目名-->
                            <th>{{ $risk->type_name }}</th>
                            <!--风险类型-->
                            <th>{{ $risk->content }}</th>
                            <!--风险内容-->
                            <th>
                                @if( $risk->condition == 'potential' )
                                    潜在
                                @elseif( $risk->condition == 'appear' )
                                    已发生
                                @endif
                            </th>
                            <!--风险状态-->
                            <th>
                                @if( $risk->possibility == 'high' )
                                    高
                                @elseif( $risk->possibility == 'medium' )
                                    中
                                @else
                                    低
                                @endif
                            </th>
                            <!--可能性-->
                            <th>
                                @if( $risk->effect == 'high' )
                                    高
                                @elseif( $risk->effect == 'medium' )
                                    中
                                @else
                                    低
                                @endif
                            </th>
                            <!--影响程度-->
                            <th>{{ $risk->trigger }}</th>
                            <!--触发器-->
                            <th>{{ $risk->tracker_name }}</th>
                            <!--跟踪者-->
                            @if( Auth::user()->type == 'pm' )
                                <th>    <!--风险跟踪者设置-->
                                    <select name="tracker_id" class="form-control" style="width: 100px;">
                                        @foreach( $developers as $developer)
                                            <option name="tracker_id"
                                                    value="{{ $developer->id }}">{{ $developer->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    {!! Form::submit("修改",['class'=>'btn btn-primary form-comtrol', 'style'=>'width: 80px; height: 30px; font-size: 16px; font-weight: bold; font-family: 微软雅黑; font-size: 16px;']) !!}
                                    {!! Form::close() !!}
                                </th>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>

@stop