<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = 0;//auth()->user()->unreadNotifications()->orderby('created_at', 'DESC')->limit(5)->get();
        $noOfUsers = 0;//User::count();
        $noOfCandidate = 0;//Candidate::count();
        $noOfCompany = 0;//Company::count();
        $noOfContactusMessages = 0;//ContactUs::where('status', 'Not Reviewed')->count();
        $noOfActiveNews = 0;//News::where('status', 'Active')->count();
        $noOfDeActiveNews = 0;//News::where('status', 'DeActive')->count();

        return view('adminpanel/pages/dashboard', compact('noOfUsers', 'noOfCandidate', 'noOfCompany', 'noOfContactusMessages', 'noOfActiveNews', 'noOfDeActiveNews', 'notifications'));
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
