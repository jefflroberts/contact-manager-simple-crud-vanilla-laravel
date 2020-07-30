@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        @if(isset($contact))
            Edit User
        @else
            Add New User
        @endif
    </div>
    <div class="card-body">
        <form method="post" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}">
            @if(isset($user))
                @method('PATCH')
            @endif
            @csrf
            <x-input-text label="Name:" field="name" :model="$user ?? null" :errors="$errors" />
            <x-input-text label="Email:" field="email" :model="$user ?? null" :errors="$errors" />
            <x-input-password label="Password:" field="password" :model="$user ?? null" :errors="$errors" />
            <x-input-password label="Confirm Password:" field="password_confirmation" :model="$user ?? null" :errors="$errors" />

    </div>
    <div class="card-footer">
        <span class="float-right">
            <a href="/user" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">
                @if(isset($user))
                    Update
                @else
                    Create
                @endif
            </button>
        </span>

        </form>
        @if(isset($user))
            <x-delete-button :action="route('user.destroy', $user)" class="btn btn-danger" method="delete">
                Delete
            </x-delete-button>
        @endif
    </div>
</div>
@endsection
