<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassMail;
use App\Models\UtilisateurModel;
use Dotenv\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UtilisateurModelController extends Controller
{
    //
    protected $utilisateur;
    public function __construct(){
        $this->utilisateur = new UtilisateurModel();
    }



    public function indexforall(){
        if(Session::get('role_id')){
            
            return view('index');
        }

        else{
            return redirect()->to('/login');
        
    }
  }

    public function Register_Page(){
        return view('Auth.register');
    }
    public function Login_Page(){
        Session::forget('user_id');
        Session::forget('role_id');

        return view('Auth.login');
    }

    public function Register(Request $request)
    {
        $password = $request->password;
        $c_password = $request->c_password;
        if($c_password == $password){
            $role = 2 ;             
            $this->validate($request, [
                'name' => 'required|string|unique:utilisateur_models,name',
                'email' => 'required|email|unique:utilisateur_models,email',
                'password' => 'required|string|min:8',
            ],[
                'name.required' => 'Le champ nom est important',
                'name.unique' => 'Ce nom est déjà pris',
                'email.required' => 'Le champ email est important',
                'email.email' => 'Veuillez entrer une adresse email valide',
                'email.unique' => 'Cet email est déjà pris',
                'password.required' => 'Le champ mot de passe est important',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            ]);                     

            $utilisateur = $this->utilisateur;
            $utilisateur->name = $request->name;
            $utilisateur->email = $request->email;
            $utilisateur->password = Hash::make($request->password);
            $utilisateur->role_id = $role;    
            $utilisateur->save();
            return redirect()->to('/login');
        }

        else {
            return redirect()->to('/register')
            ->withErrors($request->validate)
            ->withInput()
            ->with('msg' ,'La comfirmation de mot de pass est incorrect');
        }
        
        
    }

    public function Login(Request $request)
    {
        

        $this->validate($request, [
            'email' => 'required|email|exists:utilisateur_models,email',
        ], [
            'email.required' => 'Le champ email est important',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'email.exists' => "Cet email n'existe pas",
            'password.required' => 'Le champ mot de passe est important',
        ]);
        $email = $request->email;
        $password = $request->password;
        $utilisateur = $this->utilisateur;
        $utilisateur = $utilisateur->where('email', $email)->first();
        if (Hash::check($password, $utilisateur->password)) {

            Session::put('user_id', $utilisateur->id);
            session::put('role_id', $utilisateur->role_id);

            $role_id = $utilisateur->role_id ;
            if($role_id == 1){
                return redirect()->to('/index');
            }
            if($role_id == 2){
                return redirect()->to('/home');
            }
            else {                
                return redirect()->to('/index');    
            }
            
        } else {
            return redirect()->to('/login')->withErrors(['email' => 'Email or password incorrect']);
        }
    }

    public function forgotpage(){
        return view('Auth.forgot');
    }
    public function reset($token){
        $checktoken = $this->utilisateur->where('remember_token'  , $token)->first();
        if(!empty($checktoken)){
                   
            return view('Auth.reset');
        }

        else{
            abort(403);
        }
    }
    public function reset_pass($token , Request $request){

        $this->validate($request, [
            'pass' => 'required|string|min:8',
        ],[
            'pass.required' => 'Le champ mot de passe est important',
            'pass.min' => 'Le mot de passe doit contenir au moins 8 caractères',
        ]);                     

         $checktoken = $this->utilisateur->where('remember_token', $token)->first();

            if(!empty($checktoken) && $request->pass == $request->c_pass){
                    
                $checktoken->remember_token = Str::random(60);
                $checktoken->password = Hash::make($request->pass);
                $checktoken->save();
                return redirect('/login')->with("message_green" , "Le Mot De pass a ete changer avec succes");
            }

            else{
                abort(403);
            }
        
    }

    public function forgot(Request $request){
         $checkemail = $this->utilisateur->where('email'  , $request->email)->first();
         $checkemail = $this->utilisateur->where('email'  , $request->email)->first();
         if(!empty($checkemail)){

            $checkemail->remember_token = Str::random(60);
            $checkemail->save();
            
            Mail::to($checkemail->email)->send(new ForgotPassMail($checkemail));
            
            return back()->with('message', 'check voter email');

         }
         else{
            return redirect('/forgotpage')->with('message', 'Email pas Exist');
         }
         

    }
    
}
