@extends('layouts.app')
    <!-- define the content section -->
    @section('content')
    <!-- Links for stylesheet and jquery library -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 ">
                        <div class="card">
                            <div class="card-header">Add an new Pet</div>
                                <!-- display the errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                    <ul> @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li> @endforeach
                                    </ul>
                                    </div>
                                    <br /> 
                                @endif

                            <!-- display the success status -->
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Session::get('success') }}</p>
                                </div>
                                <br /> 
                            @endif
                              
                            <!-- define the form -->
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="{{url('animals') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-8">
                                        <label >Animal Name</label>
                                        <input type="text" name="name" placeholder="Animal Name" />
                                    </div>
                                    <div class="col-md-8">
                                        <label >Species</label>
                                        <input type="text" name="species"
                                        placeholder="Species" />
                                    
                                    </div>
                                    <div class="col-md-8">
                                        <label >Age</label>
                                        <input type="number" name="age"
                                        placeholder="Age" />
                                    </div>
                                    <div class="col-md-8">
                                        <label >Colour</label>
                                        <input type="text" name="colour"
                                        placeholder="colour" />
                                    </div>
                                    <div class="col-md-8">
                                        <label >Personality</label>
                                        <textarea rows="4" cols="50" name="personality"> Describe the pesonality of this animal </textarea>
                                    </div>
                                    <div class="col-md-8">
                                        <label >Availability</label>
                                        <input type="text" name="availability"
                                        placeholder="Availability" />
                                    </div>
                                    

                                    <div class="col-md-8">
                                    <label >Image</label>
                                        <div class="input-group control-group increment" >
                                        <input type="file" name="filename[]" class="form-control" >
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="file" name="filename[]" class="form-control">
                                        <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button> -->
                                    <div class="col-md-6 col-md-offset-4">
                                        <input type="submit" class="btn btn-primary" />
                                        <input type="reset" class="btn btn-primary" />
                                    </div>


                                </form>
                                
                                <!-- Javascript and jquery used to create functionality where images are added to the input field when we press the add button and remove the image when we press the remove button -->
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        // When we click the add button
                                        $(".btn-success").click(function(){
                                            var html = $(".clone").html();
                                            $(".increment").after(html);
                                        });
                                        // When we click the remove button
                                        $("body").on("click", ".btn-danger", function(){
                                            $(this).parents(".control-group").remove();
                                        });
                                    });
                                </script>



                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection 