<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    public function index()
    {
        $events = Event::where("user_id", auth()->user()->id)->with("webinaire")->get();
        $webinaires = $events->pluck('webinaire')->map(function ($webinaire) {
            return [
                'title' => $webinaire->name,
                'start' => $webinaire->start_dt,
                'end' => $webinaire->end_dt,
                'description' => $webinaire->description,
            ];
        })->toJson();

        return view("calendrier.index", compact("webinaires"));
    }
}
