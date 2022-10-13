<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;

class SubscriberController extends Controller
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
     * @param  \App\Http\Requests\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $Subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $Subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriberRequest  $request
     * @param  \App\Models\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriberRequest $request, Subscriber $Subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $Subscriber)
    {
        //
    }
}
