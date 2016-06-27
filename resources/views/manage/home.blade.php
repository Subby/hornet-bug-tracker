@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage</div>

                    <div class="panel-body">
                        @if(count($projects) <= 0)
                            <p>There are currently no projects. <a href="manage/projects/add">Add</a> one?</p>
                        @else
                            <table class="table table-striped task-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Issues</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->name}}</td>
                                        <td>{{count(App\Project::find($project->id)->issues)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
