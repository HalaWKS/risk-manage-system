<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class PageSkipController
 * @package App\Http\Controllers
 * @creator WKS
 */
class PageSkipController extends Controller
{

    public function toMyRisk(){
        $operatorID = Auth::user()->id;
//        $selectMyRisks = 'select * from risks r where r.tracker_id = '.$operatorID ;
        $selectMyRisks = 'select r_id, p_id, p_name, type_id, `name` as type_name, creator_id, tracker_id,
content, `condition`, possibility, effect, `trigger`, created_at, updated_at from
(select id as r_id, a.p_id, p_name, type_id, creator_id, tracker_id, content,
`condition`, possibility, effect, `trigger`, created_at, updated_at from
(SELECT * FROM riskmanage.risks r where r.tracker_id = '.$operatorID.') a left join
(select id as p_id, name as p_name from projects) p on a.p_id = p.p_id) b left join
(select id, `name` from risktypes) rt on b.type_id = rt.id
order by r_id';

        $myrisks = DB::select($selectMyRisks);

        return view('RiskManage.showMyRisk', compact('myrisks'));
    }

    public function  toCreateRisk(){

        $selectDevelopers = 'SELECT * FROM users u where u.type = \'developer\'';
        $developers = DB::select($selectDevelopers);

        $selectRiskType = 'select * from risktypes';
        $risktypes = DB::select($selectRiskType);

        $selectProjects = 'select * from projects';
        $projects = DB::select($selectProjects);

        return view('RiskManage.createRisk', compact('projects', 'risktypes', 'developers'));
    }

    public function toCreateRiskType(){
        return view('RiskManage.createRiskType');
    }

    public function toCreateProject(){
        return view('ProjectManage.createProject');
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
