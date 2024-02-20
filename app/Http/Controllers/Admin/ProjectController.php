<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use App\Rules\StartsUppercase;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('creation_date', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->all()['technologies']);
        $request->validate(
                [
                    'title' => ['required'],
                    'type_id'=>['exists:types,id'],
                    'description' => ['required', new StartsUppercase],
                    'cover_image' => ['required', 'url:http,https'],
                    'creation_date' => ['required'],
                    'author' => ['required'],
                    'technologies' => ['exists:technologies,id'],
                ]);
            $data = $request->all();

            //questo mi permette di non inserire necesseriamente delle tecnologie in creazione
            if (!isset($data['technologies'])){
                $data['technologies'] = [];
            }

            $project = Project::create($data);
            $project->technologies()->sync($data['technologies']);

            return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate(
            [
                'title' => ['required'],
                'type_id'=>['exists:types,id'],
                'description' => ['required'],
                'cover_image' => ['required', 'url:http,https'],
                'creation_date' => ['required'],
                'author' => ['required'],
                'technologies' => ['exists:technologies,id'],
            ]);

        $data = $request->all();

        if (!isset($data['technologies'])){
            $data['technologies'] = [];
        }

        $project->update($data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function deletedIndex(){
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.deleted-index', compact('projects'));
    }

    public function deletedShow(string $id){
        $project = Project::withTrashed()->where('id', $id)->first();
        return view('admin.projects.deleted-show', compact('project'));
    }

    public function deletedRestore(string $id){
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->restore();

        return redirect()->route('admin.projects.show', $project);
    }

    public function deletedDestroy(string $id){
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->technologies()->detach(); // rimuovi i collegamenti
        $project->forceDelete();

        return redirect()->route('admin.projects.deleted.index');
    }
}
