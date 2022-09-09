@extends('layouts.admin_layout')
@section('content')
        <!--Main LayOut Start ##############################-->
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('main')}}">Edit</a></li>
                    <li class="breadcrumb-item active">Admin Panel</li>
                </ol>

<!--Image ##############################-->

<form action="{{route('admin.services.update', $service->id)}}" method="POST" enctype="multipart/form-data">

@csrf

<div class="row">
   
    <div class="form-group col-md-6 mt-3">
        <div>
            <h3><label for="icon">Font Awesome Icon</label></h3>
            <input type="text" class="form-control" id="icon" name="icon" value="{{$service->icon}}">
        </div>
    </div>
<br>
    <div class="form-group col-md-6 mt-3">
        <div>
            <h3><label for="tittle">Tittle</label></h3>
            <input type="text" class="form-control" id="tittle" name="tittle" value="{{$service->tittle}}">
        </div>
    </div>
<br>
    <div class="form-group col-md-6 mt-3">
        <div>
            <h3><label for="Description">Description</label></h3>
            <textarea type="text" class="form-control" id="description" name="description">{{$service->description}}</textarea>
        </div>
    </div>
<br>
</div>

<input type="submit" name="update" value="Update" class="btn btn-primary mt-5">

<!--img End ##############################-->

             <div style="height: 100vh"></div>
                
            </div>
</form>
        </main>
        <!--Main LayOut END ##############################-->
@endsection

            