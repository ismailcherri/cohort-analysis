<?php

namespace App\Http\Controllers;

use App\RetentionStat;

class RetentionStatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(RetentionStat::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RetentionStat $retentionStat
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(RetentionStat $retentionStat)
    {
        return response()->json($retentionStat);
    }

    /**
     * Returns weekly cohors
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function weeklyCohorts(){
        return response()->json(RetentionStat::getWeeklyCohorts());
    }
}
