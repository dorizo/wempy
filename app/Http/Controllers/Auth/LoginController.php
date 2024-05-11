<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

      $sss = User::select("permissionNama")->join('user_roles', 'user_roles.user_id', '=', 'users.id')->join('permission_role', 'user_roles.role_RoleCode', '=', 'permission_role.role_roleCode')->join('permissions', 'permission_role.permission_permissionCode', '=', 'permissions.permissionCode')->where("email" ,$credentials["email"] )->get()->toArray();
      $array = array();
      foreach ($sss as $key => $value) {
        # code...
        array_push($array , $value["permissionNama"] );
      }
    //   print_r($array);
      Session::put('permission', $array);
        
        if (Auth::attempt($credentials)) {

            
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withError('Login details are not valid');
    }
}
