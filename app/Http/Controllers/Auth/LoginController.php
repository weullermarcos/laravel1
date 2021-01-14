<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/config';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request)
    {
        //definindo variavel login_tries na sessão e atribuindo valor 0 para o caso da variável não existir
        $tries = $request->session()->get('login_tries', 0);

        $frase = __('messages.test');

        echo "FRASE: " . $frase;

        return view('login', [

            'tries' => $tries

        ]);
    }

    public function authenticate(Request $request){

        //recupera parametros para autenticação
        $creds = $request->only(['email', 'password']);

        //recuperando informação da sessão
        $tries = intval($request->session()->get('login_tries', 0));

        $request->session()->forget('login_tries');

//        echo print_r($creds);

        //tenta a autenticação
        if(Auth::attempt($creds)){

            $request->session()->put('login_tries', 0);
            return redirect()->route('config.index');
        }
        else{


            //incrementando o número de tentativas e setando na variável de sessão
            $tries ++;
            $request->session()->put('login_tries', $tries);

            return redirect()->route('login')->with('warning', 'Email ou senha inválidos',);
        }

    }

    public function logout(){

        //deslogando
        Auth::logout();

        return redirect()->route('login');

    }

}
