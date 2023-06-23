<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_laporan/laporan') ?>" class="btn btn-info btn-flat">
                <span class="fas fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=100>
                                    <img src="<?= base_url('assets') ?>/dist/img/tanah_datar.png" width="100" alt="">
                                </td>
                                <td>
                                    <center>
                                        <h4>
                                            <p> Pemerintah Kabupaten Tanah Datar</p>
                                            <p> DINAS PENANAMAN MODAL PELAYANAN TERPADU SATU PINTU DAN TENAGA KERJA</p>
                                        </h4>
                                    </center>
                                </td>
                                <td width=100></td>
                            </tr>
                        </table>
                        <hr>
                        <center>
                            <b>
                                <p> LAPORAN DOKUMEN PELAKSANAAN ANGGARAN TAHUN <?= $tahun ?></p>
                            </b>
                        </center>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row">

                </div>

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Periode</th>
                                    <th>Tanggal</th>
                                    <th>Kode Rekening</th>
                                    <th>Uraian</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                $tot = 0;
                                foreach ($data_dpa as $d) {
                                    $no++;
                                    $tot = $tot + ($d->harga_satuan *  $d->volume);
                                ?>
                                    <tr>
                                        <td width="10" class="text-center"><?php echo $no . '.'; ?></td>
                                        <td width=20><?= date('Y', strtotime($d->tanggal)) ?></td>
                                        <td><?= date('d/M/Y', strtotime($d->tanggal)) ?></td>
                                        <td><?= $d->kode_rekening ?></td>
                                        <td><?= $d->nama_kegiatan ?></td>
                                        <td><?= $d->volume ?></td>
                                        <td><?= $d->satuan ?></td>
                                        <td><?= "Rp " . number_format($d->harga_satuan) ?></td>
                                        <td><?= "Rp " . number_format($d->harga_satuan *  $d->volume) ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="8">Total</th>
                                    <th><?= "Rp " . number_format($tot) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="col-sm">

                        </div>
                    </div>
                    <div class="col-sm float-right ">
                        <div class="col-sm">
                            <br>
                            <br>
                            <p>Batusangkar, <?= date('d F Y') ?></p>
                            <p>Kepala Sub Bagian Keuangan</p>
                            <br>
                            <br>
                            <br>
                            <p>Nama :</p>
                            <p>NIP:</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row no-print">
                <div class="col-sm-12">
                    <button onclick="printContent('div1')" class="btn btn-primary float-right"><i class="fa fa-print"></i>Cetak</button>
                </div>

            </div>

        </div>
    </div>
</div>


<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>

<?= $this->endSection() ?>