<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarAdministracionAUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'administrador' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
                'null'       => false,
            ],
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
        $this->forge->dropColumn('usuarios', 'updated_at');
        $this->forge->dropColumn('usuarios', 'created_at');
        $this->forge->dropColumn('usuarios', 'administrador');
    }
}
