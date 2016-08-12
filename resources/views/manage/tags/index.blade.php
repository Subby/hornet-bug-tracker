@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('manage/tags.manage_tags')</div>

                    <div class="panel-body">
                        @if(count($tags) <= 0)
                            <p>@lang('manage/tags.no_tags') <a href="tags/create">@lang('manage/tags.add')</a> @lang('manage/tags.one')</p>
                        @else
                            <table class="table table-striped task-table">
                                <thead>
                                <tr>
                                    <th>@lang('manage/tags.name')</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td class="{{$tag->colour}}">{{$tag->name}}</td>
                                        <td>
                                            <form action="{{url('manage/tags/' . $tag->id. '/edit')}}">
                                                <button type="submit" id="edit-task-{{ $tag->id }}" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-edit"></i>@lang('manage/tags.edit')
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{url('manage/tags/' . $tag->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $tag->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>@lang('manage/tags.delete')
                                                </button>
                                            </form>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <form action="{{url('manage/tags/create')}}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-plus"></i>@lang('manage/tags.create_new_tag')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
