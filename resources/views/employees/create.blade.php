@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2 style="text-align: center; margin-top: 20px;">Add Employee</h2>
            <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company</label>
                            <select class="form-control" name="company_id">
                                <option value="">Select Company</option>
                                @foreach($companies as $value)
                                    <option value="{{$value->id}}"> {{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input type="phone" name="phone" class="form-control" placeholder="Enter Phone" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>  
         </div>
    </div>
@endsection