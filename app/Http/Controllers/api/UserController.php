<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use Storage;
use DB;
class UserController extends BaseController
{
    public function login(Request $request)
    {
        // Storage::put('login_live.txt',json_encode($request->header()));
        $email = $request->email;
        $password = $request->password;
        $device_id = $request->device_id;
        session(['device_id' => $device_id]);
        $os = $request->os;
        $os_version = $request->os_version;
        $auto = $request->auto;
        
        $user = user::where('email',$email)->first();
     
        if($user=='')
        {
                 $msg ='Login failed';
                        $result['alert']['title'] =array(
                            'text' => 'Login'


                        );
                        $result['alert']['message'] = array(
                            'text' => 'Invalid mobile number or Password!.'

                    );
                    $code = 0;
                    return $this->sendResponse($result,$msg,$code);
        }
       
       
            if($email&&$password)
            {
               
                if(Hash::check($password,$user->password)) {
                    
                   
                    
                    // $login_otp = LoginOtp::where('phone',$phone)
                    //             ->where('device_id',$device_id)
                    //             ->orderBy('created_at','desc')
                    //             ->first();
                    
                    // if($login_otp)
                    // {
                    //     if($login_otp->status==1)
                    //     {
                            $result['token'] = $user->createToken("API TOKEN")->plainTextToken;
                            $result['user_id'] = $user->id;
                            $result['name']  = $user->name;
                            $result['email']= $user->email;
                            if($request->go_to_home=="true")
                            {
                                $result['close_windows']="true";
                            }else{
                                $result['close_window']="true";
                            }
                            
                            $result['notify']="true";
                            $msg = 'Login';
                            $code = 0;
                            return $this->sendResponse($result,$msg,$code);
                  
                    if($auto!=1)
                    {
                        $msg = 'Login failed';
                        $result['alert']['title'] =array(
                            'text' => 'Login',


                        );
                        $result['alert']['message'] = array(
                            'text' => 'Invalid Email or Password!.'

                    );
                    $code = 0;
                    return $this->sendResponse($result,$msg,$code);
                    }else{
                        $msg ='Login failed';
                        $result ='';
                        $code = 0;
                        return $this->sendResponse($result,$msg,$code);
                    }

                }
                else{
                $msg = 'Login failed';
                        $result['alert']['title'] =array(
                            'text' => 'Login'


                        );
                        $result['alert']['message'] = array(
                            'text' => 'Invalid Email or Password!.'

                    );
                    $code = 0;
                    return $this->sendResponse($result,$msg,$code);
            }
                
                
            }else{
                $msg = 'Login failed';
                        $result['alert']['title'] =array(
                            'text' => 'Login'


                        );
                        $result['alert']['message'] = array(
                            'text' => 'Invalid mobile number or Password!.'

                    );
                    $code = 0;
                    return $this->sendResponse($result,$msg,$code);
            }
            
           
        
    }
   
}


