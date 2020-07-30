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

<div class="col-sm-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Edit</a>
                <x-delete-button :action="route('user.destroy', $value)" class="btn btn-danger" method="delete">
                    Delete
                 </x-delete-button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="/user/create">Add New User</a>
</div>
@endsection
