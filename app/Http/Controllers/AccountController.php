<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\URL;
use const http\Client\Curl\AUTH_ANY;

class AccountController extends Controller
{

    public static function ncount()
    {
        if (\Auth::check()) {
            $notifications = DB::table('notifications')
                ->where('accountID', Auth::user()->accountID)
                ->where('seen', '0')
                ->orderBy('date')
                ->count();
//print_r($notifications);die();
            return $notifications;
        }
    }

    /**
     * display the notifications page
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse|Response
     */
    public function viewNotifications(Request $request)
    {
        if ($request->expectsJson()) {
            $notifications = DB::table('notifications')
                ->where('accountID', $request->user()->accountID)
                ->orderBy('date')
                ->get();
            foreach ($notifications as $n) {
                DB::table('notifications')
                    ->where('notificationsID', $n->notificationsID)
                    ->update(array('seen' => '1'));
            }
            return response()->json(["notifications" => $notifications], 200);
        } else {
            $notifications = DB::table('notifications')
                ->where('accountID', Auth::user()->accountID)
                ->orderBy('date')
                ->get();
            foreach ($notifications as $n) {
                DB::table('notifications')
                    ->where('notificationsID', $n->notificationsID)
                    ->update(array('seen' => '1'));
            }
            return view('account.notifications', compact('notifications'));
        }
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return Response
     */
    public function report(Request $request)
    {
        $id = $request->input('reportedID');
        $reason = $request->input('reason');
        $message = $request->input('message');
        $account = DB::table('account')
            ->select('*')
            ->where('accountID', $id)
            ->first();
        $mytime = Carbon::now();
        if ($account != null) {
            $already_reported = DB::table('reports')
                ->select('*')
                ->where('reportedID', $id)
                ->where('reporterID', Auth::user()->accountID)
                ->first();
            if ($already_reported == null) {
                DB::table('reports')->insert([
                    'reportedID' => $id,
                    'reporterID' => Auth::user()->accountID,
                    'date' => $mytime->toDateTimeString(),
                    'reason' => $reason,
                    'message' => $message
                ]);
                return view('welcome');
            }
        } else
            return view('welcome');
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function viewprofile(Request $request, int $id)
    {
        if($id == 0) {
            $id = $request->user()->accountID;
        }
        $account = DB::table('account')
            ->select('*')
            ->where('accountID', $id)
            ->first();
        if ($request->expectsJson()) {
            return response()->json(['account'=>$account], 200);
        }
        return view('account.viewprofile', compact('account'));
    }

    /**
     * saves the image to the user
     * @param Request $request
     * @param string $imageName
     */
    public static function save_image(Request $request, string $imageName)
    {
        $account = Auth::user();
        $account->image = "images/" . $imageName;
        $account->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->type == 0){
            return view('admin.Create');
        }
        return view('account.Create');
    }

    /**
     * Show the profile page.
     *
     * @return Response
     */
    public function profile()
    {
        return view('account.Profile');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'type',
            'email' => 'required|email|unique:account,email',
            'password' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'bOD' => 'required',
            'f_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'l_name' => 'required|regex:/^[a-zA-Z]+$/u'
        ]);

        $user =  Account::create($request->all());



        if ($user != null) {
            DB::table('users')->insert([
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            if ($request->expectsJson()) {
                return response()->json(["message" => "account created successfully"], 200);
            } else {
                Auth::login($user);
                return view('welcome')->with('success', 'account created successfully.');
            }
        }
        if ($request->expectsJson()) {
//            return response()->json(["message" => "account was not created successfully"], 500);
        } else return redirect()->route('account.create')->with('failure', 'account was not created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Account $account
     * @return Response
     */
    public function show(Account $account)
    {
        return view('admin.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @return Response
     */
    public function edit(Account $account)
    {
        return view('admin.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $account
     * @return Application|\Illuminate\Contracts\Routing\UrlGenerator|JsonResponse|RedirectResponse|string
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'type',
            'email',
            'password',
            'username',
            'gender',
            'country',
            'bOD',
            'ban',
            'creationDate',
            'f_name',
            'l_name',
            'image',
            'about'
        ]);
        if ($request->expectsJson()) {
            $user = Account::where('accountID', $request->user()->accountID)->first();
            $user->update($request->all());
            return response()->json(["message" => "updated successfully", "account" => $user], 200);
        }
        $account->update($request->all());
        if(Auth::user()->type == 0){
            return Redirect::back()->with('message','Operation Successful !');
        }else {
            return redirect()->route('profile')->with('success', 'account updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Account $account
     * @return JsonResponse|RedirectResponse|Response
     * @throws \Exception
     */
//    public function destroy(Request $request, Account $account, int $id)
//    {
//        if ($request->expectsJson()) {
//            $user = Account::where('accountID', $id)->first();
//            $user->delete();
//            return response()->json(["message" => "deleted successfully"], 200);
//        }
//        $account->delete();
//        return redirect()->route('account.index')->with('success', 'account deleted successfully');
//    }
    public function destroy(Request $request, Account $account)
    {
        if ($request->expectsJson()) {
            $user = $request->user();
            $user->delete();
            return response()->json(["message" => "deleted successfully"], 200);
        }
        $account->delete();
        return redirect()->back();
//        return redirect()->route('account.index')->with('success', 'account deleted successfully');
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param Account $account
//     * @return RedirectResponse
//     * @throws \Exception
//     */
//    public function destroyprofile(int $account)
//    {
//
//        print($account);
//        die();
//        //$request->id->delete();
//        $account->delete();
//        return redirect()->route('account.index')->with('success', 'account deleted successfully');
//    }

}
