<?php

use App\Models\User;
use App\Models\ChatBox;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserCollection;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatBoxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordpressController;
use App\Http\Controllers\Admin\CreativeController;
use App\Http\Controllers\Admin\CareerJobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'job'])->name('job');
Route::get('/job/{job}', [HomeController::class, 'details'])->name('job.details');

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/users', function () {
    return UserResource::collection(User::all());
});

Route::get('/users', function () {
    return new UserCollection(User::all());
});

Route::get('/dashboard', function () {
    $chatboxes = ChatBox::whereUserId(auth()->id())->paginate(10);

    return view('dashboard', [
        'chatboxes' => $chatboxes,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/chatbox/{chatbox}', [ChatBoxController::class, 'destroy'])->name('chatbox.destroy');
    Route::get('/chatbox/{chatbox?}', [ChatBoxController::class, 'index'])->name('chatbox');
    Route::get('/wordpress', [WordpressController::class, 'index'])->name('wordpress');

    Route::resource('admin/career-jobs', CareerJobController::class)->names([
        'index' => 'admin.job.index',
        'create' => 'admin.job.create',
        'store' => 'admin.job.store',
        'show' => 'admin.job.show',
        'edit' => 'admin.job.edit',
        'update' => 'admin.job.update',
        'destroy' => 'admin.job.destroy',
    ]);

    Route::get('admin/creative', [CreativeController::class, 'index'])->name("admin.creative");
    Route::post('admin/creative', [CreativeController::class, 'store'])->name("admin.creative.store");
    // Route::get('admin/creative', [CreativeController::class, 'index'])->name("admin.creative");
    // Route::get('admin/creative', [CreativeController::class, 'index'])->name("admin.creative");


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
