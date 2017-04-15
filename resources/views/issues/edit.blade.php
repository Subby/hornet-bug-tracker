@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('issues.edit_issue') {{ $issue->name }}</div>

                    <div class="panel-body">
                        @include('common.errors')
                        <form action="/issue/{{$issue->id}}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">@lang('issues.title')</label>
                                <input name="title" type="text" class="form-control" placeholder="@lang('issues.title')" value="{{$issue->title}}">
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('issues.description')</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="@lang('issues.description')">{{$issue->comment}}</textarea>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="open"
                                            @if($issue->open)
                                                checked
                                            @endif> @lang('issues.open')
                                </label>
                            </div>                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>@lang('issues.edit_issue')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
