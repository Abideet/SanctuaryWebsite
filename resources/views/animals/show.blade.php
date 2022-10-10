@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                
                <div class="card-header">Animal</div>
                <div class="card-body">
                    <!-- Table showing animal you have picked to see -->
                    <table class="table table-striped" border="1" >
                    <tr> <th> <b>Name </th> <td> {{$animal['name']}}</td></tr>
                    <tr> <th>Species </th> <td>{{$animal->species}}</td></tr>
                    <tr> <th>Age </th> <td>{{$animal->age}}</td></tr>
                    <tr> <th>Colour </th> <td>{{$animal->colour}}</td></tr>
                    <tr> <th>Personality </th> <td style="max-width:150px;" >{{$animal->personailty}}</td></tr>
                    <tr> <th>Availability </th> <td style="max-width:150px;" >{{$animal->availability}}</td></tr>

                    <!-- Loop through each instance of the animal data and store each instance in a variable called image  -->
                    @foreach($data as $row)
                        <!-- If statement that makes sure that only images for the specified animal is shown and not all images in the database -->
                        <?php 
                            if($row['name'] == $animal['name'])
                            {
                        ?>
                        <tr><th>Images</th>
                            <!-- Decode the json encoded array data and save each extracted image element inside $picture -->
                            <td> <?php foreach (json_decode($row->filename)as $picture) { ?>
                                    <!-- Display each picture -->
                                    <img src="{{ asset('storage/images/'.$picture) }}" style="height:120px; width:200px"/>
                                    <?php } ?>
                            </td>
                        </tr>
                        <?php
                            }

                        ?>
                    @endforeach
                    </table>
                    
                       
                    <table>
                        <tr>
                            <td>
                                <a href="{{route('animals.index')}}" class="btn btn-primary" role="button">
                                    Back to the list
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btnwarning">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('animals.destroy', ['animal' => $animal['id']]) }}" 
                                method="post"> @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit"> Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection