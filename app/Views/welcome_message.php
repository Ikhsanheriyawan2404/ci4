<?= $this->extend('layouts/default', compact('title')) ?>

<?= $this->section('content') ?>


<?= $this->endSection('content') ?>

<?= $this->section('custom-scripts') ?>
<script>

$(document).ready(function() {
    function open() {
      $('#exampleModal').modal('show');
    }
});
</script>
<?= $this->endSection() ?>