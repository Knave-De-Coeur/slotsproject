<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 14/09/2018
 * Time: 15:09
 */

namespace App\Http\Controllers;

use Illuminate\http\Request;

class SlotMachineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($username)
    {
        return view('slot-machine')->with($username);
    }

    public function SlotMachine(Request $request)
    {
        $username = $request->input('username');

        return redirect()->route('slotmachine', ['username' => $username]);
    }


//    public function ResultView($view, $data = null)
//    {
//        if (request()->ajax()) {
//            return View::make($view)->with($data)->renderSections()['content'];
//        }
//        return view($view)->with($data);
//    }

    //
}
