<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $project = Project::all();

        return view("project.index", [
            "project" => $project
        ]);
    }


    public function create()
    {
        return view("project.create");
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|min:2|max:255",
            "description" => "required|string",
            "cover_img" => "required|string|url",
            "github_link" => "required|min:1|max:255",

        ]);
        // $data = $request->all();

        // dd($data);

        // Prima alternativa.
        // Tramite il metodo fill, assegniamo tutti i valori al nuovo prodotto, automaticamente
        $project = new Project();
        // Prende ogni chiave dell'array associativo e ne assegna il valore all'istanza del prodotto
        $project->fill($data);
        $project->save();



        return redirect()->route("project.show", $project->id);
    }


    public function show(Project $project)
    {
        return view("project.show", [
            "project" => $project
        ]);
    }


    public function edit(Project $project)
    {
        return view("project.edit", [
            "project" => $project
            
        ]);
    }


    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        // dd($data);

        $project->update($data);
        $project->save();

        return redirect()->route("project.show", $project->id);
    }


    public function destroy(Project $project)
    {
        // $comics = Comic::findOrFail($id);

        // sull'istanza del model, il metodo da usare è delete()
        $project->delete();

        // Un volta eliminato l'elemento dalla tabella, dobbiamo reindirizzare l'utente da qualche parte.
        return redirect()->route("project.index");
    }
}
