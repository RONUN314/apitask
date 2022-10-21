<?php

namespace App\Http\Controllers;
use App\Http\Resources\Taskresource;
use App\Models\Taskmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Taskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Task = Taskmodel::latest()->paginate(8);
        return response()->json(Taskresource::collection($Task));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'taskdesc' => 'required | string',
            'location' => 'required | string',
            'percentage' => 'required | string',
            'priority' => 'required | string',
            'type' => 'required | string',
            'status' => 'required | string',
            'startdate' => 'required | date',
            'enddate' => 'required | date',
            'duration' => 'required | string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $Task = Taskmodel::create([
            'taskdesc' => $request-> taskdesc,
            'location' => $request-> location,
            'percentage' => $request-> percentage,
            'priority' => $request-> priority,
            'type' => $request-> type,
            'status' => $request-> status,
            'startdate' => $request-> startdate,
            'enddate' => $request-> enddate,
            'duration' => $request-> duration,
        ]);

        return  response()->json(['Task Created', new Taskresource($Task)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taskmodel  $taskmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Taskmodel $taskmodel)
    {
        return response()->json($taskmodel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taskmodel  $taskmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taskmodel $taskmodel ,$id)
    {
        $input=$request->all();
        $validator = Validator::make($input,[
            'taskdesc' => 'required | string',
            'location' => 'required | string',
            'percentage' => 'required | string',
            'priority' => 'required | string',
            'type' => 'required | string',
            'status' => 'required | string',
            'startdate' => 'required | date',
            'enddate' => 'required | date',
            'duration' => 'required | string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $taskmodel = Taskmodel::find($id);
        $taskmodel->taskdesc = $request->taskdesc;
        $taskmodel->location = $request->location;
        $taskmodel->percentage = $request->percentage;
        $taskmodel->priority = $request->priority;
        $taskmodel->type = $request->type;
        $taskmodel->status = $request->status;
        $taskmodel->startdate = $request->startdate;
        $taskmodel->enddate = $request->enddate;
        $taskmodel->duration = $request->duration;

        $taskmodel->save();

        return response()->json(['Updated' , new Taskresource($taskmodel)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taskmodel  $taskmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taskmodel $taskmodel ,$id)
    {
        $taskmodel->find($id)->delete();
        return response()->json('Deleted');
    }
}
