@extends('layouts.app')
<!-- define the content section -->
<!-- view for user to see all of their adoption requests -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">My Adoption Requests</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">  
                            <thead>
                                <tr>
                                <th>Users First Name</th>
                                <th>Pet Name</th>
                                <th>Decision</th>
                                </tr>
                            </thead>                   
                            <tbody>
                            <!-- Get each row of the adoptions table using a foreach loop -->
                            @foreach($adoptions as $adoption)
                                <tr>
                                <!-- If the name of this current user is the same as the the name taken from the adoption database, only show that one -->
                                <?php
                                    $user = auth()->user();
                                    if(($user->name) == $adoption['fname'])
                                    {
                                ?>
                                <td>{{$adoption['fname']}}</td>
                                <td>{{$adoption['pet']}}</td>   
                                <td>{{$adoption['adoptionDecision']}}</td> 
                                </tr>
                                <?php
                                    }
                                ?>
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