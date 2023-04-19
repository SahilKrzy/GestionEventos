<?php

namespace Database\Seeders;

use App\Event;
use App\Models\User as ModelsUser;
use App\Models\UserEventsAttendee as ModelsUserEventsAttendee;
use App\UserEventsAttendee;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class EventSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario de prueba
        $user = ModelsUser::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('secret'),
        ]);

        // Crear un evento de prueba
        $event = $user->events()->create([
            'title' => 'Evento de prueba',
            'description' => 'Este es un evento de prueba',
            'date' => '2023-05-01',
        ]);

        // Registrar un asistente en el evento de prueba
        $attendee = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('secret'),
        ]);
        ModelsUserEventsAttendee::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'attendee_id' => $attendee->id,
        ]);
    }
}
