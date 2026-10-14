<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarRecordarmeAUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'recordar_token' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'       => true,
            ],
            'recordar_expira' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'recordar_token');
        $this->forge->dropColumn('usuarios', 'recordar_expira');
    }
}