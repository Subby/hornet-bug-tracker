@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>
    </div>
    <br><br>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
