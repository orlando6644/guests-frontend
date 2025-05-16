<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Guest App' ?> - Guest App</title>
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
</head>
<body class="container">

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?= $this->renderSection('content') ?>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>