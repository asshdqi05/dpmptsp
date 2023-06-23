<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>List NPD</h3>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Periode</th>
                        <th>Tanggal</th>
                        <th>Nama Penerima</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data_npd as $d) {
                            if ($d->status == 1) {
                                $status = "Menunggu Persetujuan";
                            } else if ($d->status == 2) {
                                $status = "Telah Disetujui Kasubag";
                            } else if ($d->status == 3) {
                                $status = "Ditolak";
                            } else if ($d->status == 4) {
                                $status = "Telah Dicairkan Bendahara";
                            }
                        ?>
                            <tr>
                                <td width="10" class="text-center"><?php echo $no . '.'; ?></td>
                                <td width=20><?= date('Y', strtotime($d->tanggal)) ?></td>
                                <td><?= date('d/M/Y', strtotime($d->tanggal)) ?></td>
                                <td><?= $d->nama_pegawai ?></td>
                                <td><?= "Rp " . number_format($d->nominal) ?></td>
                                <td><?= $status ?></td>
                                <td width=80 class="text-center">
                                    <a class="btn btn-xs btn-warning" href="<?= site_url('C_kasubag/detail_npd/' . $d->id_npd) ?>">
                                        <i class="fas fa-eye"></i>
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
            <form method="POST" action="<?php echo site_url('C_npd/delete_npd') ?>">
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