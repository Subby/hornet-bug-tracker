@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('manage/tags.edit') {{$tag->name}}</div>

                    <div class="panel-body">
                        @include('common.errors')

                        <form action="{{url('manage/tags/' . $tag->id)}}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">@lang('manage/tags.name')</label>
                                <input name="name" type="text" class="form-control" value="{{$tag->name}}">
                            </div>
                            <div class="form-group">
                                <label for="colour">@lang('manage/tags.colour')</label>
                                <select class="form-control" id="colour" name="colour">
                                    <option value="bg-primary" class="bg-primary">@lang('manage/tags.colours.blue')</option>
                                    <option value="bg-info" class="bg-info">@lang('manage/tags.colours.light_blue')</option>
                                    <option value="bg-success"  class="bg-success">@lang('manage/tags.colours.green')</option>
                                    <option value="bg-warning" class="bg-warning">@lang('manage/tags.colours.yellow')</option>
                                    <option value="bg-danger" class="bg-danger">@lang('manage/tags.colours.red')</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>@lang('manage/tags.edit_tag')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
