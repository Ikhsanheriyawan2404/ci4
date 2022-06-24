<?= $this->extend('layouts/default', compact('title')) ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0"><?= $title ?? '' ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a href="<?= site_url('category/new') ?>" class="btn btn-sm btn-primary">Tambah <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Kategori</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
        <div class="card-text viewdata"></div>

            <table id="datatables" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Name</th>
                        <th class="text-center" style="width: 10%"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?= $this->endSection() ?>

<?= $this->section('custom-styles') ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<?= $this->endSection() ?>

<?= $this->section('custom-scripts') ?>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

$(document).ready(function() {
	$('#datatables').DataTable({
		"aoColumnDefs": [{ 
			"bSortable": true,
			"aTargets": [ 0,1,2 ] 
		}],
		"order":[],
		"serverSide":true,
		"searching": true,
		"lengthChange":true,
		"ajax":{
			url:"<?=base_url('category/datatables')?>",
			type:'GET'
		}
	});
});
</script>

<?= $this->endSection() ?>