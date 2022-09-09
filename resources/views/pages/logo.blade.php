
@extends('layouts.admin_layout')
@section('content')
                    <!--Main LayOut Start ##############################-->
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Logo</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="{{route('logo')}}">Logo</a></li>
                                <li class="breadcrumb-item active">Admin Panel</li>
                            </ol>
                            <!--Image ##############################-->

<form action="{{route('admin.logo.update')}}" method="POST" enctype="multipart/form-data">

    @csrf
    {{method_field('PUT')}}
    
    
    <div class="row">
        <div class="form-group col-md-3 mt-3">
            <h3>Logo Image</h3>
            <img style="height: 30vh" src="{{url($logo->logo_img)}}" alt="navbar-logo" class="img-thumbnail">
            <input class="form-control" type="file" name="logo_img" id="logo_img">
        </div>

    </div>
    
    <input type="submit" name="submit" class="btn btn-primary mt-4">
    
    <!--img End ##############################-->
    
                            <div style="height: 100vh"></div>
                            
                        </div>
                    </form>
                    </main>
    
                    <!--Main LayOut END ##############################-->    
@endsection
