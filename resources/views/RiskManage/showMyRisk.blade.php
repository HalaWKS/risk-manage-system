@extends('Basic.operateModel')
@section('showMyRisk')

        <!--我跟踪的风险-->
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-12 text-left">
                    <h6 class="smart-margin-off" style="font-family: 微软雅黑; font-size: medium;">我的跟踪</h6>
                </div>
            </div>
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
                        <th>更新日期</th>
                        <th>修改状态</th>
                    </tr>
                    @foreach($myrisks as $myrisk)
                        {!! Form::open(['url'=>'/updateriskcondition/'.$myrisk->r_id])!!}
                        <tr>
                            <th>{{ $myrisk->r_id }}</th>  <!--ID-->
                            <th>{{ $myrisk->p_name }}</th>  <!--项目名-->
                            <th>{{ $myrisk->type_name }}</th>    <!--风险类型-->
                            <th>{{ $myrisk->content }}</th> <!--风险内容-->
                            <th>
                                @if( $myrisk->condition == 'potential' )
                                    潜在
                                @elseif( $myrisk->condition == 'appeal' )
                                    已发生
                                @endif
                            </th> <!--风险状态-->
                            <th>
                                @if( $myrisk->possibility == 'high' )
                                    高
                                @elseif( $myrisk->possibility == 'medium' )
                                    中
                                @else
                                    低
                                @endif
                            </th> <!--可能性-->
                            <th>
                                @if( $myrisk->effect == 'high' )
                                    高
                                @elseif( $myrisk->effect == 'medium' )
                                    中
                                @else
                                    低
                                @endif
                            </th> <!--影响程度-->
                            <th>{{ $myrisk->trigger }}</th> <!--触发器-->
                            <th>{{ $myrisk->updated_at }}</th> <!--更新日期-->
                            <th>    <!--风险状态设置-->
                                <select name = "condition" class = "form-control" style="width: 100px;">
                                    <option name = "condition" value="potential">潜在</option>
                                    <option name = "condition" value="appeal">已发生</option>
                                </select>
                            </th>
                            <th>
                                {!! Form::submit("修改",['class'=>'btn btn-primary form-comtrol', 'style'=>'width: 80px; height: 30px; font-size: 16px; font-weight: bold; font-family: 微软雅黑; font-size: 16px;']) !!}
                                {!! Form::close() !!}
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


        {{--<div class="panel-body">--}}
            {{--@foreach($risks as $risk)--}}

                {{--{!! Form::open(['url'=>'/reply/'.$request->id]) !!}--}}

                {{--<div class="alert alert-info" style="font-family: 微软雅黑; font-size: medium;">--}}
                    {{--<label style="font-size: medium;">{{ $risk->r_id }}</label>--}}
                    {{--<br>--}}
                    {{--<label style="font-size: medium;">{{ $risk->project_name }}</label>--}}
                    {{--<br>--}}
                    {{--<label style="font-size: smaller;">———————————————————————————————————————————————</label>--}}
                    {{--<br>--}}
                    {{--<label style="font-size: larger;">风险描述：{{ $risk->content }}</label>--}}
                    {{--<br>--}}
                    {{--<label style="font-size: smaller;">———————————————————————————————————————————————</label>--}}
                    {{--<br>--}}
                    {{--<label style="font-size: larger;">触发临界状态：{{ $risk->trigger }}</label>--}}
                    {{--<br>--}}
                    {{--<label style="font-size: smaller;">———————————————————————————————————————————————</label>--}}
                    {{--<br>--}}
                    {{--@if( $risk->possibility == 'high' )--}}
                        {{--<label style="font-size: medium;">可能性：高</label>--}}
                    {{--@elseif( $risk->possibility == 'medium' )--}}
                        {{--<label style="font-size: medium;">可能性：中</label>--}}
                    {{--@else--}}
                        {{--<label style="font-size: medium;">可能性：低</label>--}}
                    {{--@endif--}}
                    {{--<br>--}}
                    {{--@if( $risk->effect == 'high' )--}}
                        {{--<label style="font-size: medium;">影响程度：高</label>--}}
                    {{--@elseif( $risk->effect == 'medium' )--}}
                        {{--<label style="font-size: medium;">影响程度：中</label>--}}
                    {{--@else--}}
                        {{--<label style="font-size: medium;">影响程度：低</label>--}}
                    {{--@endif--}}
                    {{--<br>--}}
                    {{--<label style="font-size: smaller;">———————————————————————————————————————————————</label>--}}
                    {{--<br>--}}
                    {{--<label style="font-size: medium;">创建者：{{ $risk->creator_name }}</label>--}}
                    {{--<br>--}}
                    {{--@if( $risk->tracker_name == null )--}}
                        {{--<label style="font-size: medium;">跟踪者：无</label>--}}
                    {{--@else--}}
                        {{--<label style="font-size: medium;">跟踪者：{{ $risk->tracker_name }}</label>--}}
                    {{--@endif--}}
                    {{--<br>--}}
                    {{--<label style="font-size: small;">创建时间：{{ $risk->created_at }}</label>--}}
                    {{--{!! Form::submit('回复', ['class'=>'btn btn-primary form-control', 'style'=>'width: 70px; height: 30px; margin-left: 480px; font-size: 10px; font-weight: normal; font-family: 微软雅黑;']) !!}--}}
                    {{--<br>--}}
                {{--</div>--}}

                {{--{!! Form::close() !!}--}}

            {{--@endforeach--}}
        {{--</div>--}}
    </div>
</div>

@stop