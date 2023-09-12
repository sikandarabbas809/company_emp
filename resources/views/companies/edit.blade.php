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
            <h2 style="text-align: center; margin-top: 20px;">Edit Company</h2>
            <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
            	@csrf
             	@method('PUT')
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Company Name" value="{{$company->name}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$company->email}}" required>
                        </div>
                    </div>
                     <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" placeholder="Enter Website Url" value="{{$company->website}}"required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
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