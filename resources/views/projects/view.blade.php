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
                                        <th>@lang('issues.status')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($issues as $issue)
                                    <tr>
                                        <td><a href="{{url('issue/' . $issue->id)}}">{{$issue->title}}</td>
                                        <td>{{App\User::find($issue->user_id)->name}}</td>
                                        <td>{{$issue->created_at}}</td>
                                        <td>{{$issue->updated_at}}</td>
                                        <td>
                                			@if($issue->open)
                    							<div class="btn btn-success"><i class="fa fa-btn fa-exclamation"></i>Open</div>
                    						@else 
                    		    				<div class="btn btn-danger"><i class="fa fa-btn fa-check"></i>Closed</div>        
                    						@endif
                    					</td>
                                    </tr>
                                @endforeach							                                
                                </tbody>
                            </table> 
                            <form action="{{url('/project/' . $project->id . '/issues/create')}}">    
                            	<div class="form-group">
                            		<button type="submit" class="btn btn-default">
                            		<i class="fa fa-btn fa-plus"></i>@lang('issues.add_new_issue')
                            		</button>       
                            	</div>  
                            </form>    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
