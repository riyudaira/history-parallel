<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HistoryController;

Route::prefix('history')->group(function () {
    // /history/period/{period} になるように修正
    Route::get('/period/{period}', [HistoryController::class, 'getEventsByPeriod']);

    // /history/region/{region_id}
    Route::get('/region/{region_id}', [HistoryController::class, 'getEventsByRegion']);

    // /history/regions
    Route::get('/regions', [HistoryController::class, 'getRegions']);
});
