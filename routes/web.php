<?php

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

Route::get('/', 'RewardMaximizerController@index');

Route::get('/calculate', 'CreditCardsController@calculate');

Route::get('/credit_cards', 'CreditCardsController@index');
Route::get('/credit_cards/{id}/edit', 'CreditCardsController@edit');
Route::get('/credit_cards/new', 'CreditCardsController@create');
Route::post('/credit_cards', 'CreditCardsController@store');
Route::put('/credit_cards/{id}', 'CreditCardsController@update');
Route::delete('/credit_cards/{id}', 'CreditCardsController@delete');

Route::get('/credit_cards/{id}/categories', 'CreditCardCategoriesController@index');
Route::get('/credit_cards/{id}/categories/new', 'CreditCardCategoriesController@create');
Route::post('/credit_cards/{id}/categories', 'CreditCardCategoriesController@store');
Route::delete('/credit_cards/{credit_card_id}/categories/{category_id}', 'CreditCardCategoriesController@delete');

Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/new', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');
Route::delete('/categories/{id}', 'CategoriesController@delete');

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
