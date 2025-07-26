<?php


use App\Http\Controllers\Admin\ContactsController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('contacts', ContactsController::class);
});
