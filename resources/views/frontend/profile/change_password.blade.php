@extends('frontend.main_master')
@section('content')

<!--    Fetch Data Using QueryBilder:      
    agr hum IndexController.php  controller me method me compact use 
     nhi karna chahte hai to is type se bhi hum user ki information fetch kr skte hai 
-->
<!--
@php 
    $user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp
-->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }} " style="border-radius:50%; height:160px; width:100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="card">
                   <h3 class="text-center">
                       <span class="text-danger">Change Password</span>
                   </h3>
                   <div class="card-body">
                       <form action="{{ route('user.password.update') }}" method="post">
                           @csrf
                           <div class="form-group">
                                <label class="info-title" for="current_password">Current Password<span></span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="current_password" name="oldpassword">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span></span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Re-Enter New Password <span></span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-sm">Update</button>
                            </div>

                       </form>
                   </div>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection