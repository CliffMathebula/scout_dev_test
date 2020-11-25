@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!

                    
          <li class="list-group-item bg-secondary">
            <a class="btn btn-link btn-block text-warning" href="{{url('edit_user')}}/{{ ucfirst(Auth()->user()->id) }}">
              <strong> Edit Profile </strong></a>
          </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection