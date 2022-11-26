<?php
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Service\UserService;
use App\Models\User;
use Hash;

class LoginController extends Controller
{  
   
    protected $userService;
    public function __construct(UserService $userService){

        $this->userService=$userService;
    }
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin == 1) {
                return redirect()->route('admindashboard')
                ->withSuccess('You have Successfully loggedin');
            }else{
                return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
            }
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    
    public function postRegistration(Request $request)
    {  
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            
        ]);
           
        $data = $request->all();
        $user =  $this->create($data);
        $lastInsertId=$user->id;
        if ($data['referal_code']) {
            $this->userService->getReferalPoints($lastInsertId, $data['referal_code']);
        }
        Auth::login($user);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }


    public function create(array $data)
    {
      $userReferralCode = strtoupper($data['name']) . rand(10, 99);

      
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'referal_code'=>$userReferralCode,
      ]);
    }

    

}