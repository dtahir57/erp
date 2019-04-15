<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('pages.team.team-index', compact('team'));
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, Team $team)
    {
        //
    }
}
