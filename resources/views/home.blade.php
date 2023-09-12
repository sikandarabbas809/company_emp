@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <div class="container">
                        <h4 style="text-align: center;">Your are logged in successfully!</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('companies.index')}}" class="btn btn-primary">Companies</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('employees.index')}}" class="btn btn-primary" style="float: right;">Empolyee</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
