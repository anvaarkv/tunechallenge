<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $jsonPath =  storage_path() . "/data/users.json";
//        $userJson = file_get_contents($jsonPath);
//        $users = json_decode($userJson, true);
//        $data = array_filter($users);
//        $users = collect($data)->when(!empty($id),function($collection) use($id){
//            return $collection->where("id","LIKE",$id);
//        })
//            //->take(25)
//            ->get();
////        dd($users);
//        $jsonPath =  storage_path() . "/data/logs.json";
//        $logsData = file_get_contents($jsonPath);
//        $logs = json_decode($logsData, true);
//        $data = array_filter($logs);
//        $logs = collect($data)->where('user_id',45);
//        $result = $logs->pipe(function ($collection) {
//            return collect([
//                'total_record' => $collection->count('user_id'),
//                'total_impression' => $collection->where('type','impression')->count('user_id'),
//                'total_conversion' => $collection->where('type','conversion')->count('user_id'),
//                'total_revenue' => $collection->where('type','conversion')->sum('revenue'),
////                'per_day_revenue_raw' => $collection->where('type','conversion'),
//                'per_day_revenue' => $collection->where('type','conversion')->groupBy(DB::Raw('DATE(time)'))
//            ]);
//        });
//        return view('dashboard',compact('users','logs','result'));
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
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
