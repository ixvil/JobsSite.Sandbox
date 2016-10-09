<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get(config('captcha.url'), function () {
    return response(\App\Modules\Captcha\CaptchaHelper::renderCaptcha())
        ->header('Content-Type', 'image/jpeg');
});
Route::get(\App\Http\Controllers\VacanciesController::VACANCIES_CREATE_PATH, 'VacanciesController@showCreateVacancyForm');
Route::post(\App\Http\Controllers\VacanciesController::VACANCIES_CREATE_PATH, 'VacanciesController@createVacancy');
Route::get(\App\Http\Controllers\VacanciesController::VACANCIES_LIST_PATH, 'VacanciesController@listVacancies');


