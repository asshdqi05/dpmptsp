<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_npd/npd') ?>" class="btn btn-info btn-flat">
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
                                <td width=200>
                                    <img src="<?= base_url('assets') ?>/dist/img/tanah_datar.png" width="100" alt="">
                                </td>
                                <td>
                                    <center>
                                        <p> Pemerintah Kabupaten Tanah Datar</p>
                                        <p> DINAS PENANAMAN MODAL PELAYANAN TERPADU SATU PINTU DAN TENAGA KERJA</p>
                                        <p> NOTA PENCAIRAN DANA</p>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <p>Nama Penerima </p>
                            <p>Tanggal </p>
                            <p>No Rekening Tujuan</p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-sm">
                            <strong>
                                <p><?= $data_npd->nama_pegawai ?></p>
                                <p><?= date('d F Y', strtotime($data_npd->tanggal)) ?></p>
                                <p><?= $data_npd->norek_tujuan ?></p>
                            </strong>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Rekening</th>
                                    <th>Uraian</th>
                                    <th>Jumlah Yang Diterima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $data_npd->kode_rekening ?></td>
                                    <td><?= $data_npd->nama_kegiatan ?></td>
                                    <td><?= "Rp " . number_format($data_npd->nominal) ?></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="col-sm">
                            <br>
                            <br>
                            <p>Menyetujui, </p>
                            <p>Kepala Dinas DPMPTSP dan Naker </p>
                            <br>
                            <br>
                            <br>
                            <p>Nama :</p>
                            <p>NIP:</p>
                        </div>
                    </div>
                    <div class="col-sm float-right ">
                        <div class="col-sm">
                            <br>
                            <br>
                            <p>Batusangkar, <?= date('d M Y') ?></p>
                            <p>Bendahara</p>
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