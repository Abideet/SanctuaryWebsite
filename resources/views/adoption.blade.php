@extends('layouts.app')
<!-- define the content section -->
<!-- For Employee to see adoption requests and approve or deny them -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Adoption Requests</div>
                    <div class="card-body">
                    <!-- Table showing all the animals in the system -->
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
                            @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection