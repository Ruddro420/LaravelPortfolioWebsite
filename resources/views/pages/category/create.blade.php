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

                <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    {{method_field('PUT')}}
                    
                    
                    <div class="row">
                        
                        <div class="form-group col-md-4 mt-3">
                            <div>
                                <h3><label for="tittle">Tittle</label></h3>
                                <input type="text" class="form-control" id="tittle" name="tittle" value="">
                            </div>
                        </div>
                    
                        <div class="form-group col-md-4 mt-3">
                            <div>
                                <h3><label for="sub_tittle">Sub Tittle</label></h3>
                                <input type="text" class="form-control" id="sub_tittle" name="sub_tittle" value="">
                            </div>
                            <br>
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

            