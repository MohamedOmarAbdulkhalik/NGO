
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    // إضافة مسارات admin أخرى هنا...
    Route::get('/content', [ContentController::class, 'index'])->name('admin.content');
    Route::get('/content/create', [ContentController::class, 'create'])->name('admin.content.create');
    Route::get('/content/{id}/edit', [ContentController::class, 'edit'])->name('admin.content.edit');
});
