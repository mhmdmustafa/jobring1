@extends('layouts.front_layout.front_layout')

@section('content')
    <section id="form" style="margin-top:20px;"><!--form-->
        <div class="container">
            <div class="row">
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                @endif
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif

                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form" >
                        <h2>Update Account</h2>
                        <form id="accountForm" name="accountForm"  action="{{ url('/account') }}" method="POST">@csrf
                            <input  id="email" name="email" class="form-control" type="email" placeholder="Email" />
                            <br>
                            <input  id="name" name="name"class="form-control" type="text" placeholder="Name"/>
                            <br>
                            <input  id="address" name="address" class="form-control" type="text" placeholder="Address"/>
                            <br>
                            <input  id="city" name="city" type="text" class="form-control" placeholder="City"/>
                            <br>
                            <input  id="state" name="state" type="text" class="form-control" placeholder="State"/>
                            <br>
                            <select id="country" name="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <input  style="margin-top: 10px;" id="pincode" name="pincode" type="text" placeholder="Pincode" class="form-control"/>
                            <br>
                            <input  id="mobile" name="mobile" type="text" placeholder="Mobile" class="form-control"/>

                            <br>
                            <button type="submit" class="btn btn-danger">Update</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>Update Password</h2>
                        <form id="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="POST">@csrf

                            <input type="password" name="current_pwd" id="current_pwd" class="form-control" placeholder="Current Password">
                            <span id="chkPwd"></span>
                            <br>
                            <input type="password" name="new_pwd" id="new_pwd" class="form-control" placeholder="New Password">
                            <br>
                            <input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password">
                            <br>

                            <button type="submit" class="btn btn-danger">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
