<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{


    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function eventinvitation(Request $request){
        $elink = substr($request->elink, strpos($request->elink, "=") + 1);
//            print($elink);die();
        $mytime = Carbon::now();
        $acc = Account::where('username',$request->username)->first();
        DB::table('notifications')->insert([
            'message' => 'event invitation',
            'accountID' => $acc->accountID,
            'date' => $mytime->toDateTimeString(),
            'href' => $elink,
            'seen' => '0'
        ]);
        return view('welcome');
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|Response
     */
    public function leave(Request $request)
    {
        $id = $request->input('eventID');
        $event = DB::table('events')
            ->select('*')
            ->where('eventID', $id)
            ->first();
//        print_r($event);die();
        if ($request->expectsJson()) {
            if ($event != null) {
                DB::table('participateevent')
                    ->where('eventID', $id)
                    ->where('accountID', $request->user()->accountID)
                    ->delete();
                return response()->json(["message" => "left successfully"], 200);
            }
        } else {
            if ($event != null) {
                DB::table('participateevent')
                    ->where('eventID', $id)
                    ->where('accountID', Auth::user()->accountID)
                    ->delete();
//            return view('events.eventview', compact('event'));
//            return $this->viewEvent($id);
                return redirect(url('eventview/id=' . $id));
            } else return view('welcome')->with('failure', 'event was not deleted successfully.');
        }
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function participate(Request $request)
    {
        $id = $request->input('eventID');
        $event = DB::table('events')
            ->select('*')
//            ->where('accountID', Auth::user()->accountID)
            ->where('eventID', $id)
            ->first();
//        print_r($event);die();
        if ($request->expectsJson()) {
            DB::table('participateevent')->insert([
                'eventID' => $id,
                'accountID' => $request->user()->accountID,
            ]);
            return response()->json(["message" => "participated successfully"], 200);
        } else {
            if ($event != null) {
                DB::table('participateevent')->insert([
                    'eventID' => $id,
                    'accountID' => Auth::user()->accountID,
                ]);
//            return view('events.eventview', compact('event'));
//            return $this->viewEvent($id);
                return redirect(url('eventview/id=' . $id));


            } else return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $eventID
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|Response
     * @throws \Exception
     */
    public function destroy(Request $request, int $eventID)
    {
        if ($request->expectsJson()) {
            $del = DB::table('events')
                ->select('*')
                ->where('eventID', $eventID)
                ->where('accountID', $request->user()->accountID)
                ->first();
            if ($del != null) {
                DB::table('events')
                    ->where('eventID', $eventID)
//                ->where('accountID', Auth::user()->accountID)
                    ->delete();
                return response()->json(["message" => "deleted successfully"], 200);
            }
            return response()->json(["message" => "not deleted"], 500);
        }
//        print_r($eventID);die();
        $del = DB::table('events')
            ->select('*')
            ->where('eventID', $eventID)
            ->where('accountID', Auth::user()->accountID)
            ->first();
//        print_r($del);die();
        if ($del != null) {
//            $del->steps->delete();
//            $del->delete();
            DB::table('events')
                ->where('eventID', $eventID)
//                ->where('accountID', Auth::user()->accountID)
                ->delete();
            return redirect()->route('events')->with('success', 'event deleted successfully');
        } else return view('welcome')->with('failure', 'event was not deleted successfully.');

    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function viewEvent(Request $request, int $id)
    {
        $event = DB::table('events')
            ->select('*')
            ->where('eventID', $id)
            ->first();
        $participants = DB::table('participateevent')
            ->select('*')
            ->where('eventID', $id)
            ->join('account', 'account.accountID', '=', 'participateevent.accountID')
            ->get();
        if ($request->expectsJson()) {
            $del = 0;
            $par = 1;
            $lea = 0;
            if ($event->accountID == $request->user()->accountID) { // check if creator
                $del = 1;
                $par = 0;
                $lea = 0;
            } else {
                foreach ($participants as $p) {
                    if ($p->accountID == $request->user()->accountID) { // check if already a participant
                        $par = 0;
                        $lea = 1;
                        break;
                    }
                }
            }
            if ($par == 1) $lea == 0;
            return response()->json(["event" => $event, "participants" => $participants, 'del' => $del, 'par' => $par, 'lea' => $lea], 200);
        } else {
            $del = 0;
            $par = 1;
            $lea = 0;
            if ($event->accountID == Auth::user()->accountID) { // check if creator
                $del = 1;
                $par = 0;
                $lea = 0;
            } else {
                foreach ($participants as $p) {
                    if ($p->accountID == Auth::user()->accountID) { // check if already a participant
                        $par = 0;
                        $lea = 1;
                        break;
                    }
                }
            }
            if ($par == 1) $lea == 0;
            return view('events.eventview', compact('event', 'participants', 'del', 'par', 'lea'));
        }
    }

    /**
     * get the ongoing events.
     * the user should be the owner of the event
     * or should have participated in the event.
     *
     * @param Request $request
     */
    public function getOngoingEvents(Request $request)
    {
        if ($request->expectsJson()) {
            $events = DB::table('participateevent')
                ->where('participateevent.accountID', $request->user()->accountID)
                ->leftJoin('events', 'participateevent.eventID', '=', 'events.eventID')
                ->where('time', '>=', Carbon::now()->toDateString())
                ->get();
            return response()->json(["events" => $events], 200);
        } else {
            $events = DB::table('participateevent')
                ->where('participateevent.accountID', Auth::user()->accountID)
                ->leftJoin('events', 'participateevent.eventID', '=', 'events.eventID')
                ->where('time', '>=', Carbon::now()->toDateString())
                ->get();
            $pubevents = DB::table('events')
                ->where('private', "no")
                ->get();
            return view('events.events', compact('events', 'pubevents'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       $request->validate([
            'time' => 'required',
            'title' => 'required',
            'place' => 'required',
            //'location',
            'description' => 'required',
            'private' => 'required'
        ]);
//        DB::table('events')->insert([
//            'time' => $request->time,
//            'title' => $request->title,
//            'place' => $request->place,
//            'description' => $request->description,
//            'accountID' => Auth::user()->accountID,
//        ]);
        if ($request->expectsJson()) {

//            auth('api')->user();
//            $user = Auth::guard('users')->user();
            $event = Events::create(array_merge($request->all(), ['accountID' => $request->user()->accountID]));
            DB::table('participateevent')->insert([
                'eventID' => $event->eventID,
                'accountID' => $request->user()->accountID
            ]);
            return response()->json(["message" => "event created successfully", "event" => $event], 200);
        } else {
            $event = Events::create(array_merge($request->all(), ['accountID' => Auth::user()->accountID]));
//        $event = Events::where('accountID', Auth::user()->accountID)->where('title', $request->title)->first();
//        $event = DB::table('events')
//            ->select('*')
//            ->where('accountID', Auth::user()->accountID)
//            ->where('title', $request->title)
//            ->first();
//        print_r($event); die();
            if ($event != null) {
                //insert the creator as participant
                DB::table('participateevent')->insert([
                    'eventID' => $event->eventID,
                    'accountID' => Auth::user()->accountID
                ]);
//            return $this->viewEvent($event->eventID);
                return redirect(url('eventview/id=' . $event->eventID));
            } else return view('welcome');
        }
    }


}


