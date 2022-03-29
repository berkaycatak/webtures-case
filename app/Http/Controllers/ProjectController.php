<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::paginate(1);
        return view("pages.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = new Projects();
        $project->title = xss_clean($request->title);
        $project->description = xss_clean($request->description);
        $project->date = xss_clean($request->date);
        $project->website_url = xss_clean($request->website_url);
        if (isset($request->status))
            $project->status = "completed";
        $save = $project->save();
        if ($save)
        {
            return Redirect()->route('projects.index')->withSuccess("Proje başarıyla eklendi.");
        }
        else
        {
            return Redirect()->route('projects.index')->withError("Proje eklenirken hata oluştu.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Projects::find($id);
        return view("pages.projects.update", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Projects::find($id);
        $project->title = xss_clean($request->title);
        $project->description = xss_clean($request->description);
        $project->date = xss_clean($request->date);
        $project->website_url = xss_clean($request->website_url);
        if (isset($request->status))
            $project->status = "completed";
        else
            $project->status = "continues";
        $save = $project->save();
        if ($save)
        {
            return Redirect()->route('projects.edit', $project->id)->withSuccess("Proje başarıyla düzenlendi.");
        }
        else
        {
            return Redirect()->route('projects.edit', $project->id)->withError("Proje düzenlenirken hata oluştu.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $destroy = Projects::where("id", $id)->delete($id);
        if ($destroy)
            return Redirect()->route('projects.index')->withSuccess("Proje başarıyla silindi.");
        else
            return Redirect()->route('projects.index')->withErrors("Proje silinirken problem oluştu.");
    }
}
