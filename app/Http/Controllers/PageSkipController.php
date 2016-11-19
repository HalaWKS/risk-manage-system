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

    public function toAllManagePlan()
    {
        $selectManagePlan = 'select * from
(select plan_id, `name` as plan_name, r_id as risk_id from plancontent pc left join riskmanageplan rmp on pc.plan_id = rmp.id) t1
left join
(select r_id, p_id, creator_id, tracker_id, content, `condition`, possibility, effect, `trigger`,
 creator_name, c.u_name as tracker_name, p.name as p_name, rt.name as type_name, b.created_at from
(select r.id as r_id, p_id, creator_id, tracker_id, content, possibility, effect,
`trigger`, created_at, a.u_name as creator_name, type_id, `condition`
from risks r left join (select u.id as u_id, name as u_name from users u) a on r.creator_id = a.u_id) b left join
(select u.id as u_id, name as u_name from users u) c on b.tracker_id = c.u_id left join projects p on b.p_id = p.id
left join risktypes rt on b.type_id = rt.id) t2 on t1.risk_id = t2.r_id
order by plan_id, risk_id';

        $managePlans = DB::select($selectManagePlan);

        return view('RiskManage.showAllPlan', compact('managePlans'));

    }


    public function toCreateManagePlan()
    {

//        $riskSortCtrl = new RiskSortController();
//        $risks = $riskSortCtrl->sortByRecognize();
        $selected = 'select r.id as r_id,p.id as p_id,cu.id as creator_id,tu.id as tracker_id,r.content,r.condition,r.possibility,r.effect,r.trigger,cu.name as creator_name,tu.name  as tracker_name,p.name as p_name,t.name as type_name,r.created_at,sort.numbers as num from risks r
		left join projects p on r.p_id=p.id
			left join users cu on r.creator_id=cu.id
				left join users tu on r.tracker_id=tu.id
					left join risktypes t on r.type_id = t.id
						left join (select rt1.id as id,rt1.name as type_name,count(rt1.id) as numbers
				from  risks r1 left join risktypes rt1 on r1.type_id = rt1.id
					where r1.condition=\'potential\'
						group by r1.type_id order by count(rt1.id) desc) as sort on r.type_id = sort.id
							order by num desc,type_name,p_id';
        $risks = DB::select($selected);
        return view('RiskManage.createRiskManagePlan', compact('risks'));
    }


    public function toMyRisk()
    {
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

    public function  toCreateRisk()
    {

        $selectDevelopers = 'SELECT * FROM users u where u.type = \'developer\'';
        $developers = DB::select($selectDevelopers);

        $selectRiskType = 'select * from risktypes';
        $risktypes = DB::select($selectRiskType);

        $selectProjects = 'select * from projects';
        $projects = DB::select($selectProjects);

        return view('RiskManage.createRisk', compact('projects', 'risktypes', 'developers'));
    }

    public function toCreateRiskType()
    {

        $selectRiskType = 'select * from risktypes order by id';
        $risktypes = DB::select($selectRiskType);

        return view('RiskManage.createRiskType', compact('risktypes'));
    }

    public function toCreateProject()
    {

        $selectProjects = 'select * from projects order by id';
        $projects = DB::select($selectProjects);

        return view('ProjectManage.createProject', compact('projects'));
    }

    public function toStatistic()
    {

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
