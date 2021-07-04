<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Admn;
use App\Models\Events;
use App\Models\Level;
use App\Models\Questions;
use App\Models\Report;
use App\Models\Survey;
use App\Models\Team;
use App\Models\Tournament;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function suggestions()
    {
//        $acc = Account::all();
//        $tour = Tournament::where('category', "football");
//        $res = DB::table('level as l')
//            ->select('*')
//            ->join('tournaments as t', 'l.tournamentID', '=', 't.tournamentID')
//            ->get();
//        $football_sum = 0;
//        $football_count = 0;
//        $football_avg = 0;
//        foreach ($tour as $t) {
//            $level = DB::table('level')->select('*')->where('tournamentID', $t->tournamentID)->get();
//            foreach ($level as $l) {
//
//            }
//        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if (Auth::user()->type == 0) {
            $account = account::all();
//        $account = DB::table('account')->find();
            return view('Admin.index', compact('account'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admn $admn
     * @return \Illuminate\Http\Response
     */
    public function show(Admn $admn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admn $admn
     * @return \Illuminate\Http\Response
     */
    public function edit(Admn $admn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admn $admn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admn $admn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('account.index')->with('success', 'account deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function events()
    {
        $events = Events::all();
        return view('Admin.events', compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create_surveys()
    {
        return view('Admin.createSurvey');
    }

    public function addQuestionsPage(int $id)
    {
        return view('Admin.addQuestion', compact('id'));
    }

    public function getAnswers(int $id)
    {
        $survey = DB::table('survey')->where('surveyID', $id)->first();
        if ($survey != null) {
            $QA = DB::table('questions')
                ->where('surveyID', $id)
                ->join('answer', 'questions.questionID', '=', 'answer.questionID')
                ->get();

//            print("<pre>".print_r($QA,true)."</pre>"); die();
        }
        return view('Admin.answers', compact('QA'));
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return Application|JsonResponse|RedirectResponse|Response|Redirector
     */
    public function createQuestions(Request $request)
    {
        $survey = Questions::create($request->all());
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     * @param Request $request
     * @return Application|JsonResponse|RedirectResponse|Response|Redirector
     */
    public function createsurvey(Request $request)
    {
        $survey = Survey::create($request->all());
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function reports()
    {
        $reports = DB::table('reports')
            ->select('*')->get();
//        print_r($reports);die();
        return view('Admin.reports', compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function surveys()
    {
        $surveys = DB::table('survey')
            ->select('*')->get();
//        print_r($reports);die();
        return view('Admin.surveys', compact('surveys'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function tournaments()
    {
        $tournaments = DB::table('tournaments')
            ->select('*')->get();
//        print_r($reports);die();
        return view('Admin.tournaments', compact('tournaments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create_tournaments()
    {
        return view('Admin.createTournament');
    }


    /**
     * Display the specified resource.
     * @param Request $request
     *
     */
    public function createtournament(Request $request)
    {
        /* $tournament = Tournament::create($request->all());*/
        $tournament = DB::table('tournaments')
            ->insert([
                'accountID' => Auth::user()->accountID,
                'category' => $request->category,
                'location' => $request->location,
                'time' => $request->time,
                'place' => $request->place,
                'duration' => $request->duration,
                'description' => $request->description,
                'isdeleted' => '0',
                'issolo' => $request->issolo,
                'tournamentscol' => $request->tournamentscol,
                'title' => $request->title]);
        /* return redirect()->back();*/
    }


    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function managetournament(int $id)
    {


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
        return view('admin.managetournament', compact('tournament', 'members', 'team', 'ns', 'ismember', 'participatingteam'));
    }


    public function setpoints(Request $request)
    {
        if ($request->issolo=='true') {
            $tournament = DB::table('level')
                ->updateOrInsert(
                    ['accountID' => $request->accountID,
                        'tournamentID' => $request->tournamentID,
                        'teamID' => '0'],
                    ['points' => $request->points]
                );
        } else {

            $acc = DB::table('teammembers')
                ->select('*')
                ->where('teamID', $request->teamID)
                ->get();
            $p = $request->points;
            /*print($request->issolo);
            print($request->teamID);
            print($request->points);
            print_r($request->tournamentID);
            die();*/
            foreach ($acc as $m) {
                $tournament = DB::table('level')
                    ->updateOrInsert(
                        ['accountID' => $m->accountID,
                            'tournamentID' => $request->tournamentID,
                            'teamID'=>$request->teamID],
                        ['points' => $p]
                    );
            }
        }
        return redirect()->back();
    }


}
