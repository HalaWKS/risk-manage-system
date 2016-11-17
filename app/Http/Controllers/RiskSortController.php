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
    *TODO LYC
     * @param Request $request 包含开始时间和结束时间,beginTime,endTime
     * 根据被识别情况（被添加爱数最多的风险类别）排序
     * @return 排序好的风险类别数组
     */
    public function sortByRecognize(Request $request){

        $input = $request->all();
        $selected = 'select distinct rt.id,rt.name,count(rt.id) as numbers
                        from risktypes rt left join risks r on r.type_id = rt.id where r.created_at>='.$input['beginTime'].' and r.created_at<='.$input['endTime'].'
                        group by rt.id order by numbers desc';
        $riskTypes = DB::select($selected);
//        return
    }

    /**
     *TODO LYC
     * @param Request $request 包含开始时间和结束时间,beginTime,endTime
     * 根据被演变成问题情况情况排序
     * @return 排序好的风险类别数组
     */
    public function sortByError(Request $request){
//TODO 如果查询条件中含有字符串，如第二行error ,是否需要加单引号？
        $input = $request->all();
        $selected = 'select distinct rt.id,rt.name,count(rt.id) as numbers
                        from risktypes rt left join risks r on r.type_id = rt.id where r.condition=error and r.created_at>='.$input['beginTime'].' and r.created_at<='.$input['endTime'].'
                        group by rt.id order by numbers desc';
        $riskTypes = DB::select($selected);
//        return
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
