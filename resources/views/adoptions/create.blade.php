@extends('layouts.app')

<!-- define the content section -->
<!-- view for user to apply for adoption -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">Adoption Form</div>
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
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{url('adoptions') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8">
                                <label >My User Name</label>
                                <input type="text" name="fname"
                                placeholder="My User Name" />
                            </div>
                            
                            <div class="col-md-8">
                                <label >Pet Name</label>
                                <input type="text" name="pet" placeholder="Animal Name" />
                                
                            </div>
                            
                            <div class="col-md-8">
                                <label >Your Age</label>
                                <input type="number" name="age"
                                placeholder="Age" />
                            </div>
                            <div class="col-md-8">
                                
                                <textarea rows="4" cols="50" name="adoptionReason" placeholder="Describe why you want to adopt this animal">  </textarea>
                            </div>
                            <div class="col-md-8">
                                <label>Upload Proof Of Identification</label>
                                <input type="file" name="filename"
                                placeholder="Image file" />
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection