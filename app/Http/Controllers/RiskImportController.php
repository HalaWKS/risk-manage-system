<?php

namespace App\Http\Controllers;

use App\Risk;
use App\RiskManagePlan;
use App\PlanContent;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RiskImportController extends Controller
{
    /**
     * @param Request $request
     * 批量导入风险
     * 所涉及的表：风险计划表；计划内容表;风险表；风险更新表;计划内容表
     * request对应包含信息：计划表名字(1个)，风险ID（N个），
     * 对应name.riskArray
     */

    public function importRisks(Request $request){
        $input = $request->all();
        $plan['name'] = $input['name'];
        $riskArray = $input['riskArray'];
        $selectP = "select p_id from risks where id = '.$riskArray[0].'";
        $pid = DB::select($selectP);

        RiskManagePlan:create($plan);
        foreach($riskArray as $array){
            $risk['r_id']=$array['r_id'];
            $risk['plan_id']=$pid;
            PlanContent:create($risk);
        }

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
