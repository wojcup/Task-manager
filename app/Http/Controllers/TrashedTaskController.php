<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedTaskController extends Controller{
    public function index(){
        $tasks = Task::whereBelongsTo( Auth::user() )
            ->onlyTrashed()
            ->latest( 'updated_at' )
            ->paginate( 4 );
        return view( 'tasks.index', ['view' => 'Items in Trash'] )
            ->with( 'tasks', $tasks );
    }
    
    
    public function show( Task $task ){

        if( !$task->user->is( Auth::user() ) ){
            return abort( 403 );
        }
        return view( 'tasks.show' )->with( 'task', $task );
    }


    public function update( Task $task ){
        if( !$task->user->is( Auth::user() ) ){
            return abort( 403 );
        }

        $task->restore();

        return to_route( 'tasks.show', $task )
            ->with( 'success', 'Task restored successfully' );
    }

}
