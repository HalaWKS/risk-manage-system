<?php

namespace App\Http\Controllers;

use App\Risk;
use App\RiskManagePlan;
use App\PlanContent;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class RiskSortController extends Controller
{
    /**
     * 按被识别风险类别数返回风险信息
     */
    public function sortRiskByRecognize(){
        $selected = 'select r.id as r_id,p.id as p_id,cu.id as creator_id,tu.id as tracker_id,r.content,r.condition,r.possibility,r.effect,r.trigger,cu.name as creator_name,tu.name  as tracker_name,p.name as p_name,t.name as type_name,r.created_at,sort.numbers as num from risks r
		left join projects p on r.p_id=p.id
			left join users cu on r.creator_id=cu.id
				left join users tu on r.tracker_id=tu.id
					left join risktypes t on r.type_id = t.id
						left join (select rt1.id as id,rt1.name as type_name,count(rt1.id) as numbers
				from  risks r1 left join risktypes rt1 on r1.type_id = rt1.id
					where r1.condition=`potential`
						group by r1.type_id order by count(rt1.id) desc) as sort on r.type_id = sort.id
							order by num desc,type_name,p_id';
        $result = DB::select($selected);

        return $result;
    }

    /**
     * 按演变成问题最多的风险类别数返回风险信息
     */
    public function sortRiskByAppear(){
        $selected = 'select r.id as r_id,p.id as p_id,cu.id as creator_id,tu.id as tracker_id,r.content,r.condition,r.possibility,r.effect,r.trigger,cu.name as creator_name,tu.name  as tracker_name,p.name as p_name,t.name as type_name,r.created_at,sort.numbers as num from risks r
		left join projects p on r.p_id=p.id
			left join users cu on r.creator_id=cu.id
				left join users tu on r.tracker_id=tu.id
					left join risktypes t on r.type_id = t.id
						left join (select rt1.id as id,rt1.name as type_name,count(rt1.id) as numbers
				from  risks r1 left join risktypes rt1 on r1.type_id = rt1.id
					where r1.condition=`appear`
						group by r1.type_id order by count(rt1.id) desc) as sort on r.type_id = sort.id
							order by num desc,type_name,p_id';
        $result = DB::select($selected);
    }


    public function sortRiskType(Request $request)
    {
        $input = $request->all();

        if($input['sortby'] == 'recognize'){
            $selectTypes = 'select distinct rt.id,rt.name,count(rt.id) as numbers, rt.created_at as created_at
                                        from risktypes rt join risks r on r.type_id = rt.id where rt.created_at > \''.$input['begin_time'].'\' and rt.created_at < \''.$input['end_time'].'\'
                                        group by rt.id
                                        order by numbers desc';
            $riskTypes = DB::select($selectTypes);
        } else {
            $selectTypes = 'select distinct rt.id,rt.name,count(rt.id) as numbers, rt.created_at as created_at
                                  from risktypes rt left join risks r on r.type_id = rt.id where r.condition=\'appear\' and rt.created_at > \''.$input['begin_time'].'\' and rt.created_at < \''.$input['end_time'].'\'
                                   group by rt.id order by numbers desc';

            $riskTypes = DB::select($selectTypes);
        }

        return view('RiskManage.showAllRiskType', compact('riskTypes'));
    }

    /**
    *TODO LYC
     * @param Request $request 包含开始时间和结束时间,beginTime,endTime
     * 根据被识别情况（被添加爱数最多的风险类别）排序
     * @return 排序好的风险类别数组
     */
    public function sortByRecognize(Request $request){

        $input = $request->all();
//        $selected = 'select distinct rt.id,rt.name,count(rt.id) as numbers
//                        from risktypes rt left join risks r on r.type_id = rt.id where r.condition<>`appear` r.created_at>='.$input['beginTime'].' and r.created_at<='.$input['endTime'].'
//                        group by rt.id order by numbers desc';
//        $riskTypes = DB::select($selected);

        $selectRiskTypesByRecognize = 'select distinct rt.id,rt.name,count(rt.id) as numbers, rt.created_at as created_at
                                        from risktypes rt join risks r on r.type_id = rt.id
                                        group by rt.id
                                        order by numbers desc';
        $riskTypes = DB::select($selectRiskTypesByRecognize);

        return view('RiskManage.showAllRiskType', compact('riskTypes'));
    }


    /**
     *TODO LYC
     * @param Request $request 包含开始时间和结束时间,beginTime,endTime
     * 根据被演变成问题情况情况排序
     * @return 排序好的风险类别数组
     */
    public function sortByAppear(Request $request){
//TODO 如果查询条件中含有字符串，如第二行error ,是否需要加单引号？
        $input = $request->all();
//        $selected = 'select distinct rt.id,rt.name,count(rt.id) as numbers
//                        from risktypes rt left join risks r on r.type_id = rt.id where r.condition=`appear` and r.created_at>='.$input['beginTime'].' and r.created_at<='.$input['endTime'].'
//                        group by rt.id order by numbers desc';
//        $riskTypes = DB::select($selected);

        $selectRiskTypeByAppear = 'select distinct rt.id,rt.name,count(rt.id) as numbers, rt.created_at as created_at
                                  from risktypes rt left join risks r on r.type_id = rt.id where r.condition=\'appear\'
                                   group by rt.id order by numbers desc';
        $riskTypes = DB::select($selectRiskTypeByAppear);

        return view('RiskManage.showAllRiskType', compact('riskTypes'));
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
}
