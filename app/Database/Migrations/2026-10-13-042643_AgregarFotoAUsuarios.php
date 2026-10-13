<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarFotoAUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'foto');
    }
}
