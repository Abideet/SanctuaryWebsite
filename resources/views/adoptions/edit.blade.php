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
                        </div><br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    <div class="card-body">
                    <form class="form-horizontal" method="PUT" action="{{ route('adoptions.update', ['adoption' =>
                    $adoption['id']]) }}" enctype="multipart/form-data" >
                    @method('PATCH')
                    @csrf

                    <div class="col-md-8">
                        <label >Decision</label>
                        <input type="text" name="adoptionDecision" value="{{$adoption->adoptionDecision}}" />
                    </div>

                    <div class="col-md-6 col-md-offset-4">
                    <input type="submit"   onclick="window.location='{{ url("adoption") }}'"    class="btn btn-primary" />


                     



                    </a>
                    </div>
                    <input type="hidden" name="_method" value="POST">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection