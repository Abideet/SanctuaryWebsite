@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">Edit and update the animal</div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br />
                            @endif
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Session::get('success') }}</p>
                                </div>
                                <br />
                            @endif
                            <div class="card-body">
                            
                            <!-- Form when submitted triggers the animals.update method -->
                            <form class="form-horizontal" method="POST" action="{{ route('animals.update', ['animal' => $animal['id']]) }}" enctype="multipart/form-data" >
                                @method('PATCH')
                                @csrf
                                </div>
                                <div class="col-md-8">
                                    <label >Name</label>
                                    <input type="text" name="name" value="{{$animal->name}}"/>
                                </div>
                                <div class="col-md-8">
                                    <label>Species</label>
                                    <input name="species" value="{{$animal->species}}"/>
                                </div>
                                <div class="col-md-8">
                                    <label >Age</label>
                                    <input type="integer" name="age" value="{{$animal->age}}" />
                                </div>
                                    <div class="col-md-8">
                                    <label >Colour</label>
                                <input type="text" name="colour" value="{{$animal->colour}}" />
                                </div>
                                    <div class="col-md-8">
                                    <label >Personality</label>
                                    <textarea rows="4" cols="50" name="personality" > {{$animal->personality}}
                                </textarea>
                                <div class="col-md-8">
                                    <label >Availability</label>
                                    <input type="text" name="availability"
                                    placeholder="Availability" />
                                </div>
                                </div>
                                <div class="col-md-8">
                                    <label>Image</label>
                                    <input type="file" name="image" />
                                </div>
                                <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" />
                                <input type="reset" class="btn btn-primary" />

                                </a>
                                </div>
                                <input type="hidden" name="_method" value="PUT">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection