@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Display all animals</div>
                <div class="card-body">
                    <table class="table table-striped">
                    <!-- this allows for the whole table to be sorted based on which heading is clicked -->
                        <thead>
                            <!-- this sortablelink allows for the whole table to be sorted based on which heading is clicked -->
                            <tr>
                                <th>@sortablelink('Name')</th>
                                <th>@sortablelink('Species')</th>
                                <th>@sortablelink('Age')</th>
                                <th>@sortablelink('Colour')</th>
                                <th>@sortablelink('Personality')</th>
                                <th>@sortablelink('Availability')</th>
                                <th colspan="3">Action</th>
                            <tr>           
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Loop through the whole animals table database and store each row inside $animal to print its values -->
                        @foreach($animals as $animal)
                        <tr>
                            <td>{{$animal['name']}}</td>
                            <td>{{$animal['species']}}</td>
                            <td>{{$animal['age']}}</td>
                            <td>{{$animal['colour']}}</td>
                            <td>{{$animal['personality']}}</td>
                            <td>{{$animal['availability']}}</td>
                            <!-- Buttons that take you to the show or edit view -->
                            <td><a href="{{route('animals.show', ['animal' => $animal['id'] ] )}}" class="btn btnprimary">Details</a></td>
                            <td><a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btnwarning">Edit</a></td>
                            
                            <!-- Table data that holds the logic for triggering the destroy method inside AnimalController when we click the Destroy button -->
                            <td>
                                <form action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'],
                                ['animal' => $animal['id']]) }}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit"> Delete</button>
                                </form>
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
@endsection

@section('javascript')
        <script type="text/javascript" charset="utf8" src="//"></script>

        <script>
            $(document).ready(function () {
                var table = $('datatable').DataTable
            });
        </script>

@endsection
