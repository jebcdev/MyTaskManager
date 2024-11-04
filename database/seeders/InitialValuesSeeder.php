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
                'description' => 'Tarea recien creada'
            ]);

            Status::create([
                'name' => 'En Progreso',
                'description' => 'Tarea en la cual ya se esta trabajando'
            ]);

            Status::create([
                'name' => 'Finalizada',
                'description' => 'Esta tarea ya acabó'
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
                'description' => 'Tareas de tipo personal'
            ]);

            Category::create([
                'name' => 'Académicas',
                'description' => 'Tareas de tipo Tareas de tipo académico'
            ]);

            Category::create([
                'name' => 'Laboral',
                'description' => 'Tareas de tipo laboral'
            ]);

            Category::create([
                'name' => 'Hogar',
                'description' => 'Tareas del hogar (Gatos, Compras,etc)'
            ]);



            Category::create([
                'name' => 'Médicas',
                'description' => 'Tareas de lo relacionado con la salud'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function TaskSeeder(): void
    {
        try {
            for ($i = 1; $i <= 10; $i++) {
                Task::create([
                    'user_id' => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'status_id' => Status::inRandomOrder()->first()->id,
                    'name' => 'Tarea ' . $i,
                    'description' => 'Descripción de la tarea ' . $i
                ]);
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
