<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{

    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function leave(Request $request)
    {
        $id = $request->input('tournamentID');
        $team = $request->input('participatingteam');
        $tour = DB::table('tournaments')
            ->select('*')
            ->where('tournamentID', $id)
            ->first();
        if($request->expectsJson()){
            if ($tour != null) {
                if ($tour->issolo == 'true') {
                    DB::table('solotournament')
                        ->where('tournamentID', $tour->tournamentID)
                        ->where('accountID', $request->user()->accountID)
                        ->delete();
                    return response()->json(["message" => 'you r now not participating in this tournament'], 200);
                } else {
                    DB::table('nonsolotournament')
                        ->where('tournamentID', $tour->tournamentID)
                        ->where('accountID', $team)
                        ->delete();
                    return response()->json(["message" => 'you r now not participating in this tournament'], 200);
                }
            }
        }else{
            if ($tour != null) {
//            if ($tour->accountID == Auth::user()->accountID) {
//                DB::table('tournaments')
//                    ->where('tournamentID', $id)
//                    ->delete();
//                return $this->viewTournamentList($id);
//            } else {
                if ($tour->issolo == 'true') {
                    DB::table('solotournament')
                        ->where('tournamentID', $tour->tournamentID)
                        ->where('accountID', Auth::user()->accountID)
                        ->delete();
                    return $this->viewTournamentList($request);
                } else {
                    DB::table('nonsolotournament')
                        ->where('tournamentID', $tour->tournamentID)
                        ->where('accountID', $team)
                        ->delete();
                    return $this->viewTournamentList($request);
                }
//            }
            } else return view('welcome')->with('failure', 'team was not deleted successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function leaderboardview(){
        return view('tournament.leaderboard');
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function LeaderBoard(Request $request)
    {
        $solotournaments = DB::table('tournaments as s')
            ->select('*')
            ->where('s.category', $request->category)
            ->where('Issolo', 'true')
            ->join('level as l', 'l.tournamentID', '=', 's.tournamentID')
            ->join('account as a', 'l.accountID', '=', 'a.accountID')
            ->get();
        $nonsolotournaments = DB::table('tournaments as ns')
            ->select('*')
            ->where('ns.category', $request->category)
            ->where('Issolo', 'false')
            ->join('level as l', 'l.tournamentID', '=', 'ns.tournamentID')
            ->join('team as t', 'l.teamID', '=', 't.teamID')
            ->get();
//        print("<pre>".print_r($solotournaments,true)."</pre>");die();
        if($request->expectsJson()){
            return response()->json(["solotournaments" => $solotournaments, "nonsolotournaments" => $solotournaments], 200);
        }

        return view('tournament.leaderboard', compact('solotournaments', 'nonsolotournaments'));

    }

    /**
     * partcipate tournament.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function participate(Request $request)
    {
        $tournamentID = $request->input('tournamentID');
        $accountID = $request->input('accountID');
        $tournament = DB::table('tournaments')
            ->select('*')
            ->where('tournamentID', $tournamentID)
            ->first();
//        print("xxx"); die();
        $mytime = Carbon::now();
        if ($tournament->issolo == 'true') {
            DB::table('solotournament')->insert([
                'tournamentID' => $tournament->tournamentID,
                'accountID' => $accountID,
            ]);
            DB::table('notifications')->insert([
                'message' => 'tournament joined',
                'accountID' => $accountID,
                'date' => $mytime->toDateTimeString(),
                'href' => 'tournamentview/id=' . $tournament->tournamentID,
                'seen' => '0'
            ]);
            if ($request->expectsJson()) {
                return response()->json(["message" => 'you r now participating in this tournament'], 200);
            } else {
                return redirect(url('tournamentview/id=' . $tournament->tournamentID));
            }
        } else {
            $results = DB::table('solotournament')
                ->where('tournamentID', $tournament->tournamentID)
                ->count('accountID');
            if($results<$tournament->nbOfParticipants){
                return redirect(url('tournamentview/id=' . $tournament->tournamentID));
            }
            DB::table('nonsolotournament')->insert([
                'tournamentID' => $tournament->tournamentID,
                'accountID' => $accountID,
            ]);
            $members = DB::table('teammembers')
                ->select('*')
                ->where('teamID', $accountID)
                ->get();
            foreach ($members as $m) {
                DB::table('notifications')->insert([
                    'message' => 'tournament joined',
                    'accountID' => $m->accountID,
                    'date' => $mytime->toDateTimeString(),
                    'href' => 'tournamentview/id=' . $tournament->tournamentID,
                    'seen' => '0'
                ]);
            }
//            return $this->viewTournament($tournamentID);
            if ($request->expectsJson()) {
                return response()->json(["message" => 'you r now participating in this tournament'], 200);
            } else {
                return redirect(url('tournamentview/id=' . $tournament->tournamentID));
            }
        }
    }


    /**
     * Display the specified resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function viewTournament(Request $request, int $id)
    {
        if ($request->expectsJson()) {
            $tournament = DB::table('tournaments')
                ->select('*')
                ->where('tournamentID', $id)
                ->first();
            $team = null;
            $ns = 0;
            $ismember = null;
            $participatingteam = null;
            if ($tournament->issolo == 'true') {
                $members = DB::table('solotournament')
                    ->select('*')
                    ->where('tournamentID', $tournament->tournamentID)
                    ->join('account', 'solotournament.accountID', '=', 'account.accountID')
                    ->get();
                $ismember = 0;
                foreach ($members as $m) {
                    if ($m->accountID ==  $request->user()->accountID) { // check if already a participant
                        $ismember = 1;
                        break;
                    }
                }
            } else {
                $ns = 1;
                $members = DB::table('nonsolotournament')
                    ->where('tournamentID', $tournament->tournamentID)
                    ->join('team', 'nonsolotournament.accountID', '=', 'team.teamID')
                    ->get();
                $team = Team::where('accountID', $request->user()->accountID)->get();
//            print_r($members);die();
                $ismember = 0;
                foreach ($members as $m) {
                    foreach ($team as $t) {
                        if ($m->teamID == $t->teamID) { // check if already a participant
//                        die();
                            $ismember = 1;
                            $participatingteam = $t->teamID;
                            break;
                        }
                    }
                }
            }
            return response()->json(["tournament" => $tournament, "members" => $members, "team" => $team, "ns" => $ns, "ismember" => $ismember, "participatingteam" => $participatingteam], 200);
        } else {
            $tournament = DB::table('tournaments')
                ->select('*')
                ->where('tournamentID', $id)
                ->first();
            $team = null;
            $ns = 0;
            $ismember = null;
            $participatingteam = null;
            if ($tournament->issolo == 'true') {
                $members = DB::table('solotournament')
                    ->select('*')
                    ->where('tournamentID', $tournament->tournamentID)
                    ->join('account', 'solotournament.accountID', '=', 'account.accountID')
                    ->get();
                $ismember = 0;
                foreach ($members as $m) {
                    if ($m->accountID == Auth::user()->accountID) { // check if already a participant
                        $ismember = 1;
                        break;
                    }
                }
            } else {
                $ns = 1;
                $members = DB::table('nonsolotournament')
                    ->where('tournamentID', $tournament->tournamentID)
                    ->join('team', 'nonsolotournament.accountID', '=', 'team.teamID')
                    ->get();
                $team = Team::where('accountID', Auth::user()->accountID)->get();
                $ismember = 0;
                foreach ($members as $m) {
                    foreach ($team as $t) {
                        if ($m->teamID == $t->teamID) { // check if already a participant
                            $ismember = 1;
                            $participatingteam = $t->teamID;
                            break;
                        }
                    }
                }
            }
            return view('tournament.viewtournament', compact('tournament', 'members', 'team', 'ns', 'ismember', 'participatingteam'));
        }
    }

    /**
     * display the teamlist page
     *
     * @param Request $request
     */
    public function search(Request $request)
    {
        $results = null;
        if (
//            !empty($request->title) &&
            !empty($request->category) &&
//            !empty($request->place) &&
            !empty($request->issolo)) {
            if ($request->issolo == 'false') {
                $results = DB::table('nonsolotournament as ns')
                    ->select(array('t.*', DB::raw('COUNT(ns.accountID) as memcount')))
                    ->join('tournaments as t', 't.tournamentID', '=', 'ns.tournamentID')
//                    ->where('t.title', $request->title)
//                    ->where('t.place', $request->place)
                    ->where('t.category', $request->category)
                    ->groupBy('t.tournamentID', 't.accountID', 't.title', 't.category',
                        't.time', 't.place', 't.duration', 't.description', 't.isdeleted', 't.location', 't.tournamentscol', 't.issolo', 'nbOfParticipants')
                    ->get();
            } else {
                $results = DB::table('solotournament as s')
                    ->select(array('t.*', DB::raw('COUNT(s.accountID) as memcount')))
                    ->join('tournaments as t', 't.tournamentID', '=', 's.tournamentID')
//                    ->where('t.title', $request->title)
//                    ->where('t.place', $request->place)
                    ->where('t.category', $request->category)
                    ->groupBy('t.tournamentID', 't.accountID', 't.title', 't.category',
                        't.time', 't.place', 't.duration', 't.description', 't.isdeleted', 't.location', 't.tournamentscol', 't.issolo', 'nbOfParticipants')
                    ->get();
            }
            if ($request->expectsJson()) {
                return response()->json(["results" => $results], 200);
            } else {
                return view('tournament.tournamentlist', compact('results'));
            }
        }

    }

    /**
     * display the teamlist page
     *
     * @param Request $request
     */
    public function viewTournamentList(Request $request)
    {
        $new = DB::table('tournaments as t')
            ->select('*')
            ->get();
        $nonsolo = DB::table('nonsolotournament as ns')
            ->select(array('t.*', DB::raw('COUNT(ns.accountID) as memcount')))
            ->join('tournaments as t', 't.tournamentID', '=', 'ns.tournamentID')
            ->where('t.issolo', 'false')
            ->groupBy('t.tournamentID', 't.accountID', 't.title', 't.category',
                't.time', 't.place', 't.duration', 't.description', 't.isdeleted', 't.location', 't.tournamentscol', 't.issolo', 'nbOfParticipants')
            ->get();
        $solo = DB::table('solotournament as s')
            ->select(array('t.*', DB::raw('COUNT(s.accountID) as memcount')))
            ->join('tournaments as t', 't.tournamentID', '=', 's.tournamentID')
            ->where('t.issolo', 'true')
            ->groupBy('t.tournamentID', 't.accountID', 't.title', 't.category',
                't.time', 't.place', 't.duration', 't.description', 't.isdeleted', 't.location', 't.tournamentscol', 't.issolo', 'nbOfParticipants')
            ->get();
//        print("<pre>" . print_r($solo, true) . "</pre>");die();
        if ($request->expectsJson()) {
            return response()->json(["solo" => $solo, "nonsolo" => $nonsolo], 200);
        }
        return view('tournament.tournamentlist', compact('solo', 'nonsolo', 'new'));
    }

    public function destroy(Request $request, Tournament $tournament): \Illuminate\Http\RedirectResponse
    {
        $tournament->delete();
        return redirect()->back();
    }
}
