<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Models\Sport;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        return Inertia::render(
            'AdminPanel',
            [
                'sports' => $sports
                    ->with('users')
                    ->withCount('users')
                    ->get(),
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
        $users = Sport::query()
            ->find($sport->id)
            ->users()
            ->get();

        return Inertia::render(
            'AdminPanel',
            ['users' => $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
            })]
        );;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        return Inertia::render(
            'UpdateSport',
            [
                'sport' => $sport
            ]
        );
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
        $sport->sport = $request->sport;
        $sport->save();
        return redirect('/admin-panel/sport');
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
