@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('manage/index.manage')</div>

                    <div class="panel-body">
                        @if(count($projects) <= 0)
                            <p>@lang('manage/index.no_projects'). <a href="manage/projects/create">@lang('manage/index.add')</a> @lang('manage/index.one_question_mark')</p>
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
