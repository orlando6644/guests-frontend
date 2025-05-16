<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Guest List</h2>

<a href="/guests/create" class="btn btn-primary">Add New Guest</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($guests as $guest): ?>
        <tr>
            <td><?= esc($guest['name']) ?></td>
            <td><?= esc($guest['email']) ?></td>
            <td><?= esc($guest['phone']) ?></td>
            <td>
                <a href="/guests/edit/<?= $guest['id'] ?>" class="btn btn-small btn-info">Edit</a>
                <a href="/guests/delete/<?= $guest['id'] ?>" class="btn btn-small btn-danger"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
