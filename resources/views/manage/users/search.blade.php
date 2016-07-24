@extends('manage.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Users</div>

                    <div class="panel-body">
                        @if(count($results) <= 0)
                            <p>There were not results found. <a href="/manage/users/">Search again</a>?</p>
                        @else
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>Name</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tdody>
                                    @foreach($results as $user)
                                        <td>{{$user->name}}</td>
                                        <td>
                                            <form action="{{url('manage/users/' . $user->id. '/edit')}}">
                                                <button type="submit" id="edit-user-{{ $user->id }}" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-edit"></i>Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{url('manage/users/' . $user->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    @endforeach
                                </tdody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
