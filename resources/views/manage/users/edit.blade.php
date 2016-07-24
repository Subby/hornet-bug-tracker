@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit user {{$user->name}}</div>

                    <div class="panel-body">
                        @include('common.errors')

                        <form action="{{url('manage/users/' . $user->id)}}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="open"
                                           @if($user->admin)
                                           checked
                                            @endif> Is an administrator
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>Edit User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
