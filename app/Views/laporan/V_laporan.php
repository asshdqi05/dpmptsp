<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="card">
        <div class="card-header bg-info">
            <h3 class="card-title">Laporan</h3>
        </div>
        <div class="card-body">
            <div class="row no-gutters">

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_npd') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid">
                                        <div class="card-header bg-info">
                                            <div class="card-title">Laporan Nota Pencairan Anggaran</div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <select class="chosen-select form-control" name="tahun" required>
                                                    <option disabled selected>Pilih Periode</option>
                                                    <?php
                                                    $now = date('Y');
                                                    for ($a = 2016; $a <= $now; $a++) {
                                                        echo "<option value='$a'>$a</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_spj') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid ">
                                        <div class="card-header bg-info">
                                            <div class="card-title">Laporan Surat Pertanggung Jawaban</div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <select class="chosen-select form-control" name="tahun" required>
                                                    <option disabled selected>Pilih Periode</option>
                                                    <?php
                                                    $now = date('Y');
                                                    for ($a = 2016; $a <= $now; $a++) {
                                                        echo "<option value='$a'>$a</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="col-md-3">
                    <form method="POST" action="<?php echo site_url('C_laporan/laporan_dpa') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid">
                                        <div class="card-header bg-info">
                                            <div class="card-title">Laporan Dokument Pelaksana Anggaran</div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <select class="chosen-select form-control" name="tahun" required>
                                                    <option disabled selected>Pilih Periode</option>
                                                    <?php
                                                    $now = date('Y');
                                                    for ($a = 2016; $a <= $now; $a++) {
                                                        echo "<option value='$a'>$a</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>