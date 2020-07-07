<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = trim($request->input('searchText'));

        $users = Contacts::select('id', 'fname', 'lname', 'email')
                ->where('user_id', Auth::user()->id)
                ->where('fname', 'LIKE', "%$query%")
                ->orwhere('lname', 'LIKE', "%$query%")
                ->orwhere('email', 'LIKE', "%$query%")
                ->orwhere('number', 'LIKE', "%$query%")
                ->paginate(10);

        return view('home', ['contacts' => $users, 'searchText' => $query]);
    }
}
