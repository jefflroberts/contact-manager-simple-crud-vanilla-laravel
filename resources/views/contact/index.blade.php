@extends('layouts.app')

@section('content')
<!-- will be used to show any messages -->
<div class="col-sm-12">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @if(session()->get('success'))
      <div class="alert alert-success alert-dismissible fade show">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
</div>

<div class="col-12">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Actions</td>
            </tr>
            <tr>
                <form action="/contact" method="get">
                <td><input class="form-control" type="text" name="first_name" value="{{ $params['first_name'] ?? '' }}"></td>
                <td><input class="form-control" type="text" name="last_name" value="{{ $params['last_name'] ?? '' }}"></td>
                <td><input class="form-control" type="text" name="email" value="{{ $params['email'] ?? '' }}"></td>
                <td><input class="form-control" type="text" name="phone" value="{{ $params['phone'] ?? '' }}"></td>
                <td>
                    <button type="submit" class="btn btn-sm btn-secondary">Apply Filter</button>
                    <a href="/contact" class="btn btn-sm btn-secondary">Clear Filter</a>
                </td>
                </form>
            </tr>
        </thead>
        <tbody>
        @foreach($contacts as $key => $value)
            <tr>
                <td>{{ $value->first_name }}</td>
                <td>{{ $value->last_name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->phone }}</td>
                <td>
                    <a class="btn btn-sm btn-success" href="{{ URL::to('contact/' . $value->id) }}">Show</a>
                    <a class="btn btn-sm btn-info" href="{{ URL::to('contact/' . $value->id . '/edit') }}">Edit</a>
                    <x-delete-button :action="route('contact.destroy', $value)" class="btn btn-sm btn-danger" method="delete">
                        Delete
                    </x-delete-button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            {{ $contacts->total() }} Total Records |
            {{ $contacts->count() }} Records On This Page
        </div>
        <div class="col-md-6">
            {{ $contacts->links() }}
        </div>
        <div class="col-md-2">
            <a class="btn btn-sm btn-primary" href="/contact/create">Add New Contact</a>
        </div>
    </div>
</div>
@endsection
