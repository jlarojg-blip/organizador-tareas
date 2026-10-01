<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaTareas extends Migration
{
    public function up()
    {
         $this->forge->addField([
    'id' => [
        'type'           => 'INT',
        'unsigned'       => true,
        'auto_increment' => true,
    ],
    'titulo' => [
        'type'       => 'VARCHAR',
        'constraint' => 100,
    ],
    'descripcion' => [
        'type' => 'TEXT',
        'null' => true,
    ],
    'fecha_entrega' => [
        'type' => 'DATE',
        'null' => true,
    ],
    'estado' => [
        'type'       => 'VARCHAR',
        'constraint' => 20,
        'default'    => 'Pendiente',
    ],
]);

$this->forge->addKey('id', true);
$this->forge->createTable('tareas');
    }

    public function down()
    {
        $this->forge->dropTable('tareas');

    }
}
