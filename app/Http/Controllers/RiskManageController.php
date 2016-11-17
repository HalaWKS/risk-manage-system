<?php

namespace App\Http\Controllers;

use App\Risk;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class RiskManageController extends Controller
{

    /**
     * 创建风险
     */
    public function createRisk(Request $request){

        $input = $request->all();
        $input['creator_id'] = Auth::user()->id;
        $input['tracker_id'] = null;
        //存入数据库
        Risk::create($input);
        //重定向
        return redirect('/home');

    }

    public function createRiskPage(){

        $selectProjects = 'select * from project';
        $projects = DB::select($selectProjects);

        return view('RiskManage.createRisk', compact('projects'));
    }

    /**
     * 显示所有风险
     */
    public function showAllRisk(){

//        $selectRisks = 'select * from risks';
//        $selectRisks = 'SELECT * FROM riskmanage.risks r left join riskmanage.users u on r.creator_id = u.id';
//        $risks = DB::select($selectRisks);
        $selectRisks = 'select r_id, p_id, creator_id, tracker_id, content, possibility, effect, `trigger`, b.created_at, creator_name, c.u_name as tracker_name, p.name as project_name from
        (select r.id as r_id, p_id, creator_id, tracker_id, content, possibility, effect, `trigger`, created_at, a.u_name as creator_name
from risks r left join (select u.id as u_id, name as u_name from users u) a on r.creator_id = a.u_id) b left join
        (select u.id as u_id, name as u_name from users u) c on b.tracker_id = c.u_id left join projects p on b.p_id = p.id
        order by r_id';

        $risks = DB::select($selectRisks);

        return view('RiskManage.showAllRisk', compact('risks'));
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
