<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function segunda()
    {
        return view('segunda');
    }
}
/*
Laravel - verificación
1º me puedo dar de dalta
2º me puedo loguear sin estar verificado
3º no me puedo verificar si no estoy logueado

Verificación "habitual"
1º me puedo dar de alta: cuando un usuario se dé de alta no hacer login: RegisterController ok
2º no me puedo loguear hasta que me verifico: además comprobar que el usuario está verificado: LoginController ok
3º me puedo verificar sin estar logueado: con el enlace de verificación que sea suficiente: VerificationController ok
*/