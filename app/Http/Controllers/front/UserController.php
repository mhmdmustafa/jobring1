<?php

namespace App\Http\Controllers\front;


use App\Http\Controllers\Controller;
use App\Models\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function dashboard(){
        return view('front.front_dashboard');
    }
    public function register(Request $request){
        if($request ->isMethod('post')){
            $data=$request->all();
            $usersCount=User::where('email',$data['email'])->count();
            if($usersCount>0){
                return redirect()->back()->with('error_message','Email Already Exist');

            }else{
                $user=new User;
                $user->name=$data['name'];
                $user->email=$data['email'];
                $user->password=bcrypt($data['password']);
                $user->save();
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    Session::put('frontSession',$data['email']);
                    return redirect('/');

                }
            }

        }
       return view('front.front_register');
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                Session::put('frontSession',$data['email']);
                return redirect('/');
            } else {
                Session::flash('error_message', 'Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('front.front_login');
    }
    public function checkEmail(Request $request){
        $data=$request->all();
        $usersCount=User::where('email',$data['email'])->count();
        if($usersCount>0){
            echo 'false';
        }else{
            echo 'true';die;
        }
    }
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
    public function account(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            if(empty($data['name'])){
                return redirect()->back()->with('flash_message_error','Please enter your Name to update your account details!');
            }

            if(empty($data['address'])){
                $data['address'] = '';
            }

            if(empty($data['city'])){
                $data['city'] = '';
            }

            if(empty($data['state'])){
                $data['state'] = '';
            }

            if(empty($data['country'])){
                $data['country'] = '';
            }

            if(empty($data['pincode'])){
                $data['pincode'] = '';
            }

            if(empty($data['mobile'])){
                $data['mobile'] = '';
            }

            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Your account details has been successfully updated!');
        }

        return view('front.account')->with(compact('countries','userDetails'));
    }
}
