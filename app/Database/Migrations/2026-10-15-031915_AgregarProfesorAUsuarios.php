<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarProfesorAUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'profesor' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
                'null'       => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'profesor');
    }
}