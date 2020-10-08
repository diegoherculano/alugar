<?php

use Illuminate\Support\Facades\App;
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

Auth::routes(['register' => true]);

Route::redirect('/', '/home');

Route::prefix('pessoa')->group(function () {
    Route::get('/', 'PessoaController@index')->name('pessoa');
    Route::post('/', 'PessoaController@create')->name('pessoaCreate');
    Route::get('/register', 'PessoaController@register')->name('pessoaRegister');
    Route::get('/delete/{id}', 'PessoaController@delete');
});

Route::prefix('imovel')->group(function () {
    Route::get('/', 'ImovelController@index')->name('imovel');
    Route::post('/', 'ImovelController@create')->name('imovelCreate');
    Route::get('/register', 'ImovelController@register')->name('imovelRegister');
    Route::get('/delete/{id}', 'ImovelController@delete');
});

Route::prefix('contrato')->group(function () {
    Route::get('/', 'ContratoController@index')->name('contrato');
    Route::post('/', 'ContratoController@create')->name('contratoCreate');
    Route::get('/register', 'ContratoController@register')->name('contratoRegister');
    Route::get('/delete/{id}', 'ContratoController@delete');
    Route::get('/gerarWord/{id}', 'ContratoController@gerarWord')->name('contratoWord');
});

Route::prefix('financeiro')->group(function () {
    Route::get('/', 'FinanceiroController@index')->name('financeiro');
    Route::get('/recibo/{id}', 'FinanceiroController@recibo');
    Route::get('/gerarWord/{id}', 'FinanceiroController@gerarWord')->name('financeiroWord');
});

Route::get('/home', 'HomeController@index')->name('home');
