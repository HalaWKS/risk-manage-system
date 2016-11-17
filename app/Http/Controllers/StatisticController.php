<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{

    public function showCharts()
    {

        $my_id = Auth::user()->id;
        $selectHealthData = 'select * from healthdata where user_id = '.$my_id.' order by date desc limit 0,1';
        $healthData = DB::select($selectHealthData);

        $selectLatestData = 'select steps, heart_rate, blood_pressure, sleep_time, date from healthdata where user_id = '.$my_id.' order by date desc limit 0,30';
//        $selectLatestData = 'select steps, heart_rate, blood_pressure, sleep_time, date from healthdata order by date desc limit 0,30';
        $latestData = DB::select($selectLatestData);
//        $steps = [];
//        $bloodPressure = [];
//        $heartRate = [];
//        $sleepTime = [];
//        $highPressure = [];
//        $lowPressure = [];
        $chartData = [];
        $steps = [];
        $i = 0;
        $k = 30;

        foreach($latestData as $data){
//            $steps[$i] = [$k, (int)$data->steps];

//            $highPressure[$i] = [$k, (int)$high_low[0]];
//            $lowPressure[$i] = [$high_low[1], $data->date];
//            $heartRate[$i] = [$k, (int)$data->heart_rate];
//            $sleepTime[$i] = [$data->sleep_time, $data->date];
            $high_low = explode('/', $data->blood_pressure);
            $sleepData = explode(' ', $data->sleep_time);
            $h = (double)str_replace('h', '', $sleepData[0]);
            $m = (double)str_replace('min', '', $sleepData[1]);
            $sleepTime = round( ($h + $m / 60), 2 );
            $chartData[$i] = [$k, (int)$high_low[0], (int)$high_low[1], (int)$data->heart_rate, $sleepTime];
            $steps[$i] = [$k, (int)$data->steps];
            $i++;
            $k--;
        }

        return view('web.statistic', compact('healthData', 'chartData', 'steps'));
//        return view('web.statistic', compact('healthData', 'steps', 'heartRate', 'highPressure', 'lowPressure', 'sleepTime'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // created by whj
    // draw bar chart for data in a time
    // risks will be grouped by their type and count the number of each type
    // and show the number of risks become problems
    public function show_bar_chart(Request $request)
    {
        // data table info
        /*
         * type, number, be_problem_num
         */
        $input = $request->all();
//        var $begin_time = $input['begin_time'];
//        var $end_time = $input['end_time'];
//        var $select_str = "select id, type from riskmanage.risk_type";
//        $types = DB::select($select_str);
        $types = [['id'=>1, 'type'=>'type1'], ['id'=>2, 'type'=>'type2'], ['id'=>3, 'type'=>'type3']];
//        $without_problem = DB::select($select_str);
        $without_problem = [['id'=>1, 'num'=>100], ['id'=>2, 'num'=>120]];
//        $select_str = "";
        //$with_problem = DB::select($select_str);
        $with_problem = [['id'=>1, 'num'=>50], ['id'=>2, 'num'=>60]];
        $result = [];
        foreach($types as $type)
        {
            $temp['type'] = $type['type'];
            $temp['all'] = 0;
            $temp['problem'] = 0;
            foreach($without_problem as $wop)
            {
                if($type['id'] == $wop['id'])
                {
                    $temp['all'] = $wop['num'];
                    break;
                }
            }
            foreach($with_problem as $wp)
            {
                if($type['id'] == $wop['id'])
                {
                    $temp['problem'] = $wp['num'];
                    break;
                }
            }
            array_push($result, $temp);
        }
        return view('statistics.statisticDisplay', compact('result'));
    }

    // created by whj
    // draw pie chart for data in a time
    //
    public function show_pie_chart(Request $request)
    {

    }
}
