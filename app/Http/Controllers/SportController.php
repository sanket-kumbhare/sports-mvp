<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Models\Sport;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::query();
        // dd(Auth::user()->email);
        return Inertia::render(
            'AdminPanel',
            [
                'sports' => $sports->withCount('users')->get(),
                'can' => [
                    'createSport' => Auth::user()->can('create', Sport::class),
                ]
            ]
        );
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
    public function store(StoreSportRequest $request)
    {
        //
        $sport = new Sport();

        $sport->query()
            ->insert([
                'sport' => $request['sport'],
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        dd($sport);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
    }

    /**
     * Show sports on Dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        $user = User::query()
            ->find(Auth::user()->id);

        $sports = Sport::all();

        $subscriptions = $user->sports->map(function ($sport) {
            return $sport->id;
        });

        return Inertia::render('Dashboard', [
            'sports' => $sports,
            'subscriptions' => $subscriptions,
        ]);
    }
}
