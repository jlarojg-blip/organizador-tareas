<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarFechasATareas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tareas', [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tareas', ['created_at', 'updated_at']);
    }
}