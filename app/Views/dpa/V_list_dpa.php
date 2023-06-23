<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-flat" href="<?= site_url('C_dpa/add_dpa') ?>">
                    <span class="fa fa-plus"></span>
                    Tambah Data
                </a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Periode</th>
                        <th>Tanggal</th>
                        <th>Kode Rekening</th>
                        <th>Uraian</th>
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data_dpa as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= date('Y', strtotime($d->tgl_dpa)) ?></td>
                                <td><?= date('d/M/Y', strtotime($d->tgl_dpa)) ?></td>
                                <td><?= $d->kode_rekening ?></td>
                                <td><?= $d->nama_kegiatan ?></td>
                                <td><?= $d->volume ?></td>
                                <td><?= $d->satuan ?></td>
                                <td><?= "Rp " . number_format($d->harga_satuan) ?></td>
                                <td><?= "Rp " . number_format($d->harga_satuan * $d->volume) ?></td>
                                <td width=80 class="text-center">
                                    <a class="btn btn-xs btn-success" href="<?= site_url('C_dpa/edit_dpa/' . $d->id_dpa) ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_dpa ?>')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function hapus(id) {
        $('#hid').val(id);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_dpa/delete_dpa') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-close"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>