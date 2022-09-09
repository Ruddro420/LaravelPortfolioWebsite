@extends('layouts.admin_layout')
@section('content')
        <!--Main LayOut Start ##############################-->
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Main</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('main')}}">Main</a></li>
                    <li class="breadcrumb-item active">Admin Panel</li>
                </ol>

<!--Image ##############################-->

<form action="{{route('admin.main.update')}}" method="POST" enctype="multipart/form-data">

@csrf
{{method_field('PUT')}}


<div class="row">
    <div class="form-group col-md-3 mt-3">
        <h3>Background Image</h3>
        <img style="height: 30vh" src="{{url($main->bc_img)}}" alt="" class="img-thumbnail">
        <input class="form-control" type="file" name="bc_img" id="bc_img">
    </div>
    <div class="form-group col-md-4 mt-3">
        <div>
            <h3><label for="tittle">Tittle</label></h3>
            <input type="text" class="form-control" id="tittle" name="tittle" value="{{$main->tittle}}">
        </div>
    </div>

    <div class="form-group col-md-4 mt-3">
        <div>
            <h3><label for="sub_tittle">Sub Tittle</label></h3>
            <input type="text" class="form-control" id="sub_tittle" name="sub_tittle" value="{{$main->sub_tittle}}">
        </div>
        <br>
        <div>
            <h3>Upload Resume</h3>
            <input class="form-control" type="file" name="resume" id="resume">
        </div>
    </div>

</div>

<input type="submit" name="submit" class="btn btn-primary mt-5">

<!--img End ##############################-->

             <div style="height: 100vh"></div>
                
            </div>
</form>
        </main>
        <!--Main LayOut END ##############################-->
@endsection

            