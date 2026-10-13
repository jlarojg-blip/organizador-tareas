<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarRecuperacionClaveAUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'codigo_recuperacion' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'       => true,
            ],
            'token_expira' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', [
            'codigo_recuperacion',
            'token_expira',
        ]);
    }
}
