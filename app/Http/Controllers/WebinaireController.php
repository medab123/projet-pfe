<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Webinaire;
use Illuminate\Http\Request;

class WebinaireController extends Controller
{
    public function index($admin = false)
    {

        $webinaires = Webinaire::paginate(9);
        if ($admin) {
            return view("admin.webinaires.index", compact("webinaires"));
        }
        $userEvents = Event::where("user_id",auth()->user()->id)->pluck("webinaire_id")->toArray();

        return view("webinaires.index", compact("webinaires","userEvents"));

    }
    public function WebinairesInscrits()
    {
        $events = Event::where("user_id", auth()->user()->id)->with("webinaire")->get();
        $subscribedWebinaires = $events->pluck('webinaire')->map(function ($webinaire) {
            return [
                'image' => $webinaire->image,
                'title' => $webinaire->name,
                'start' => $webinaire->start_dt,
                'end' => $webinaire->end_dt,
                'description' => $webinaire->description,
            ];
        });
        return view("webinaires.inscrits", compact("subscribedWebinaires"));

    }
    public function show($id){
        $userEvents = Event::where("user_id",auth()->user()->id)->pluck("webinaire_id")->toArray();

        return view("webinaires.show",["webinaire"=>Webinaire::find($id),"userEvents"=>$userEvents]);
    }
    // public function index(){
    //     $webinaires = Webinaire::paginate(9);
    //     return view("webinaires.index",compact("webinaires"));
    // }
    public function create()
    {
        return view("admin.webinaires.create");
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
            'start_dt' => 'required|date',
            'end_dt' => 'required|date',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');
            $data['image'] = $path;
        }

        Webinaire::create($data);

        return redirect()->route('admin.webinaires.create')->with('success', 'Webinaire créé avec succès !');
    }
    public function edit($id)
    {
        return view("admin.webinaires.edit", ["webinaire" => Webinaire::find($id)]);
    }
    public function update(Request $request, $id)
    {
        $webinaire = Webinaire::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable',
            'start_dt' => 'required|date',
            'end_dt' => 'required|date',
        ]);

        $webinaire->name = $validatedData['name'];
        $webinaire->description = $validatedData['description'];
        $webinaire->start_dt = $validatedData['start_dt'];
        $webinaire->end_dt = $validatedData['end_dt'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $webinaire->image = $imagePath;
        }

        $webinaire->save();



        return redirect()->route('admin.webinaires.index')->with('success', 'Webinaire updated successfully.');
    }

}
