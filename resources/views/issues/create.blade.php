@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('issues.add_new_issue_for_project') {{ $project->name }}</div>

                    <div class="panel-body">
                        @include('common.errors')

                        <form action="{{url('issue')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">@lang('issues.title')</label>
                                <input name="title" type="text" class="form-control" placeholder="@lang('issues.title')">
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('issues.description')</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="@lang('issues.description')"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>@lang('issues.add_new_issue')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
