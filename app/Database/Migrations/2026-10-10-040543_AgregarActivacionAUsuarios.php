<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarActivacionAUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'activo' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'codigo_activacion' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'codigo_activacion');
        $this->forge->dropColumn('usuarios', 'activo');
    }
}
