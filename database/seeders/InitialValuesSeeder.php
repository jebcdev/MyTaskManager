<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Note;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialValuesSeeder extends Seeder
{
    public function StatusSeeder(): void
{
    try {
        Status::create([
            'name' => 'Iniciada',
            'description' => 'Tarea recién creada',
            'color' => 'bg-info'
        ]);

        Status::create([
            'name' => 'En Progreso',
            'description' => 'Tarea en la cual ya se está trabajando',
            'color' => 'bg-primary'
        ]);

        Status::create([
            'name' => 'Finalizada',
            'description' => 'Esta tarea ya acabó',
            'color' => 'bg-success'
        ]);
    } catch (\Throwable $th) {
        throw $th;
    }
}

public function CategorySeeder(): void
{
    try {
        Category::create([
            'name' => 'Personal',
            'description' => 'Tareas de tipo personal',
            'color' => 'bg-secondary'
        ]);

        Category::create([
            'name' => 'Académicas',
            'description' => 'Tareas de tipo académico',
            'color' => 'bg-info'
        ]);

        Category::create([
            'name' => 'Laboral',
            'description' => 'Tareas de tipo laboral',
            'color' => 'bg-primary'
        ]);

        Category::create([
            'name' => 'Hogar',
            'description' => 'Tareas del hogar (Gatos, Compras, etc)',
            'color' => 'bg-warning'
        ]);

        Category::create([
            'name' => 'Médicas',
            'description' => 'Tareas relacionadas con la salud',
            'color' => 'bg-danger'
        ]);
    } catch (\Throwable $th) {
        throw $th;
    }
}


    public function TaskSeeder(): void
    {
        try {

            foreach (User::all() as $user) {
                for ($i = 1; $i <= 10; $i++) {
                    Task::create([
                        'user_id' => $user->id,
                        'category_id' => Category::inRandomOrder()->first()->id,
                        'status_id' => Status::inRandomOrder()->first()->id,
                        'name' => 'Tarea 00' . $i . ' de ' . $user->name,
                        'description' => 'Descripción de la tarea ' . $i
                    ]);
                }
            }
        
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function NoteSeeder(): void
    {
        try {
            foreach (Task::all() as $task) {
                for ($i = 1; $i <= 10; $i++) {

                    Note::create([
                        'task_id' => $task->id,
                        'content' => 'Nota ' . $i . ' de la tarea ' . $task->name
                    ]);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function run(): void
    {
        try {
            $this->StatusSeeder();
            $this->CategorySeeder();
            $this->TaskSeeder();
            $this->NoteSeeder();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
