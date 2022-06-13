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

<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="box">
				<div class="box-content">
					<form action="<?= base_url('login/proccess') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="text-center">
                            <h3 class="page-header">DevOOPS Login Page</h3>
                        </div>
                        <?php if (session()->getFlashdata('error')) : ?>                            
                            <?= session()->getFlashdata('error') ?>
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>


<?= $this->endSection('content') ?>