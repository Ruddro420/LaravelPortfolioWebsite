
@extends('layouts.admin_layout')
@section('content')
                    <!--Main LayOut Start ##############################-->
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Admin Panel</li>
                            </ol>
                            <div style="height: 100vh"></div>
                            
                        </div>
                    </main>
    
                    <!--Main LayOut END ##############################-->    
@endsection
