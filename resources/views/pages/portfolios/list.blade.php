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
                        <th scope="col">Tittle</th>
                        <th scope="col">Sub Tittle</th>
                        <th scope="col">Big Img</th>
                        <th scope="col">Small Img</th>
                        <th scope="col">Description</th>
                        <th scope="col">Clint</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @if(count($portfolio) > 0)
                            @foreach ($portfolio as $portfolios)
                      <tr>
                        <th scope="row">{{$portfolios->id}}</th>
                        <td>{{$portfolios->tittle}}</td>
                        <td>{{$portfolios->sub_tittle}}</td>
                        <td><img style="height: 5vh" src="{{url($portfolios->big_img)}}"></td>
                        <td><img style="height: 5vh" src="{{url($portfolios->small_img)}}"></td>
                        <td>{{$portfolios->description}}</td>
                        <td>{{$portfolios->clint}}</td>
                        <td>{{$portfolios->category}}</td>
                        <td>
                            <div class="row p-0">
                                <div class="col p-0">
                                    <a class="" href="{{route('admin.portfolios.edit', $portfolios->id)}}">Edit</a>
                                </div>
                                <div class="col p-0">
                                    <form action={{route('admin.portfolios.destroy', $portfolios->id)}} method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <input type="submit" name="submit" value="Delete" class="">
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

            