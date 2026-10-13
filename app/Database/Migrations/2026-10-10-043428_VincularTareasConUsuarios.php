<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VincularTareasConUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tareas', [
            'usuario_id' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,
            ],
        ]);

        // Conserva las tareas actuales y las asigna a la cuenta principal.
        $this->db->table('tareas')
            ->where('usuario_id', null)
            ->update(['usuario_id' => 1]);
    }

    public function down()
    {
        $this->forge->dropColumn('tareas', 'usuario_id');
    }
}