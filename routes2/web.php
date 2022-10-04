<?php

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ModuleMaterialsController;


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

// /*  GELÖSCHT AM 08.07.2022
// MODUL Material - (Skript, Vodcast,...)
// */
// Route::get('/modulematerial/create', [ModuleMaterialsController::class,'create'])->middleware('auth');
// Route::post('/modulematerial', [ModuleMaterialsController::class,'store'])->middleware('auth');

// Route::get('/modulematerial/{modulematerial}/edit', [ModuleMaterialsController::class,'edit'])->middleware('auth');
// Route::delete('/modulematerial/{modulematerial}', [ModuleMaterialsController::class,'destroy'])->middleware('auth');

// Route::get('/modulematerials', [ModuleMaterialsController::class,'index'])->middleware('auth');
// Route::get('/modulematerial/{modulematerial}', [ModuleMaterialsController::class,'show'])->middleware('auth');
/*
MODUL Material - (Skript, Vodcast,...)
*/
Route::get('/material/create', [MaterialsController::class,'create'])->middleware('auth');

Route::post('/material', [MaterialsController::class,'store'])->middleware('auth');
// Show Edit Form
Route::get('/material/{material}/edit', [MaterialsController::class,'edit'])->middleware('auth');
// Update Modul Daten
Route::put('/material/{material}', [MaterialsController::class,'update'])->middleware('auth');
// Delete Modul Daten
Route::delete('/material/{material}', [MaterialsController::class,'destroy'])->middleware('auth');

Route::get('/materials', [MaterialsController::class,'index'])->middleware('auth');

Route::get('/material/{material}', [MaterialsController::class,'show'])->middleware('auth');


// Show Create Form
// Vorsicht! Reihenfolge beachten! Wenn der show vor dem Create steht, kann es sein, dass er zuerst den Show öffnen möchte und anschließend den Create nimmt
Route::get('/module/create', [ModuleController::class,'create'])->middleware('auth');
// Store Modul Daten
Route::post('/module', [ModuleController::class,'store'])->middleware('auth');
// Show Edit Form
Route::get('/module/{modul}/edit', [ModuleController::class,'edit'])->middleware('auth');
// Update Modul Daten
Route::put('/module/{modul}', [ModuleController::class,'update'])->middleware('auth');
// Delete Modul Daten
Route::delete('/module/{modul}', [ModuleController::class,'destroy'])->middleware('auth');
// Zeige alle Module
Route::get('/modules', [ModuleController::class,'index'])->middleware('auth');
// Zeige einzelne Module
Route::get('/module/{modul}', [ModuleController::class,'show'])->middleware('auth');


// Show Create Form
Route::get('/tickets/create', [TicketController::class, 'create'])->middleware('auth');

// Store Ticket Data
Route::post('/tickets', [TicketController::class, 'store'])->middleware('auth')->name('send-mail');

// All Tickets
Route::get('/', [TicketController::class, 'manage'])->middleware('auth');

// Show User Profile
Route::get('/tickets/user', [UserController::class, 'user'])->middleware('auth');


//Show Edit Form
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->middleware('auth');

//Update Tickets
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->middleware('auth');

//Delete Tickets
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->middleware('auth');

// Manage Tickets
Route::get('/tickets/manage', [TicketController::class, 'index'])->middleware('auth');

Route::get('/tickets/manageuserfilter', [TicketController::class, 'manageuserfilter'])->middleware('auth');


// Single Ticket
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->middleware('auth');



// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class,'store'])->middleware('auth');
// Show Edit Form
Route::get('/users/{user}/edit', [UserController::class,'edit'])->middleware('auth');
// Update Daten
Route::put('/users/{user}', [UserController::class,'update'])->middleware('auth');
// Destroy Daten
Route::delete('/users/{user}', [UserController::class,'destroy'])->middleware('auth');
// Zeige alle Module
Route::get('/users', [UserController::class,'index'])->middleware('auth');
// Zeige einzelne Module
Route::get('/users/{user}', [UserController::class,'show'])->middleware('auth');

// Create New User
Route::post('/users', [UserController::class, 'store']);




// Log user Out
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
