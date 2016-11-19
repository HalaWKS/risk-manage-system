<!DOCTYPE html>
<html lang="en" style="height: 120%">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RiskManageSystem</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg" style="height: 120%">

@include('Basic.guideBar')
{{-- time select compose --}}
<?php
$begin = explode(' ', $page_info['begin_time'])[0];
$end = explode(' ', $page_info['end_time'])[0];
$result = $page_info['result'];
?>
<div class="col-lg-offset-3">
    {!! Form::open(['url'=>'statistic']) !!}
    {!! Form::input('date', 'begin_time', $begin) !!}
    <label> ~ </label>
    {!! Form::input('date', 'end_time' ,  $end) !!}
    {!! Form::submit('²éÑ¯', ['class'=>'btn btn-primary col-lg-offset-1', 'style'=>'width: 10%', 'name'=>'submit']) !!}
    {!! Form::close() !!}
</div>
@include('statistic.draw_bar_chart')
@include('statistic.draw_pie_chart')
@include('statistic.draw_problem_bar_chart')
@include('statistic.draw_problem_pie_chart')
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/gmaps.js"></script>
<script src="js/main.js"></script>

</body>
</html>