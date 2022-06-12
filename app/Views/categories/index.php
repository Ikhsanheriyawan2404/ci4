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

<div class="page-header">
    <a href="<?= base_url('category/new') ?>" class="btn btn-primary btn-sm"><span><i class="fa fa-users"></i></span> Tambah </a>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-usd"></i>
					<span>Data Kategori</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
                
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>ACtion</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php foreach($categories as $key => $category) : ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $category->name ?></td>
							<td width="10%">
								<a href="<?= base_url('category/' . $category->category_id . '/edit')  ?>" class="btn">Edit</a>
									<form action="<?= base_url('category/' . $category->category_id) ?>" method="post" class="d-inline">
									<?= csrf_field() ?>
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" onclick="return confirm('Hapus?')">Hapus</button>
								</form>
							</td>
						</tr>
					<?php endforeach ?>
					<!-- End: list_row -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection('content') ?>

<?= $this->section('custom-scripts') ?>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>

<?= $this->endSection() ?>