@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Home Page</h1>
        <p>This is the content of the home page.</p>
        
        <!-- Company Operations -->
        <h2>Company Operations</h2>
        <ul>
            <li><a href="{{ route('companies.index') }}"><i class="fas fa-building"></i> View All Companies</a></li>
            <li><a href="{{ route('admin.companies.create') }}"><i class="fas fa-plus"></i> Add New Company</a></li>
        </ul>
        
        <!-- Employee Operations -->
        <h2>Employee Operations</h2>
        <ul>
            <li><a href="{{ route('employees.index') }}"><i class="fas fa-users"></i> View All Employees</a></li>
            <li><a href="{{ route('employees.create') }}"><i class="fas fa-user-plus"></i> Add New Employee</a></li>
        </ul>
        
        <!-- Other Operations -->
        <!-- Add other operations here -->
    </div>
@endsection
