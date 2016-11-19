<?php

namespace App\Http\Controllers;

use App\Risk;
use App\RiskUpdate;
use App\RiskType;
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
        $input['condition'] = 'potential';
        //存入数据库
        Risk::create($input);
        //重定向
        return redirect('/createrisk');

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 更新风险状态
     */
    public function updateRiskCondition($id, Request $request)
    {
        $input = $request->all();
        $user_id = Auth::user()->id;
        $risk_id = $id;
        $operation = 'update';
        $condition = $input['condition'];
        $updateRisk = 'update risks set `condition` = "'.$condition.'" where id = '.$risk_id;
        DB::update($updateRisk);

        $this->addRiskUpdateRecord($user_id, $risk_id, $operation);

        return redirect('/myrisk');
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 更新风险跟踪者
     */
    public function updateRiskTracker($id, Request $request)
    {
        $input = $request->all();
        $user_id = Auth::user()->id;
        $risk_id = $id;
        $operation = 'update';
        $tracker_id = $input['tracker_id'];
        $updateRisk = 'update risks set tracker_id = '.$tracker_id.' where id = '.$risk_id;
        DB::update($updateRisk);

        $this->addRiskUpdateRecord($user_id, $risk_id, $operation);

        return redirect('/home');
    }

    public function addRiskUpdateRecord($riskID, $userID, $operation){
        $input['r_id'] = $riskID;
        $input['u_id'] = $userID;
        $input['content'] = $operation;
        RiskUpdate::create($input);
    }

    public function createRiskType(Request $request){
        $input = $request->all();

        RiskType::create($input);

        return redirect('/createrisktype');
    }

    public function createRiskPage(){


        $selectDevelopers = 'SELECT * FROM users u where u.type = \'developer\'';
        $developers = DB::select($selectDevelopers);

        $selectRiskType = 'select * from risktypes';
        $risktypes = DB::select($selectRiskType);

        $selectProjects = 'select * from projects';
        $projects = DB::select($selectProjects);

//        return view('RiskManage.createRisk')->with('projects', $projects)->with('developers', $developers)->with('riskTypes', $risktypes);
        return view('RiskManage.createRisk', compact('projects', 'risktypes', 'developers'));
    }

    /**
     * 显示所有风险
     */
    public function showAllRisk(){

//        $selectRisks = 'select * from risks';
//        $selectRisks = 'SELECT * FROM riskmanage.risks r left join riskmanage.users u on r.creator_id = u.id';
//        $risks = DB::select($selectRisks);
        $selectRisks = 'select r_id, p_id, creator_id, tracker_id, content, `condition`, possibility, effect, `trigger`,
 creator_name, c.u_name as tracker_name, p.name as p_name, rt.name as type_name, b.created_at from
(select r.id as r_id, p_id, creator_id, tracker_id, content, possibility, effect,
`trigger`, created_at, a.u_name as creator_name, type_id, `condition`
from risks r left join (select u.id as u_id, name as u_name from users u) a on r.creator_id = a.u_id) b left join
(select u.id as u_id, name as u_name from users u) c on b.tracker_id = c.u_id left join projects p on b.p_id = p.id
left join risktypes rt on b.type_id = rt.id
order by p_id, r_id';

        $risks = DB::select($selectRisks);

        $selectDevelopers = 'SELECT * FROM users u where u.type = \'developer\'';
        $developers = DB::select($selectDevelopers);

        return view('RiskManage.showAllRisk', compact('risks', 'developers'));
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
