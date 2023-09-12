@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Companies</h1>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="btn btn-primary" style="float: right;">Back </a>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($companies) > 0)
                    @foreach($companies  as $value)
                   		<tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->website }}</td>
                            <td><img src="{{ asset('storage/company-logo/'.$value->logo) }}" alt="Company Logo" style="width: 200px; height: 100px;"></td>
                            <td>
                                <a href="{{ route('companies.edit', $value) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('companies.destroy', $value) }}" method="POST" style="display: inline;">
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
            {!! $companies->links() !!}
        </div>
    </div>
@endsection