@extends('layouts.app')

@section('content')
    <div class="panel-body">
        {{-- display validation error --}}

        <form action='/task' method='POST' class='form-horizontal'>
            {{ csrf_field() }}
            <div class=form-group>
                <div class='col-sm-6 col-sm-offset-3'>
                    <label for="task-name">Task</label>
                    <input name='name' id='task-name' class="form-control">
                </div>
           </div>
            <div class='form-group'>
                <div class='col-sm-6 col-sm-offset-3'>
                    <button type='submit' class='btn btn-info'>
                        <i class='fa fa-plus'></i> Add Task
                    </button> 
                </div>     
            </div>
        </form>
    </div>

    <div class="panel panel-info">
            <div class="panel-heading">Task:</div>
            <div class="panel-body">
                <table class="table table-hover table-striped table-collapse">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Task</th>
                            <th><i class="fa fa-trash"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $task)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $task->name }}</td>
                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
    
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger">Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
        </div>
    
@endsection