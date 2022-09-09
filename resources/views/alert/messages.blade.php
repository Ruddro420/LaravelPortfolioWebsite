@if ($errors->any())
    
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <strong>Error ! </strong>{{$error}}
                </div>
            @endforeach
@endif


@if (session('error'))
    
            <div class="alert alert-danger alert-dismissible">
                <strong>Error ! </strong>{{session('error')}}
                </div>
@endif

@if (session('logo_error'))
    
            <div class="alert alert-danger alert-dismissible">
                <strong>Error ! Before Submit You Have to change the logo</strong>
                </div>
@endif

@if (session('success'))
    
            <div class="alert alert-success alert-dismissible">
                <strong>Success ! </strong>{{session('success')}}
                </div>
@endif