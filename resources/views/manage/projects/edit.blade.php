@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit {{$project->name}}</div>

                    <div class="panel-body">
                        @include('common.errors')

                        <form action="{{url('manage/projects/' . $project->id)}}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" value="{{$project->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Description">{{$project->description}}</textarea>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="open"
                                            @if($project->open)
                                                checked
                                            @endif> Open
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>Edit Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
