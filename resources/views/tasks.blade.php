@extends('layouts.default')
@section('after_head')
<style>
    .table td {
        vertical-align: middle;
    }
    .btn-action {
        margin-right: 5px;
    }
</style>
@endsection

@section('content')
    <div class="container mt-5">
        <h2>PHP - Simple To Do List App</h2>
        <hr>
        <form id="addTaskForm">
            <div class="input-group mb-3">
                <input type="text" id="task_name" class="form-control" placeholder="Enter task...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Add Task</button>
                </div>
            </div>
        </form>

        
        <table id="taskTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Existing tasks will be appended here -->
            </tbody>
        </table>
    </div>
@endsection