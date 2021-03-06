<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //return product
      $bookID = 1;
      $collectData = DB::table('transactions')->where('booking_id', $bookID)->first();

      $user = User::find(Auth::id());
      //check if the user has admin role
      if ($user->role_id != '3')
      {
        // need to be admin
        return view('staffadmin.pages.dashboard', compact('collectData'));
      }

        return view('home');
    }

    /**
     * Registration of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function userRegistration(Request $request)
    {
      // Validate
    $this->validate($request,[
      'soc' => 'required',
      'post' => 'required',
      'tel' => 'nullable|integer'
    ]);
    //get the user you want to update field
    $user = User::find(Auth::id());

    //Check if the the user mobile number is present.
    if($request->has('tel'))
    {
      //Check if the
      $user->mobile = $request->input('tel');
    }

    $user->society = $request->input('soc');
    $user->post = $request->input('post');
    $user->save();
    return redirect('/');
    }

}
