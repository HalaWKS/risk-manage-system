<?php

namespace App\Http\Controllers;

use App\PlanContent;
use App\RiskManagePlan;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class RiskManagePlanController extends Controller
{

    public function createManagePlan(Request $request)
    {
        $input = $request->all();

        $name['name'] = $input['name'];
        $risk_ids = $input['risk_id'];

        RiskManagePlan::create($name);

        $selectPlan = 'select * from riskmanageplan rsp where rsp.name = "'.$name['name'].'"';
        $plan = DB::select($selectPlan);
//        print_r($plan);
        if($plan == null){
            print_r('null a null!');
        }
        $plan_id = $plan[0]->id;

        foreach($risk_ids as $risk_id)
        {
            $plancontent['r_id'] = $risk_id;
            $plancontent['plan_id'] = $plan_id;
            PlanContent::create($plancontent);
        }

        return redirect('/createRiskManagePlan');
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
