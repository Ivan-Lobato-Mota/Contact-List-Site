
<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Api\V1\ContactController;

  
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
//Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('settings', [AuthController::class, 'settings'])->name('settings');
Route::get('delete', [AuthController::class, 'delete'])->name('delete.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('google-autocomplete', [GoogleController::class, 'index']);
Route::get('dashboard',[ContactController::class,'indexlist'])->name('dashboard');