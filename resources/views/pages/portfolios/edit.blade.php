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

<form action="{{route('admin.portfolios.update', $portfolio->id)}}" method="POST" enctype="multipart/form-data">

@csrf

<div class="row">
    <div class="form-group col-md-3 mt-3">
        <h3>Big Image</h3>
        <img style="height: 30vh" src="{{url($portfolio->big_img)}}" alt="" class="img-thumbnail">
        <input class="form-control" type="file" name="big_img" id="big_img">
    </div>
    <div class="form-group col-md-3 mt-3">
        <h3>Small Image</h3>
        <img style="height: 20vh" src="{{url($portfolio->small_img)}}" alt="" class="img-thumbnail">
        <input class="form-control" type="file" name="small_img" id="small_img">
    </div>
    <div class="form-group col-md-4 mt-3">
        <div>
            <h3><label for="tittle">Tittle</label></h3>
            <input type="text" class="form-control" id="tittle" name="tittle" value="{{$portfolio->tittle}}">
        </div>
    </div>

    <div class="form-group col-md-4 mt-3">
        <div>
            <h3><label for="sub_tittle">Sub Tittle</label></h3>
            <input type="text" class="form-control" id="sub_tittle" name="sub_tittle" value="{{$portfolio->sub_tittle}}">
        </div>
        <br>
    </div>

    <div class="form-group col-md-6 mt-3">
        <div>
            <h3><label for="Description">Description</label></h3>
            <textarea type="text" class="form-control" id="description" name="description">{{$portfolio->description}}</textarea>
        </div>
    </div>
    <div class="form-group col-md-4 mt-3">
        <div>
            <h3><label for="tittle">Clint</label></h3>
            <input type="text" class="form-control" id="clint" name="clint" value="{{$portfolio->clint}}">
        </div>
    </div>
    <div class="form-group col-md-4 mt-3">
        <div>
            <h3><label for="tittle">Category</label></h3>
            <input type="text" class="form-control" id="category" name="category" value="{{$portfolio->category}}">
        </div>
    </div>
    

</div>
<input type="submit" name="update" value="Update" class="btn btn-primary mt-5">

<!--img End ##############################-->

             <div style="height: 100vh"></div>
                
            </div>
</form>
        </main>
        <!--Main LayOut END ##############################-->
@endsection

            