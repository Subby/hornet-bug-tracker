@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Users</div>

                    <div class="panel-body">
                        @include('common.errors')
                        <form action="{{url('manage/users/search')}}">
                            <div class="input-group">
                                <input name="username" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                </br>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-search"></i>Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
