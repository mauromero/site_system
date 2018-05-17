<?php

namespace App\Http\Controllers;

use App\Task;
use App\Hazard;
use App\Assessment;
use App\hazard_task;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Assessment $assessment)
    {
        if(auth()->user()){
            $assessment = Assessment::find($assessment->id);
            if ($assessment->user_id == auth()->user()->id){
                $tasks = Task::where('assessment_id',$assessment->id)->with('hazards')->get();
                $hazards = Hazard::orderBy('name', 'asc')->get();
                $tasks_hazards = hazard_task::all();
                return view('forms.assessments.assessments_tasks', compact('assessment','hazards', 'tasks','tasks_hazards'));
            }else{
                return redirect('/home');
            } 
        }else{
            return redirect('/home');
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        $hazards = Hazard::orderBy('name', 'asc')->get();
        $assessment = Assessment::find($task->assessment_id);
        $tasks_hazards = hazard_task::where('task_id', $task->id)->get();
        
        return view('tasks.edit', compact('assessment','task','hazards','tasks_hazards'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate(request(),[
            'hazard_id' => 'required'
        ]);

  }

    public function rename(Request $request, Task $task)
    {
        $this->validate(request(),[
            'name' => 'required'
        ]);

        $task = Task::find($task->id);
        $task->name = request('name');
        $task->updated_at = Carbon::now();
        $task->save();
        return redirect('/assessments/'.$task->assessment_id.'/tasks/');

  }

  public function delete(Task $task)
  {
        if (auth()->user()){
            $task = Task::find($task->id);
            $hazards = Hazard::orderBy('name', 'asc')->get();
            $assessment = Assessment::find($task->assessment_id);
            if ($assessment->user_id == auth()->user()->id){
                $tasks_hazards = hazard_task::where('task_id', $task->id)->get();
                return view('tasks.delete', compact('assessment','task','tasks_hazards','hazards'));
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if (auth()->user()){
            $task = Task::find($task->id);
            $assessment = Assessment::find($task->assessment_id);
            if ($assessment->user_id == auth()->user()->id){
                $task->delete();
                return redirect('/assessments/'.$assessment->id.'/tasks');

            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }
}
