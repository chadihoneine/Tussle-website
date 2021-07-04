<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Team;
use App\Models\TeamMembers;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

class TeamController extends Controller
{

    public $maxmembers = 15;

    /**
     * Display the specified resource.
     * @param Request $request
     * @return Application|\Illuminate\Http\JsonResponse|RedirectResponse|Redirector
     */
    public function kick(Request $request)
    {
        DB::table('teammembers')
            ->select('*')
            ->where('teamID', $request->teamID)
            ->where('accountID', $request->accountID)
            ->delete();
        if($request->expectsJson()){
            return response()->json(["message" => "User kicked successfully "], 200);
        }
        return redirect(url('teamview/id=' . $request->teamID));
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return Application|\Illuminate\Http\JsonResponse|RedirectResponse|Response|Redirector
     */
    public function teaminvitation(Request $request){

        if($request->has('username')) {
            $id = Account::where('username', $request->username)->first();
        } else {
            $id = Account::where('accountID', $request->accountID)->first();
        }
        $mytime = Carbon::now();
        DB::table('notifications')->insert([
            'message' => 'team invitation',
            'accountID' => $id->accountID,
            'date' => $mytime->toDateTimeString(),
            'href' => 'teamview/id=' . $request->elink,
            'seen' => '0'
        ]);
        return redirect()->back();
    }

    /**
     * saves the image to the team
     * @param Request $request
     * @param string $imageName
     */
    public static function save_image(Request $request, string $imageName)
    {
        $team = Team::where('teamID', $request->id)->first();
//        print_r($team);die();
        $team->image = "images/" . $imageName;
        $team->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return Application|\Illuminate\Http\JsonResponse|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, int $teamid)
    {
        $request->validate([
            'teamName',
            'description'
        ]);
        DB::table('team')
            ->where('teamID', $teamid)
            ->update([
                'teamName' => $request->teamName,
                'description' => $request->description,
//                'image' => $image
            ]);
        if($request->expectsJson()){
            return response()->json(["message" => "team updated successfully"], 200);
        }else{
            return redirect(url('teamview/id=' . $teamid));

        }
//        return $this->viewTeam($team->teamID);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return Response
     */
    public function edit(Team $team)
    {
        return view('teams.editteam', compact('team'));
    }

    /**
     * display the teamlist page
     *
     * @param Request $request
     */
    public function search(Request $request)
    {
        if($request->submit == "Suggest"){
            return $this->suggest($request);
        }

        $results = null;
        //Runs only if the search has something in it.
        if (!empty($request->teamName) && !empty($request->category)) {
            $results = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
                ->where('t.teamName', $request->teamName)
                ->where('t.category', $request->category)
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
        } else if (!empty($request->teamName) && empty($request->category)) {
            $results = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
                ->where('t.teamName', $request->teamName)
//                ->where('t.category', $request->category)
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
        } else if (empty($request->teamName) && !empty($request->category)) {
            $results = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
//                ->where('t.teamName', $request->teamName)
                ->where('t.category', $request->category)
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
        }
        if($request->expectsJson()){
            return response()->json(["results" => $results], 200);
        } else {
            return view('teams.teamsearch', compact('results'));
        }
    }
//bookmark
    /**
     * display the teamlist page
     *
     * @param Request $request
     */
    public function viewTeamList(Request $request)
    {
        if ($request->expectsJson()) {
            $accid = $request->user()->accountID;
            $team = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
                ->join('teammembers as tm2', function ($join) use ($accid) {
                    $join->on('tm2.teamID', '=', 't.teamID')
                        ->where('tm2.accountID', $accid);
                })
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
            return response()->json(["teams" => $team], 200);
        } else {
            $team = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
                ->join('teammembers as tm2', function ($join) {
                    $join->on('tm2.teamID', '=', 't.teamID')
                        ->where('tm2.accountID', Auth::user()->accountID);
                })
//            ->where('tm.accountID', Auth::user()->accountID)
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
//        $team = DB::table('teammembers as tm')
//            ->select(array('tm.teamID', DB::raw('COUNT(tm.accountID) as memcount')))
//            ->join('team as t', 't.teamID', '=', 'tm.teamID')
////            ->join('teammembers as tm2', function($join)
////            {
////                $join->on('tm2.teamID', '=', 't.teamID')
////                    ->where('tm2.accountID', Auth::user()->accountID);
////            })
////            ->where('tm.accountID', Auth::user()->accountID)
//            ->groupBy('tm.teamID')
//            ->get();
//        print_r($team);die();
//        $memcount = DB::table('teammembers')->distinct()->count('teamID');
//                print_r($memcount);die();
            return view('teams.teamlist', compact('team'));
        }
    }

    /**
     * insert the join request to db.
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function joinRequest(Request $request)
    {
        $id = $request->input('teamID');
//                print_r($id);die();
        $team = DB::table('team')
            ->select('*')
            ->where('teamID', $id)
            ->first();
        if ($request->expectsJson()) {
            $mem = DB::table('teammembers')
                ->select('*')
                ->where('teamID', $id)
                ->where('accountID', $request->user()->accountID)
                ->first();
            $req = DB::table('teamrequest')
                ->select('*')
                ->where('teamID', $id)
                ->where('accountID', $request->user()->accountID)
                ->first();
            if ($team != null && $mem == null && $req == null) {
                DB::table('teamrequest')->insert([
                    'teamID' => $id,
                    'accountID' => $request->user()->accountID,
                ]);
                return response()->json(["message" => "team request sent"], 200);
            }
        } else {
            $mem = DB::table('teammembers')
                ->select('*')
                ->where('teamID', $id)
                ->where('accountID', Auth::user()->accountID)
                ->first();
            $req = DB::table('teamrequest')
                ->select('*')
                ->where('teamID', $id)
                ->where('accountID', Auth::user()->accountID)
                ->first();
//        print_r($team);die();
            if ($team != null && $mem == null && $req == null) {
                DB::table('teamrequest')->insert([
                    'teamID' => $id,
                    'accountID' => Auth::user()->accountID,
                ]);
//            return $this->viewTeam($id);
                return redirect(url('teamview/id=' . $team->teamID));
            } else return view('welcome');
        }

    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return Application|\Illuminate\Http\JsonResponse|RedirectResponse|Response|Redirector
     */
    public function participate(Request $request)
    {
        $teamID = $request->input('teamID');
        $accountID = $request->input('accountID');
        $team = DB::table('team')
            ->select('*')
            ->where('teamID', $teamID)
            ->first();


        $results = DB::table('teammembers')
            ->where('teamID', $teamID)
            ->count('accountID');
        if($results >= $this->maxmembers) {
            return redirect(url('teamview/id=' . $team->teamID));
        }


//        print_r($event);die();
        if ($team != null) {
            DB::table('teamrequest')
                ->where('teamID', $teamID)
                ->where('accountID', $accountID)
                ->delete();
            DB::table('teammembers')->insert([
                'teamID' => $teamID,
                'accountID' => $accountID,
            ]);
            $mytime = Carbon::now();
            DB::table('notifications')->insert([
                'message' => 'team request accepted',
                'accountID' => $accountID,
                'date' => $mytime->toDateTimeString(),
                'href' => 'teamview/id=' . $teamID,
                'seen' => '0'
            ]);
            DB::table('group_user')->insert([
                'group_id' => $team->teamID,
                'user_id' => $accountID
            ]);
            if ($request->expectsJson()) {
                return response()->json(["message" => "you are now a participant in team: " . $team->teamName], 200);
            }
//            return $this->viewTeam($teamID);
            return redirect(url('teamview/id=' . $team->teamID));
        } else return view('welcome');
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function leave(Request $request)
    {
        $id = $request->input('teamID');
        $team = DB::table('team')
            ->select('*')
            ->where('teamID', $id)
            ->first();
//        print_r($team);die();
        if ($request->expectsJson()) {
            if ($team != null) {
                if ($team->accountID == $request->user()->accountID) {
                    DB::table('team')
                        ->where('teamID', $id)
                        ->delete();
                    return response()->json(["message" => "team deleted since the admin left"], 200);
                } else {
                    DB::table('teammembers')
                        ->where('teamID', $id)
                        ->where('accountID', $request->user()->accountID)
                        ->delete();
                    return response()->json(["message" => "team left"], 200);
                }
            }
        } else {
            if ($team != null) {
                if ($team->accountID == Auth::user()->accountID) {
                    DB::table('team')
                        ->where('teamID', $id)
                        ->delete();
                    return view('Teams.CreateTeams');
                } else {
                    DB::table('teammembers')
                        ->where('teamID', $id)
                        ->where('accountID', Auth::user()->accountID)
                        ->delete();
//                return $this->viewTeam($id);
                    return redirect(url('teamview/id=' . $team->teamID));
                }
            } else return view('welcome')->with('failure', 'team was not deleted successfully.');
        }

    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function viewTeam(Request $request, int $id)
    {
        $suggest = $this->suggest_members($id);

        $team = Team::where('teamID', $id)->first();
        // later: members and requests
//        $members = TeamMembers::where('teamID', $team->teamID)->get();
//        $members = TeamMembers::with(['account','team'])->where('teamID', 11)->get();
//        print_r($members->account->username); die();
        $members = DB::table('teammembers')
            ->select('*')
            ->where('teamID', $team->teamID)
            ->join('account', 'teammembers.accountID', '=', 'account.accountID')
            ->get();
        $requests = DB::table('teamrequest')
            ->select('*')
            ->where('teamID', $team->teamID)
            ->join('account', 'teamrequest.accountID', '=', 'account.accountID')
            ->get();
//        print("<pre>".print_r($members,true)."</pre>");die();
//        $participants = DB::table('participatetournament')
//            ->select('*')
//            ->where('tournamentID', $id)
//            ->join('account', 'account.accountID', '=', 'participatetournament.accountID')
//            ->get();
        if ($request->expectsJson()) {
            $ismember = 0;
            foreach ($members as $m) {
                if ($m->accountID == $request->user()->accountID) { // check if already a participant
                    $ismember = 1;
                    break;
                }
            }
            return response()->json(["team" => $team, "members" => $members, "requests" => $requests, "ismember" => $ismember], 200);
        }
        $ismember = 0;
        foreach ($members as $m) {
            if ($m->accountID == Auth::user()->accountID) { // check if already a participant
                $ismember = 1;
                break;
            }
        }
        return view('teams.team', compact('team', 'members', 'requests', 'ismember', 'suggest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function store(Request $request)
    {
        if ($request->expectsJson()) {
            $team = Team::create(array_merge($request->all(), ['accountID' => $request->user()->accountID]));
            if ($team != null) {
                DB::table('teammembers')->insert([
                    'teamID' => $team->teamID,
                    'accountID' => $request->user()->accountID
                ]);
                $group = DB::table('groups')->insert([
                    'name' => $team->teamName,
                    'id' => $team->teamID
                ]);
                DB::table('group_user')->insert([
                    'group_id' => $team->teamID,
                    'user_id' => $request->user()->accountID
                ]);
                return response()->json(["teamID" => $team->teamID, "message" => "team created successfully"], 200);
            }
        } else {
//        print($request);die();
            $request->validate([
                'teamName' => 'required',
                'category' => 'required',
                'isCompetitive' => 'required',
                'description' => 'required'
            ]);
//        DB::table('teams')->insert([
//            'name' => $request->name,
//            'category' => $request->category,
//            'type' => $request->type,
//            'description' => $request->description,
//            'accountID' => Auth::user()->accountID,
//        ]);
            $team = Team::create(array_merge($request->all(), ['accountID' => Auth::user()->accountID]));
//        $team = Team::where('accountID', Auth::user()->accountID)->where('teamName', $request->teamName)->first();
//        $event = DB::table('events')
//            ->select('*')
//            ->where('accountID', Auth::user()->accountID)
//            ->where('title', $request->title)
//            ->first();
//        print_r($event); die();
            if ($team != null) {
                DB::table('teammembers')->insert([
                    'teamID' => $team->teamID,
                    'accountID' => Auth::user()->accountID
                ]);

//            return $this->viewTeam($team->teamID);
                $group = DB::table('groups')->insert([
                    'name' => $team->teamName,
                    'id' => $team->teamID
                ]);
                DB::table('group_user')->insert([
                    'group_id' => $team->teamID,
                    'user_id' => Auth::user()->accountID
                ]);
//                $users = collect(request('users'));
//                $users->push(auth()->user()->id);
//                $group->users()->attach($users);
//                broadcast(new GroupCreated($group))->toOthers();
//                return $group;
                return redirect(url('teamview/id=' . $team->teamID));
            } else return view('welcome')->with('failure', 'account was not created successfully.');
        }
    }

    public function suggest(Request $request){
        $user_points = DB::table('level')
            ->where('accountID',Auth::id())
            ->sum('points');

        $result2 = DB::table('level as l')
            ->select('l.accountID','l.points','tm.teamID')
            ->join('teammembers as tm','tm.accountID','=','l.accountID')
            ->get();

        /*$result2 = DB::table('teammembers as tm')
            ->select('*')
            ->join('level as l','tm.accountID','=','l.accountID')
            ->get();*/


        /*$results = DB::table('level as l')
            ->select(array('t.*', DB::raw('SUM(l.points) as memcount')))
            ->join('team as t', 't.teamID', '=', 'l.teamID')
            ->where('t.category', $request->category)
            ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                't.points', 't.category', 't.image', 't.description')
            ->get();*/


        $results = DB::table('teammembers as tm')
            ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
            ->join('team as t', 't.teamID', '=', 'tm.teamID')
            ->where('t.category', $request->category)
            ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                't.points', 't.category', 't.image', 't.description')
            ->get();

        foreach ($results as $t){
            $t->points = 0;
            $count = 0;
            foreach ($result2 as $r){
                if($r->teamID == $t->teamID){
                    $t->points =+ $r->points;
                    $count++;
                }
            }
            $t->points  = abs($t->points/$count - $user_points);
        }

        $results = collect($results)->sortBy('points')->toArray();

        /*echo $user_points.''.nl2br("\n");
        foreach ($results as $t){
            print_r ($t);
            print (nl2br("\n"));
        }

        die();*/

        return view('teams.teamsearch', compact('results'));

    }

    public function suggest_members(int $id): array
    {

        $team_members_points = DB::table('teammembers as tm')
            ->select('*')
            ->where('tm.teamID','=',$id)
            ->join('level as l','l.accountID','tm.accountID')
            ->get();

        $team_members = DB::table('teammembers as tm')
            ->select('*')
            ->where('tm.teamID','=',$id)
            ->get();

        $team_points = 0;
        foreach ($team_members_points as $tm) {
            $team_points += $tm->points;
        }

        $team_points = abs( $team_points / count($team_members) );

        $other_users = DB::table('account as a')
            ->select('a.accountID','image','f_name','l_name','username')
            //->join('level as l','l.accountID','tm.accountID')
            ->get();

        $result = null;
        $ind = 0;
        foreach ($other_users as $user){
            $flag = true;
            foreach ($team_members as $tm){
                if($user->accountID == $tm->accountID){
                    $flag = false;
                    break;
                }
            }
            if($flag == true){
                $user->points = abs(DB::table('level as l')
                        ->where('accountID',$user->accountID)
                        ->average('points') - $team_points);
                $result[$ind] = $user;
                $ind++;
            }
        }

        $result = collect($result)->sortBy('points')->toArray();
        \array_splice($result, 4);

        /*print_r($team_points);
        foreach ($result as $tp){
            print_r($tp);
            print (nl2br("\n"));
        }
        die();*/
        return $result;

    }

    /*
     * if (!empty($request->teamName) && !empty($request->category)) {
            $results = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
                ->where('t.teamName', $request->teamName)
                ->where('t.category', $request->category)
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
        } else if (!empty($request->teamName) && empty($request->category)) {
            $results = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
                ->where('t.teamName', $request->teamName)
//                ->where('t.category', $request->category)
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
        } else if (empty($request->teamName) && !empty($request->category)) {
            $results = DB::table('teammembers as tm')
                ->select(array('t.*', DB::raw('COUNT(tm.accountID) as memcount')))
                ->join('team as t', 't.teamID', '=', 'tm.teamID')
//                ->where('t.teamName', $request->teamName)
                ->where('t.category', $request->category)
                ->groupBy('t.teamID', 't.accountID', 't.teamName', 't.isCompetitive',
                    't.points', 't.category', 't.image', 't.description')
                ->get();
        }
        if($request->expectsJson()){
            return response()->json(["results" => $results], 200);
        } else {
            return view('teams.teamsearch', compact('results'));
        }
     */

}
