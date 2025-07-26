@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Contact</h2>
    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea class="form-control" name="address"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
