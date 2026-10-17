<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarBorradoLogicoAUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'deleted_at');
    }
}
