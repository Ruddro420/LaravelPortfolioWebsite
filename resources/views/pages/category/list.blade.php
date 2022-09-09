@extends('layouts.admin_layout')
@section('content')
        <!--Main LayOut Start ##############################-->
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">List</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('main')}}">List</a></li>
                    <li class="breadcrumb-item active">Admin Panel</li>
                </ol>


                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usr_id</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Sub Tittle</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        
                            @foreach ($allData as $allDatas)
                      <tr>
                        <th scope="row">{{$allDatas->id}}</th>
                        <th scope="row">{{$allDatas->user_id}}</th>
                        <td>{{$allDatas->tittle}}</td>
                        <td>{{$allDatas->sub_tittle}}</td>
                           
                        </td>
                      </tr>
                      @endforeach


                    </tbody>
                  </table>




             <div style="height: 100vh"></div>
                
            </div>
        </main>
        <!--Main LayOut END ##############################-->
@endsection

            