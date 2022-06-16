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
<button class="btn btn-default" data-toggle="modal" data-target="#tesModal">
  Buka Modal
</button>

<!-- Modal -->
<div class="modal fade" id="tesModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <!-- header-->
      <div class="modal-header">
        <button class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Judul Modal</h4>
      </div>
      <!--body-->
      <div class="modal-body">
        Konten yang ingin ditampilkan disini
      </div>
      <!--footer-->
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content') ?>

<?= $this->section('custom-scripts') ?>

<?= $this->endSection() ?>