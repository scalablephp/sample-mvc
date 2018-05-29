<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Common;
use App\UnauthorizeUser;
use App\Mail\Resetpassword;
use App\Mail\AccountBlock;
use App\Mail\UnauthorizeMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        if (\Cookie::get('admin_login') == '1')
            return redirect('admin/dashboard');
        $data['_token'] = "";
        return view('admin.login',$data);
    }

    public function login(Request $r)
    {
        $arr = "";
        $diff = 0;
        $user = User::where('Email',$r->input('username'))->first();
        if($user){
            if($user->IsBlocked == "1"){
                $arr = array("sucess"=>"false","message"=>__('account_block'));
                $currtime = Carbon::now();
                $oldtime = Carbon::parse($user->BlockeTime);
                $diff = $currtime->diffInMinutes($oldtime);
            }
            if($diff > $this->site_settings['block_timeout']){
                $user->AttemptsCnt = 0;
                $user->IsBlocked = "0";
                $user->BlockeTime = null;
                $user->save();
                $arr = $this->checkLogin($user,$r);
            }else {
                $arr = $this->checkLogin($user,$r);
            }
        }else {
            $ip = $r->ip();
            Common::loginLogData(array("value"=>$r->input('username'),"logType"=>'4',"ip"=>$ip));
            $cnt = UnauthorizeUser::where("IpAddress",$ip)->count();
            if($cnt == 3){
                $data['ip'] = $ip;
                $data['method'] = $r->method();
                $data['browser'] = \Browser::browserName().", ".\Browser::platformName();
                try{
                    \Mail::to($this->site_settings['admin_email'])->send(new UnauthorizeMail($data));
                }catch (Exception $ex){
                }
            }else {
                $unauthlog = new UnauthorizeUser;
                $unauthlog->IpAddress = $ip;
                $unauthlog->save();
            }
            $arr = array("sucess"=>"false","message"=>__('email_not_reg'));
        }
        return response()->json($arr);
    }

    public function checkLogin($user,$r)
    {
        $arr = "";
        if($user->IsBlocked == "1"){
            $arr = array("sucess"=>"false","message"=>__('account_block'));
        }elseif(\Hash::check($r->input('password'), $user->Password)) {
            $user->AttemptsCnt = 0;
            $user->IsBlocked = "0";
            $user->BlockeTime = null;
            $user->save();
            $time = 1440;
            if($r->input('stay_signed')){
                $time = time() + 60 * 60 * 24 * 365;
            }
            \Cookie::queue('admin_login','1',$time);
            \Cookie::queue('admin_id',$user->UserID,$time);
            \Cookie::queue('admin_name',$user->Name,$time);
            \Cookie::queue('admin_role',$user->Role,$time);
            $arr = array("sucess"=>"true","message"=>__('login_success'));
            Common::loginLogData(array("value"=>$r->input('username'),"logType"=>'1',"ip"=>$r->ip()));
        }else {
            if($user->AttemptsCnt == 3){
                $user->IsBlocked = "1";
                $user->BlockeTime = Carbon::now();
                Common::loginLogData(array("value"=>$r->input('username'),"logType"=>'3',"ip"=>$r->ip()));
                $data['name'] = $user->Name;
                $data['email'] = $user->Email;
                $data['ip'] = $r->ip();
                $data['method'] = $r->method();
                $data['browser'] = \Browser::browserName().", ".\Browser::platformName();
                try{
                    \Mail::to($this->site_settings['admin_email'])->send(new AccountBlock($data));
                }catch (Exception $ex){
                }
                $arr = array("sucess"=>"false","message"=>__('login_attmp_complt').$this->site_settings['block_timeout'].__('minute'));
            }else{
                $user->AttemptsCnt = $user->AttemptsCnt + 1;
                $arr = array("sucess"=>"false","message"=>__('invalid_cred'));
                $type = "5";
                if($user->AttemptsCnt == 2){
                    $type = "6";
                }if($user->AttemptsCnt == 3){
                    $type = "7";
                }
                Common::loginLogData(array("value"=>$r->input('username'),"logType"=>$type,"ip"=>$r->ip()));
            }
            $user->save();
        }
        return $arr;
    }

    public function forgot(Request $r)
    {
        $arr = "";
        $user = User::where('Email',$r->input('email'))->first();
        if($user){
            $token = \Hash::make($user->Email,['rounds' => 12]);
            $user->ResetToken = $token;
            $user->save();
            try{
                \Mail::to($r->input('email'))->send(new Resetpassword(urlencode($token),$user->Name));
                $arr = array("sucess"=>"true","message"=>__('reset_email'));
                //\Mail::failures()
            }catch (Exception $ex){
                $arr = array("sucess"=>"false","message"=>__('error_ajax'));
            }
        }else {
            $arr = array("sucess"=>"false","message"=>__('email_not_reg'));
        }
        return response()->json($arr);
    }

    public function reset($token)
    {
        if (\Cookie::get('admin_login') == '1')
            return redirect('admin/dashboard');
        $data['_token'] = $token;
        return view('admin.login',$data);
    }

    public function reset_pwd(Request $r)
    {
        $arr = "";
        $user = User::where('Email',$r->input('rusername'))->first();
        if($user){
            if($user->ResetToken != "" && \Hash::check($r->input('rusername'), $user->ResetToken)){
                $user->Password = \Hash::make($r->input('rpassword'),['rounds' => 12]);
                $user->ResetToken = "";
                $user->save();
                $arr = array("sucess"=>"true","message"=>__('pass_reset_sucess'));
            }else {
                $arr = array("sucess"=>"false","message"=>__('email_not_match'));
            }
        }else {
            $arr = array("sucess"=>"false","message"=>__('email_not_reg'));
        }
        return response()->json($arr);
    }

    public function logout(Request $r)
    {
        $user = User::findOrFail(\Cookie::get('admin_id'));
        Common::loginLogData(array("value"=>$user->Email,"logType"=>'2',"ip"=>$r->ip()));
        $cookie = \Cookie::forget('admin_login');
        $cookie1 = \Cookie::forget('admin_id');
        $cookie2 = \Cookie::forget('admin_name');
        $cookie3 = \Cookie::forget('admin_role');
        return redirect('admin')->withCookie($cookie)->withCookie($cookie1)->withCookie($cookie2)->withCookie($cookie3);
    }
}
