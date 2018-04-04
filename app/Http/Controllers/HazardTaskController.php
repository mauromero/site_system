<?php

namespace App\Http\Controllers;

use App\hazard_task;
use App\Assessment;
use App\Hazard;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HazardTaskController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Task $task)
    {
        $hazards = Hazard::orderBy('name', 'asc')->get();
        $assessment = Assessment::find($task->assessment_id);
        $tasks_hazards = hazard_task::where('task_id', $task->id)->get();

        return view('hazards_tasks.create', compact('hazards', 'task', 'assessment', 'tasks_hazards'));
    }


    public function store(Request $request)
    {
        $this->validate(request(),[
            'hazard_id' => 'required'
        ]);

        $task_id = request('task_id');
        hazard_task::create([
            'task_id'=>$task_id ,
            'hazard_id' =>request('hazard_id'),
            'hazard' =>request('hazard'),
            'measure' =>request('measure'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
 
        return redirect('/hazards_tasks/edit/'.$task_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hazard_task  $hazard_task
     * @return \Illuminate\Http\Response
     */
    public function show(hazard_task $hazard_task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hazard_task  $hazard_task
     * @return \Illuminate\Http\Response
     */
    public function edit( Task $task)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hazard_task  $hazard_task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hazard_task $hazard_task)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hazard_task  $hazard_task
     * @return \Illuminate\Http\Response
     */
    public function destroy(hazard_task $hazard_task)
    {
        //
    }
}