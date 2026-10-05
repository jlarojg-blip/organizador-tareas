<h1>Detalle de tarea</h1>

<p><strong>ID:</strong> <?= esc($tarea['id']) ?></p>
<p><strong>Título:</strong> <?= esc($tarea['titulo']) ?></p>
<p><strong>Descripción:</strong> <?= esc($tarea['descripcion']) ?></p>
<p><strong>Fecha de entrega:</strong> <?= esc($tarea['fecha_entrega']) ?></p>
<p><strong>Estado:</strong> <?= esc($tarea['estado']) ?></p>

<a href="<?= site_url('tareas') ?>">Volver a mis tareas</a>