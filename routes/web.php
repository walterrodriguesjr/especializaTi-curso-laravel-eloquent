<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//EXEMPLOS USANDO MÉTODOS DE FILTROS DO ELOQUENT-AULA-3-MODULO-3
Route::get('/where', function(User $user) {
    $filter = 'm';
    //$users = $user->where('email', '=', 'lilly21@example.org')->first();
    //$users = $user->where('name', 'LIKE', "%{$filter}%")->get();
    //$users = $user->where('name', 'LIKE', "%{$filter}%")->orWhere('name', 'Lyda')->get();
    $users = $user->where('name', 'LIKE', "%{$filter}%")->orWhere(function($query) {
        $query->where('name', '=', 'Maximo');
    })->get();

    echo "<pre>";
    var_dump($users);
    echo "</pre>";
});

//EXEMPLOS USANDO MÉTODOS DE CONSULTAS DO ELOQUENT-AULA-2-MODULO-3
Route::get('/select', function() {
    //$users = User::all();
    //$users = User::where('id', 1)->get();
    //$user = User::where('id', 10)->first();
    //$user = User::first();
    //$user = User::find(10);
    //$user = User::findOrFail(20);

    //echo $user->name;
});

Route::get('/', function () {
    return view('welcome');
});
