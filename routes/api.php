<?php
use App\Http\Controllers\SignosApiController;

Route::get('/{language}/{sign}/{time}', [SignosApiController::class, 'getSignPrediction']);
