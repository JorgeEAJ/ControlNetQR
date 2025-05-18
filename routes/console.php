<?php

use Illuminate\Support\Facades\Schedule;

    // Registrar faltas a las 6:00 AM todos los días
    Schedule::command('faltas:registrar')->weekdays()->dailyAt('06:00');

    // Revisar faltas a las 6:10 AM todos los días
    Schedule::command('faltas:revisar')->weekdays()->dailyAt('06:10');
