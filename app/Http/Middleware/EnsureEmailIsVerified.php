<?php

    Route::get('profile', function () {
        // Only verified users may enter...
    })->middleware('verified');

