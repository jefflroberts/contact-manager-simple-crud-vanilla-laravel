@extends('layouts.app')

@section('content')
<h1 class="display-3">
Show Contact
</h1>
  <div>
      <form>
          <div class="form-group">
              <label for="first_name">First Name:</label>
              <input
                type="text"
                class="form-control"
                name="first_name"
                value="{{ $contact->first_name }}"
                disabled
                />
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input
                type="text"
                class="form-control"
                name="last_name"
                value="{{ $contact->last_name }}"
                disabled
            />
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input
                type="text"
                class="form-control"
                name="email"
                value="{{ $contact->email }}"
                disabled
                />
          </div>
          <div class="form-group">
              <label for="phone">Phone:</label>
              <input
                type="text"
                class="form-control"
                name="phone"
                value="{{ $contact->phone }}"
                disabled
                />
          </div>
          <a class="btn btn-small btn-info" href="{{ URL::to('contact/' . $contact->id . '/edit') }}">Edit this Contact</a>
      </form>
  </div>
@endsection
