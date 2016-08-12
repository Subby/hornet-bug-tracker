@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('manage/projects.create_new_project')</div>

                    <div class="panel-body">
                        @include('common.errors')

                        <form action="{{url('manage/projects')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">@lang('manage/projects.name')</label>
                                <input name="name" type="text" class="form-control" placeholder="@lang('manage/projects.name')">
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('manage/projects.description')</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="@lang('manage/projects.description')"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>@lang('manage/projects.add_project')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
