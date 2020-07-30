@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        @if(isset($contact))
            Edit Contact
        @else
            Add New Contact
        @endif
    </div>
    <div class="card-body">
        <form method="post" action="{{ isset($contact) ? route('contact.update', $contact->id) : route('contact.store') }}">
            @if(isset($contact))
                @method('PATCH')
            @endif
            @csrf
            <x-input-text label="First Name:" field="first_name" :model="$contact ?? null" :errors="$errors" />
            <x-input-text label="Last Name:" field="last_name" :model="$contact ?? null" :errors="$errors" />
            <x-input-text label="Email:" field="email" :model="$contact ?? null" :errors="$errors" />
            <x-input-text label="Phone:" field="phone" :model="$contact ?? null" :errors="$errors" />

    </div>
    <div class="card-footer">
        <span class="float-right">
            <a href="/contact" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">
                @if(isset($contact))
                    Update
                @else
                    Create
                @endif
            </button>
        </span>

        </form>
        @if(isset($contact))
            <x-delete-button :action="route('contact.destroy', $contact)" class="btn btn-danger" method="delete">
                Delete
            </x-delete-button>
        @endif
    </div>
</div>
@endsection
