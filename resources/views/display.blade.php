@extends('layouts.app')
@section('content')
<?php
use Illuminate\Http\Request;
?>
<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-8">
 <div class="card">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    
                </div>
 <div class="card-header">Animals for Adoption</div>
 <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
            <!-- Table showing all the animals in the system -->
            <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
            <th>@sortablelink('Name')</th>
            <th>@sortablelink('Species')</th>
            <th>@sortablelink('Age')</th>
            <th>@sortablelink('Colour')</th>
            <th>@sortablelink('Personality')</th>
            <th>@sortablelink('Availability')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($animals as $animal)
            <tr>
            <td>{{$animal['name']}}</td>
            <td>{{$animal['species']}}</td>
            <td>{{$animal['age']}}</td>
            <td>{{$animal['colour']}}</td>
            <td>{{$animal['personality']}}</td>
            <td>{{$animal['availability']}}</td>
            @endforeach

            </tbody>
            </table>
            </div>
            </div>
            </div>
            </div>
            </div>
        
@endsection

