<?php

namespace App\Http\Controllers;

use App\Models\Stoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Session;


use function Laravel\Prompts\password;

class MainController extends Controller
{
    public function index()
    {
        return 
        view('welcome');
    }

    public function login()
    {
        return
        view('guest.login');
    }

    public function sign_up_user() 
    {
        return
            view('guest.register');
    }


    // METHOD FUNCTION
    public function auth_user(Request $req) 
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $req->input('email'),
            'password' => $this->encryptIt($req->input('password'))
        ];
        $user = Stoker::check_login($credentials);

        if ($user) {
            // Simpan ke session
            Session::put('user', [
                'id_user' => $user->id_user,
                'nama' => $user->nama,
                'email' => $user->email
            ]);
            return redirect('/dashboard')->with('resp_msg', ['type' => 'success', 'message' => 'Login berhasil']);
        } else {
            // Gagal login
            return redirect('login')->with('resp_msg', ['type' => 'error', 'message' => 'Email atau password salah.']);
        }
    }

    public function auth_admin(Request $req) 
    {
        
    }

    public function signup_user(Request $req) 
    {

        $password = $this->encryptIt($req->input('password'));
        $id_usr = $this->generateRandomStringUser($req->input('nama'));

        $dataRegisterUser = array(
            'id_user' => $id_usr,
            'nama' => $req->input('nama'),
            'email' => $req->input('email'),
            'password' => $password
        );

        Stoker::Insert($dataRegisterUser);
        // dd($req->all());
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Signed up successfully',
        //     'data' => $dataRegisterUser,
        // ], 201);

        return redirect('login')->with('resp_msg', ['type' => 'success', 'message' => 'Register Berhasil']);

    }
    
    public function signup_admin(Request $req) 
    {
        
    }

    public function logout() 
    {
        Auth::logout(); // Logout user dari session

        return redirect('login')->with('resp_msg', [
            'type' => 'success',
            'message' => 'Anda sudah logout'
        ]);
    }

    // STANDALONE FUNCTION
    public function encryptIt($q)
    {
        $qEncoded = base64_encode(md5($q));
        return ($qEncoded);
    }

    public function generateRandomStringUser($var) 
    {
        $string = preg_replace('/[^a-z]/i', '', $var);
        $vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
        $scrap  = str_replace($vocal, "", $string);
        $begin  = substr($scrap, 0, 3);
        $uniqid = strtoupper($begin);
        return "STOKER_" . $uniqid . substr(md5(time()), 0, 3);
    }
}
