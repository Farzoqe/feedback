<?php

use Farzoqe\Feedback\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::resources(['feedback' => FeedbackController::class,]);
});
