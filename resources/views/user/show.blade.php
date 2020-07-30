@extends('layouts.app')

@section('content')
<h1 class="display-3">
Show User
</h1>
  <div>
      <form>
          <div class="form-group">
              <label for="first_name">Name:</label>
              <input
                type="text"
                class="form-control"
                name="name"
                value="{{ $user->name }}"
                disabled
                />
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input
                type="text"
                class="form-control"
                name="email"
                value="{{ $user->email }}"
                disabled
                />
          </div>
          <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $user->id . '/edit') }}">Edit this User</a>
      </form>
  </div>
@endsection
