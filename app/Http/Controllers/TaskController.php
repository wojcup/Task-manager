<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // $tasks = Task::where( 'owner_id', Auth::id() )->latest( 'updated_at' )->paginate(2);
        // $tasks = Auth::user()->tasks()->latest( 'updated_at' )->paginate( 2 );
        $tasks = Task::whereBelongsTo( Auth::user() )->latest( 'updated_at' )->paginate( 2 );


        return view( 'tasks.index', ['view' => 'Tasks created'] )->with( 'tasks', $tasks );
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
        ];

        Auth::user()->tasks()->create( $req_values );

        return to_route( 'tasks.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Task $task ){

        if( !$task->user->is( Auth::user() ) ){
            return abort( 403 );
        }

        return view( 'tasks.show' )->with( 'task', $task );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Task $task ){
        if( !$task->user->is( Auth::user() ) ){
            return abort( 403 );
        }

        return view( 'tasks.edit' )->with( 'task', $task );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Task $task ){

        if( !$task->user->is( Auth::user() ) ){
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

        $task->update( $req_values );

        return to_route( 'tasks.show', $task )->with( 'success', 'Task has been updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Task $task ){
        if( !$task->user->is( Auth::user() ) ){
            return abort( 403 );
        }

        $task->delete();

        return to_route( 'tasks.index' )->with( 'success', 'Task has been moved to Trash now' );
    }
}
