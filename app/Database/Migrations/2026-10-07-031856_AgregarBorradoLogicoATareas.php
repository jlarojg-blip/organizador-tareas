<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarBorradoLogicoATareas extends Migration
{
    public function up()
    {
      $this->forge->addColumn('tareas', [
    'deleted_at' => [
        'type' => 'DATETIME',
        'null' => true,
    ],
]);
    }

    public function down()
    {
      $this->forge->dropColumn('tareas', 'deleted_at');
    }
}
