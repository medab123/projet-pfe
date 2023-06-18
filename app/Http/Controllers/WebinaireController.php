<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Webinaire;
use Illuminate\Http\Request;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;

class WebinaireController extends Controller
{
    use EditorTrait;
    public function editor(Request $request, $id)
    {
        $page = Webinaire::find($id);
        return $this->show_gjs_editor($request, $page);
    }
    public function index($admin = false)
    {

        $webinaires = Webinaire::paginate(9);
        if ($admin) {
            return view("admin.webinaires.index", compact("webinaires"));
        }
        $userEvents = Event::where("user_id", auth()->user()->id)->pluck("webinaire_id")->toArray();

        return view("webinaires.index", compact("webinaires", "userEvents"));

    }
    public function WebinairesInscrits($admin = false)
    {
        if(!$admin){
            $events = Event::where("user_id", auth()->user()->id)->with("webinaire")->get();

            return view("webinaires.inscrits", compact("events"));
        }else{
            $events = Event::with("user","webinaire")->get();
            dd($events->toArray());
        }


    }
    public function image_upload(Request $request)
    {
        $image = $request->file('file');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/webinaire/images/uploads'), $filename);

        return response()->json([
            'location' => asset('upload/webinaire/images/uploads/' . $filename),
        ]);
    }

    public function show($id)
    {
        $userEvents = Event::where("user_id", auth()->user()->id)->pluck("webinaire_id")->toArray();

        return view("webinaires.show", ["webinaire" => Webinaire::find($id), "userEvents" => $userEvents]);
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
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');
            $webinaire->image = $path;
        }

        $webinaire->save();



        return redirect()->route('admin.webinaires.index')->with('success', 'Webinaire updated successfully.');
    }

}
