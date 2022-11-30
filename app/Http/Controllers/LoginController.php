<?php

namespace App\Http\Controllers;

use App\Models\Tokenapk;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $redirectTo = '/';

    //
    function userLogin(Request $request){
        $user = Utilisateur::where(['email'=>$request->mail])->first();

        if($user){
            $real = $user->pass;
            $input = md5($request->mdp);
            if($real!=$input){
                return redirect('/espace-client');
            }
            else{
                $role = $user->iduserrole;
                $idUser = $user->id;
                $mail = $user->email;
                $tel = $user->tel;
                $soc = $user->societe;
                $nom = $user->nom;
                $activite = $user->activite;

                $request->session()->put('id', $idUser);
                $request->session()->put('role', $role);
                $request->session()->put('mail', $mail);
                $request->session()->put('tel', $tel);
                $request->session()->put('soc', $soc);
                $request->session()->put('nom', $nom);
                $request->session()->put('activite', $activite);

                if($role == 1) return redirect('/');
                elseif($role == 2) return redirect('/listeProduit');
                else return redirect('/espace-client');

            }
        }
        else{
            return redirect('/espace-client');
        }
    }


    public function index(){
        return view('loginform');
    }


    public function postLogin(Request $request) {
        $request->validate([
            'mail' => 'required',
            'pass' => 'required',
        ]);
        $credentials = $request->only('mail', 'pass');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                             ->withSuccess('You have Successfully loggedin');
        }
        return redirect("loginpage")->withSuccess('Oppes! You have entered invalid credentials');
    }


    public function loginApk(Request $request){
        $mail = $request->get('email');
        $mdp = md5($request->get('mdp'));
        $role = $request->get('role');

        $user['login'] = Utilisateur::where('email', $mail)
                            ->where('pass', $mdp)
                            ->where('iduserrole', $role)
                            ->get();

        $idclient = $user['login'][0]->id;
        $pass = $user['login'][0]->mdp;
        $dateheurenow = md5(date("Y-m-d H:i:s"));
        $iduserrole = $user['login'][0]->iduserrole;
        $token = new Tokenapk();
        $token->idclients = $idclient;
        $token->token = (string)$pass.(string)$dateheurenow."token123".(string)$idclient;
        $token->role = $iduserrole;
        $token->save();

        return response()->json($user['login']);
    }

    public function getTokenApk(Request $request){
        $idclient = $request->get('idclient');
        $user['token'] = Tokenapk::where('idclients', $idclient)
                            ->get();
        return response()->json($user['token']);
    }

    public function logoutApk(Request $request){
        // $idclient = $request->get('idclient');
        // $token = Tokenapk::where('')
    }

}
