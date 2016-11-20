@extends('Basic.operateModel')
@section('showAllPlan')

        <!--所有计划-->
<div class="col-lg-10 col-lg-offset-1">

    @foreach($plan_detail as $detail)
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 微软雅黑; font-size: medium;">
            {{ $detail[0]->plan_name }}
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
                        <th>创建时间</th>
                    </tr>
                    @foreach($detail as $risk)
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
                            <th>{{ $risk->created_at }}</th>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
    @endforeach
</div>

@stop