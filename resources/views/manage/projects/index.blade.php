@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('manage/projects.manage_projects')</div>

                    <div class="panel-body">
                        @if(count($projects) <= 0)
                            <p>@lang('manage/projects.no_projects') <a href="projects/create">@lang('manage/projects.add')</a> @lang('manage/projects.one')</p>
                        @else
                            <table class="table table-striped task-table">
                                <thead>
                                    <tr>
                                        <th>@lang('manage/projects.name')</th>
                                        <th>@lang('manage/projects.issues')</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->name}}</td>
                                        <td>{{count(App\Project::find($project->id)->issues)}}</td>
                                        <td>
                                            <form action="{{url('manage/projects/' . $project->id. '/edit')}}">
                                                <button type="submit" id="edit-task-{{ $project->id }}" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-edit"></i>@lang('manage/projects.edit')
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{url('manage/projects/' . $project->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $project->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>@lang('manage/projects.delete')
                                                </button>
                                            </form>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                            <form action="{{url('manage/projects/create')}}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>@lang('manage/projects.create_new_project')
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
