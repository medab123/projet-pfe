<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Webinaire;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function inscrire($webinaire_id)
    {
        $webinaire = Webinaire::find($webinaire_id);
        $eventCheck = Event::where("user_id", auth()->user()->id)->where("webinaire_id", $webinaire_id)->exists();

        if ($eventCheck) {
            return back()->with("error", "Vous êtes déjà inscrit à ce webinaire");
        }

        if ($webinaire) {
            $event = new Event();
            $event->user_id = auth()->user()->id;
            $event->webinaire_id = $webinaire_id;
            $event->save();
            return back()->with("success", "Vous vous êtes inscrit avec succès au webinaire " . $webinaire->name);
        } else {
            return back()->with("error", "Webinaire introuvable");
        }
    }
    public function disinscrit(Request $request){
        Event::find($request->id)->delete();
        return  response()->json(["status"=>"success","message"=>"success"], 200);
    }

}
