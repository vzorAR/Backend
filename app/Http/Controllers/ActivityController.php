<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity)
    {
        return $activity->all();
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
        $data_to_insert = [
            'name' => $request->input('name'),
            'count_of_v' => $request->input('count_of_v'),
            'language_id' => $request->input('language_id'),
        ];

        Activity::create($data_to_insert);

        return [
            'hasError' => false,
            'message' => 'Created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return $activity;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return $activity;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $data_to_update = [
            'name' => $request->input('name'),
            'count_of_v' => $request->input('count_of_v'),
            'language_id' => $request->input('language_id'),
        ];

        $activity->update($data_to_update);

        return [
            'hasError' => false,
            'message' => 'Updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Activity::whereIn('id', explode(',', $ids))->delete();

        return [
            'hasError' => false,
            'message' => 'Deleted'
        ];
    }
}
