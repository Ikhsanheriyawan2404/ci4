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
    <a href="<?= base_url('category') ?>" class="btn btn-primary btn-sm"><span><i class="fa fa-arrow-left"></i></span> Kembali </a>
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
					<!-- <a class="close-link">
						<i class="fa fa-times"></i>
					</a> -->
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
                <form action="<?= base_url('category') ?>" method="post" class="form-horizontal" role="form">
                <?= csrf_field() ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Kategori</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="First name" data-toggle="tooltip" data-placement="bottom" title="Tooltip for name" name="category_name" autofocus>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <!-- <div class="col-sm-offset-2 col-sm-2">
                            <button type="cancel" class="btn btn-default btn-label-left">
                                <span><i class="fa fa-clock-o txt-danger"></i></span>
                                Cancel
                            </button>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-warning btn-label-left">
                                <span><i class="fa fa-clock-o"></i></span>
                                Send later
                            </button>
                        </div> -->
                        <div class="col-sm-offset-10 col-sm-2">
                            <button type="submit" class="btn btn-primary btn-label-left">
                                <span><i class="fa fa-clock-o"></i></span>
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>