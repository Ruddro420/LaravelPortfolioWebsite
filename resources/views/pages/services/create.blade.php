@extends('layouts.admin_layout')
@section('content')
        <!--Main LayOut Start ##############################-->
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Create</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('main')}}">Create</a></li>
                    <li class="breadcrumb-item active">Admin Panel</li>
                </ol>

<!--Image ##############################-->

<form action="{{route('admin.services.store')}}" method="POST" enctype="multipart/form-data">

@csrf

<div class="row">
   
    <div class="form-group col-md-6 mt-3">
        <div>
            <h3><label for="icon">Font Awesome Icon</label></h3>
            <input type="text" class="form-control" id="icon" name="icon" value="">
        </div>
    </div>
<br>
    <div class="form-group col-md-6 mt-3">
        <div>
            <h3><label for="tittle">Tittle</label></h3>
            <input type="text" class="form-control" id="tittle" name="tittle" value="">
        </div>
    </div>
<br>
    <div class="form-group col-md-6 mt-3">
        <div>
            <h3><label for="Description">Description</label></h3>
            <textarea type="text" class="form-control" id="description" name="description"></textarea>
        </div>
    </div>
<br>
</div>

<input type="submit" name="submit" class="btn btn-primary mt-5">

<!--img End ##############################-->

             <div style="height: 100vh"></div>
                
            </div>
</form>
        </main>
        <!--Main LayOut END ##############################-->
@endsection

            