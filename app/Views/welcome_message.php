<?= $this->extend('layouts/default', compact('title')) ?>

<?= $this->section('content') ?>

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Tables</a></li>
			<li><a href="#">Data Tables</a></li>
		</ol>
	</div>
</div>

<!-- tombol pemicu -->
<button class="btn btn-default" onclick="open()">
  Buka Modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal titleh</5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-users">
                    <div class="form-group">
                        <label for="name">Nama Item</label>
                        <input type="hidden" name="item_id" id="item_id">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <input type="text" class="form-control" id="category_id" name="category_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Closebutton>
                <button type="button" class="btn btn-primary" onclick="proses()">Save changesbutton>
            </div>
        </div>
    </div>
</div>
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