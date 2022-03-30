<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Projects::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
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
        return $project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Projects::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return $project->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Projects::where("id", $id)->delete($id);
    }
}
