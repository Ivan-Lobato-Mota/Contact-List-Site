<?php
  
namespace App\Http\Controllers\Api\V1;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class UserController extends Controller
{

    public function index()
    {
        return User::get();
    }  

    public function show()
    {
        return User::where( 'us_id', 'us_id');
    }  
      
    public function registration(): View
    {
        return view('auth.registration');
    }
      
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'us_email' => 'required',
            'us_password' => 'required',
        ]);
   
        if (Auth::attempt(['us_email' => $request->us_email,'password' => $request->us_password])) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Login realizado com sucesso!');
        }
  
        return redirect("login")->withError('Ops! Login ou Senha inválidos!');
    }
      
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'us_name' => 'required',
            'us_email' => 'required|email|unique:user_data,us_email',
            'us_password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $user = $this->create($data);
            
        Auth::login($user); 

        return redirect("dashboard")->withSuccess('Excelente, você realizou o Login!');
    }
    
   
    public function create(array $data)
    {
      return User::create([
        'us_name' => $data['us_name'],
        'us_email' => $data['us_email'],
        'us_password' => Hash::make($data['us_password'])
      ]);
    }
    
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}