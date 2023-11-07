<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedTaskController extends Controller{
    public function index(){
        $tasks = Task::whereBelongsTo( Auth::user() )->onlyTrashed()->latest( 'updated_at' )->paginate( 4 );
        return view( 'tasks.index', ['view' => 'Items in Trash'] )->with( 'tasks', $tasks );
    }
    //
}
