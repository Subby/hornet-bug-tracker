@extends('layouts.app')

@section('content')
	
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	<p>
                    		<h3>
                    			<a href="{{url('issue/' . $issue->id)}}">#{{$issue->id}}</a> {{ $issue->title }}
                    			@if($issue->open)
                    				<div class="btn btn-success"><i class="fa fa-btn fa-exclamation"></i>Open</div>
                    			@else	 
                    		    	<div class="btn btn-danger"><i class="fa fa-btn fa-check"></i>Closed</div>        
                    			@endif
                    		</h3>
                    	</p>
                    </div>
                    <div class="panel-body">
                    	{{$issue->comment}}
                    </div>
                    <div class="panel-footer">
                    	<p>
                    	<small>
                    		Created by <strong>{{App\User::find($issue->user_id)->name}}</strong> 
                    		on <strong>{{$issue->created_at}}</strong>.
                    		Last updated on <strong>{{$issue->updated_at}}.</strong> 
                    		Filed under <a href="{{url('project/' . $issue->project_id)}}"><strong>{{App\Project::find($issue->project_id)->name}}</strong></a>.
                    	</small>
                    	@if ((Auth::user()->admin) || ($issue->user_id == Auth::user()->id))
                    		<form action="{{url('issue/' . $issue->id . '/edit')}}">    
                        	<button type="submit" class="btn btn-default">
                        	<i class="fa fa-btn fa-edit"></i>@lang('issues.edit_issue')
                        	</button>         
                        	</form> 
                    	@endif                    	
                    	</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection