@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Issues for {{$project->name}}</div>

                <div class="panel-body">
                    @if(count($issues) <= 0)
                    	<p>There are currently no issues for this project.</p>
                    @else 
                            <table class="table table-striped task-table">
                                <thead>
                                    <tr>
                                        <th>@lang('issues.issue_title')</th>
                                        <th>@lang('issues.created_by')</th>
                                        <th>@lang('issues.created_date')</th>
                                        <th>@lang('issues.last_updated_date')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($issues as $issue)
                                    <tr>
                                        <td><a href="{{url('issue/' . $issue->id)}}">{{$issue->title}}</td>
                                        <td>{{App\User::find($issue->user_id)->name}}</td>
                                        <td>{{$issue->created_at}}</td>
                                        <td>{{$issue->updated_at}}</td>
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
