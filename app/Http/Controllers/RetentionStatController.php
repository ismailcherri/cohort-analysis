<?php

namespace App\Http\Controllers;

use App\RetentionStat;

class RetentionStatController extends Controller
{
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
}
