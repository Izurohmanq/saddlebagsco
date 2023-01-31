<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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
// for user yg biasa
Route::get('/', [PageController::class, 'homePage']);
Route::get('/photos', [PageController::class, 'photosPage']);
Route::get('/products', [PageController::class, 'productsPage']);
// buat feedback
// Route::post('/', [PageController::class, 'storeFeedback']);
// Route::post('/photos', [PageController::class, 'storeFeedback']);
// Route::post('/products', [PageController::class, 'storeFeedback']);
Route::post('/storeFeedback', [PageController::class, 'storeFeedback']);

Route::get('/products/{products:slug}', [PageController::class, 'detailsPage']);



// for admin
Route::get('/dashboardadminganteng', [DashboardController::class, 'index']);
Route::get('/dashboardadminganteng/add-product', [DashboardController::class, 'addProduct']);
Route::get('/dashboardadminganteng/feedback', [DashboardController::class, 'feedbackPage']);
Route::post('/dashboardadminganteng/add-product', [DashboardController::class, 'store']);
Route::get('/dashboardadminganteng/add-product/createSlug', [DashboardController::class, 'createSlug']);
Route::delete('/dashboardadminganteng/products/{product}', [DashboardController::class, 'destroy']);
Route::get('/dashboardadminganteng/products', [DashboardController::class, 'showProduct']);
Route::get('/dashboardadminganteng/edit-product-{products}', [DashboardController::class, 'editProduct']);
Route::put('/dashboardadminganteng/edit-product-{products}', [DashboardController::class, 'updateData']);


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);