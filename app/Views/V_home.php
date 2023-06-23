<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h1 class="card-title">
                <h1>Selamat Datang </h1>
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="alert alert-info alert-dismissible">
                <center>
                    <img src="<?= base_url('assets') ?>/dist/img/tanah_datar.png" width="100" alt="">
                    <h1>Dinas Penaman Modal Pelayanan Terpadu Satu Pintu</h1>
                    <h3>Kabupaten Tanah Datar </h3>
                </center>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?= $this->endSection() ?>