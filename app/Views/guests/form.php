<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2><?= esc($title) ?></h2>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="<?= $action ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?= old('name', $guest['name']) ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email', $guest['email']) ?>" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" value="<?= old('phone', $guest['phone']) ?>">
    </div>
    <br>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= site_url('guests') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
