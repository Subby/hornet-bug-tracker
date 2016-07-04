@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit {{$tag->name}}</div>

                    <div class="panel-body">
                        @include('common.errors')

                        <form action="{{url('manage/tags/' . $tag->id)}}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" value="{{$tag->name}}">
                            </div>
                            <div class="form-group">
                                <label for="colour">Colour</label>
                                <select class="form-control" id="colour" name="colour">
                                    <option value="bg-primary" class="bg-primary">Blue</option>
                                    <option value="bg-info" class="bg-info">Light Blue</option>
                                    <option value="bg-success"  class="bg-success">Green</option>
                                    <option value="bg-warning" class="bg-warning">Yellow</option>
                                    <option value="bg-danger" class="bg-danger">Red</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>Edit Tag
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
