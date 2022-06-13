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

<?= $this->endSection('content') ?>

<?= $this->section('custom-scripts') ?>

<?= $this->endSection() ?>