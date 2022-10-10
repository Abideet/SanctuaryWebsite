
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @can ('isAdmin')
                    
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('animals') }}">List All Animals</a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('animals/create') }}">Create </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('adoption') }}">All Adoption Requests </a>
                    </li>

                    <!-- Table to show adoption details for staff -->
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>User First Name</th>
                        <th> Pet Name</th>
                        <th>User Age </th><th> Adoption Reason </th>
                        <th>Decision (Click On To Change)</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($adoptions as $adoption)

                    <?php
                        if("Pending" == $adoption['adoptionDecision'])
                        {
                    ?>

                    <tr>
                    <td>{{$adoption['fname']}}</td>
                    <td>{{$adoption['pet']}}</td>
                    <td>{{$adoption['age']}}</td>
                    <td>{{$adoption['adoptionReason']}}</td>
                    <td>
                        <a href="{{route('adoptions.edit', ['adoption' => $adoption['id'] ] )}}" class="btn btnprimary">
                            {{$adoption['adoptionDecision']}}
                        </a>   
                    </td>            
                    </tr>

                    <?php
                        }
                    ?>

                    @endforeach
                    </tbody>
                    </table>





                    @else

                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('userAdoption') }}">My Adoption Requests </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('adoptions/create') }}">Make Adoption Requests </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('display') }}">All Pets </a>
                    </li>

                   
                    @endcan
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
