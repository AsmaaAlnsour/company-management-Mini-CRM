<!-- resources/views/companies/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">Add Company</a>
       
        @if (count($companies) === 0)
    <p>No companies found.</p>
@else
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="50">
                        @endif
                    </td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}
@endif
    </div>
@endsection
