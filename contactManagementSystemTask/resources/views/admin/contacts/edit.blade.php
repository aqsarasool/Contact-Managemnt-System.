@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Contact</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $contact->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $contact->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" required>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea class="form-control" name="address">{{ $contact->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
