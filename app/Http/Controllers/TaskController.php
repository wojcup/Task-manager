<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $tasks = Task::where( 'owner_id', Auth::id() )->latest( 'updated_at' )->paginate(2);
        return view( 'tasks.index' )->with( 'tasks', $tasks );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view( 'tasks.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:120',
            'description' => 'required'
        ]);

        $req_values = [
            'uuid'          => Str::uuid(),
            'name'          => $request->name,
            'description'   => $request->description,
            'owner_id'      => Auth::id(),
        ];

        Task::create( $req_values );

        return to_route( 'tasks.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Task $task ){
        if( $task->owner_id != Auth::id() ){
            return abort( 403 );
        }

        return view( 'tasks.show' )->with( 'task', $task );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Task $task ){
        if( $task->owner_id != Auth::id() ){
            return abort( 403 );
        }

        return view( 'tasks.edit' )->with( 'task', $task );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Task $task ){

        if( $task->owner_id != Auth::id() ){
            return abort( 403 );
        }

        $request->validate([
            'name' => 'required|max:120',
            'description' => 'required'
        ]);

        $req_values = [
            'name'          => $request->name,
            'description'   => $request->description,
        ];
        // $task->where( 'task_id', $task->task_id )->update( $req_values );
        $task->update( $req_values );

        return to_route( 'tasks.show', $task );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        //
    }
}
