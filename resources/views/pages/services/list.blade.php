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
                        <th scope="col">Icon</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @if(count($services) > 0)
                            @foreach ($services as $service)
                      <tr>
                        <th scope="row">{{$service->id}}</th>
                        <td>{{$service->icon}}</td>
                        <td>{{$service->tittle}}</td>
                        <td>{{$service->description}}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-primary" href="{{route('admin.services.edit', $service->id)}}">Edit</a>
                                </div>
                                <div class="col">
                                    <form action={{route('admin.services.destroy', $service->id)}} method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                </form>
                                </div>
                            </div>
                        </td>
                      </tr>
                      @endforeach

                    @endif

                    </tbody>
                  </table>




             <div style="height: 100vh"></div>
                
            </div>
        </main>
        <!--Main LayOut END ##############################-->
@endsection

            