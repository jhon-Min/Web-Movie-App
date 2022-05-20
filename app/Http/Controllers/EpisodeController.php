<?php

namespace App\Http\Controllers;

use App\Models\episode;
use App\Http\Requests\StoreepisodeRequest;
use App\Http\Requests\UpdateepisodeRequest;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreepisodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreepisodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(episode $episode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateepisodeRequest  $request
     * @param  \App\Models\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateepisodeRequest $request, episode $episode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(episode $episode)
    {
        //
    }
}
