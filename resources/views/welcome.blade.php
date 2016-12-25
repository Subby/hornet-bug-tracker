@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Projects</div>

                <div class="panel-body">
                    @if(count($projects) <= 0)
                    	<p>There are currently no projects.</p>
                    @else 
                            <table class="table table-striped task-table">
                                <thead>
                                    <tr>
                                        <th>@lang('manage/projects.name')</th>
                                        <th>@lang('manage/projects.issues')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td><a href="{{url('project/' . $project->id)}}">{{$project->name}}</td>
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
