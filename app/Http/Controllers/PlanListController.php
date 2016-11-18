<?php

namespace App\Http\Controllers;

use App\Risk;
use App\RiskManagePlan;
use App\PlanContent;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlanListController extends Controller
{

    /**
     * 返回所有计划列表。
     * 包含计划Id.计划名、项目Id,项目名，风险id，风险名
     */
    public function showAllList(){

        $selected='select rmp.id as plan_id,rmp.name as rmp_name,r.p_id as project_id,pr.name as pro_name,r.id as r_id,rt.name as rt_name,u.name as tracker_name,r.content as r_content,r.condition as r_condition,r.possibility as r_possibility, r.effect as r_effect,r.trigger as r_trigger
 from (plancontent p left join risks r  on r.id = p.r_id)  left join riskmanageplan rmp on rmp.id = p.plan_id join risktypes rt on r.type_id = rt.id join projects pr on pr.id = r.p_id left join users u on u.id = r.tracker_id';
        $list = DB::select($selected);
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
