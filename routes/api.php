<?php

use App\Http\Controllers\Frontend\HeroSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/api/hero-sections', [HeroSectionController::class, 'getActiveSections']);