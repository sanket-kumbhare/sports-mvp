<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Subscribe.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function subscribe(Request $request) {
        $user_id = Auth::user()->id;
        $user = User::query()->find($user_id);
        $sport = Sport::query()->find($request->sport_id);
        $user->sports()->attach($sport);
    }

    /**
     * Unsubscribe.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function unsubscribe(Request $request) {
        $user_id = Auth::user()->id;
        $user = User::query()->find($user_id);
        $sport = Sport::query()->find($request->sport_id);
        $user->sports()->detach($sport);
    }
}
