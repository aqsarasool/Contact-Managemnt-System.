@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Contact List</h2>
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-3">Add Contact</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->address }}</td>
                <td>
                    <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
