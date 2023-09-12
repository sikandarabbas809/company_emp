@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Employees</h1>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="btn btn-primary" style="float: right;">Back</a>
            </div>
        </div>
        

        @if(session('success'))
		    <div class="alert alert-success">
		        {{ session('success') }}
		    </div>
		@endif
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($employees) > 0)
                    @foreach($employees  as $value)
                         <tr>
                            <td>{{ $value->first_name }}</td>
                            <td>{{ $value->last_name }}</td>
                            <td>{{ $value->companyName }}</td>
                            <td>{{ $value->email}}</td>
                            <td>{{$value->phone}}</td>
                            <td>
                                <a href="{{ route('employees.edit', $value) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('employees.destroy', $value) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                  <tr>
                      <td colspan="7">
                          <div class="alert alert-info">
                              No data found.
                          </div>
                      </td>
                  </tr>
              @endif
            </tbody>
        </table>
        <div class="d-flex">
            {!! $employees->links() !!}
        </div>
    </div>
@endsection