@extends('layouts.app')

@section('content')
    <h1>Edit Company</h1>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            @if ($company->logo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="50">
                </div>
            @endif
            <input type="file" name="logo" id="logo" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" id="website" class="form-control" value="{{ $company->website }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
