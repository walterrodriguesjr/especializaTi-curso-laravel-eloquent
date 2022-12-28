<?php

use App\Models\Post;
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

//EXEMPLOS USANDO MÉTODOS DE INSERÇÃO(MANUAL) DO ELOQUENT-AULA-6-MODULO-3
/* Route::get('/insert', function(Post $post) {
    $post->user_id = 1;
    $post->title = 'Primeiro Post';
    $post->body = 'Conteúdo do post';
    $post->date = date('Y-m-d');
    $post->save();
    $posts = Post::get();
    return $posts;
}); */

//EXEMPLOS USANDO MÉTODOS DE ORDENAÇÃO DO ELOQUENT-AULA-5-MODULO-3
/* Route::get('/orderby', function() {
    $users = User::orderBy('name', 'desc')->get();

    return $users;
}); */

//EXEMPLOS USANDO MÉTODOS DE PAGINAÇÃO DO ELOQUENT-AULA-4-MODULO-3
/* Route::get('/pagination', function() {
    $users = User::paginate(2);

    return $users;
}); */

Route::get('/where', function(User $user) {
    $filter = 'm';
    //$users = $user->where('email', '=', 'lilly21@example.org')->first();
    //$users = $user->where('name', 'LIKE', "%{$filter}%")->get();
    //$users = $user->where('name', 'LIKE', "%{$filter}%")->orWhere('name', 'Lyda')->get();
    /* $users = $user->where('name', 'LIKE', "%{$filter}%")->orWhere(function($query) {
        $query->where('name', '=', 'Maximo');
    })->get(); */

    /* echo "<pre>";
    var_dump($users);
    echo "</pre>"; */
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
