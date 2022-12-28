<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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



//USANDO O observer PARA MONITORAR AÇÕES(EVENTOS) RELACIONADAS A REFERIDA MODEL, RETORNANDO O QUE FOR ESPECIFICADO NO OBSERVER
Route::get('/observer', function() {
    $user = User::first();
    $post = Post::create([
        'user_id' => $user->id,
        'title' => 'New Title ' . Str::random(10),
        'body' => Str::random(100),
        'date' => now(),
    ]);
    return $post;
});

//USANDO O MÉTODO DE global scope, as funções são criadas na em arquivo próprio, ficando disponíveis a todas as models para uso
Route::get('/global-scopes', function() {
    /* $posts = Post::get();
    return $posts; */
});

//USANDO O MÉTODO DE localScope, as funções são criadas na model, e reaproveitas no controller ou route
Route::get('/local-scope', function() {
    //$posts = Post::LastWeek()->get();
   // $posts = Post::today()->get();
    //$posts = Post::between('2022-12-22', '2022-12-25')->get();
    //return $posts;
});

//EXEMPLO USANDO O MÉTODO MUTATOR PARA ALTERAR O DADO SALVO, ANTES QUE ELE CHEGUE NO BANCO
Route::get('/mutators', function() {
   /*  $user = User::first();
    $post = Post::create([
        'user_id' => $user->id,
        'title' => 'Um novo título ' . Str::random(10),
        'body' => Str::random(100),
        'date' => now(),
    ]);
    return $post; */
});

//EXEMPLO USANDO O MÉTODO ACCESSOR CRIADO NA MODEL DE Post
Route::get('/acessor', function() {
    $post = Post::get();
    return $post;
});

//EXEMPLO MÉTODO delete(), QUE APAGA UMA LINHA DO BANCO, APÓS ESTA SER ESPECIFICADA PELO find()
Route::get('/delete', function() {
    /* $post = Post::find(8);
    $post->delete();

    $posts = Post::get();
    return $posts; */
});

//EXEMPLOS USANDO O updateOrCreate, que consegue fazer o update e save no mesmo método(mais produtivo)
Route::get('update2', function () {
    /* $post = Post::find(1);
    $post->updateOrCreate(
    [
        'user_id' => 41,
    ],
    [
        'title' => 'Title41ds atualizado com updateOrCreate',
        'body' => 'Body41ds atualizado com updateOrCreate',
        'date' => date('Y-m-d'),

    ]);
    $post = Post::get();
    return $post; */
});

//EXEMPLOS USANDO MÉTODOS DE INSERÇÃO(MASS ASSIGNMENT(ATRIBUIÇÃO EM MASSA)) DO ELOQUENT-AULA-8-MODULO-3
Route::get('/update', function () {
    /* $post = Post::find(1);

    $post->update([
        'user_id' => 4,
        'title' => 'Título atualizado',
        'body' => 'Body atualizado',
        'date' => date('Y-m-d')
    ]);
    $post = Post::get();
    return $post; */
});

//EXEMPLOS USANDO MÉTODOS DE INSERÇÃO(MASS ASSIGNMENT) DO ELOQUENT-AULA-7-MODULO-3
Route::get('/insert2', function () {
     /* $post = Post::create([
        'user_id' => 50,
        'title' => 'Valor para o title',
        'body' => 'Valor para o body',
        'date' => date('Y-m-d'), 
      ]); 
      $posts = Post::get();
    return $posts; */
});

//EXEMPLOS USANDO MÉTODOS DE INSERÇÃO(MANUAL) DO ELOQUENT-AULA-6-MODULO-3
Route::get('/insert', function (Post $post) {
    /*  $post->user_id = 1;
    $post->title = 'Primeiro Post';
    $post->body = 'Conteúdo do post';
    $post->date = date('Y-m-d');
    $post->save();
    $posts = Post::get();
    return $posts; */
});

//EXEMPLOS USANDO MÉTODOS DE ORDENAÇÃO DO ELOQUENT-AULA-5-MODULO-3
Route::get('/orderby', function () {
    /*  $users = User::orderBy('name', 'desc')->get();

    return $users; */
});

//EXEMPLOS USANDO MÉTODOS DE PAGINAÇÃO DO ELOQUENT-AULA-4-MODULO-3
Route::get('/pagination', function () {
    /* $users = User::paginate(2);

    return $users; */
});

Route::get('/where', function (User $user) {
    //$filter = 'm';
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
Route::get('/select', function () {
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
