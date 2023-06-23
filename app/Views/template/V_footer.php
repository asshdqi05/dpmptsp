</div>
</section>
</div>
<!-- /.content-wrapper -->

<footer class="main-footer fixed navbar-cyan">
    <div class="float-right d-none d-sm-block">

    </div>
    <strong style="color: black">Copyright &copy; <?= date('Y') ?> <b style="color: black"></b>Dinas Penaman Modal Pelayanan Terpadu Satu Pintu.</strong> <small style="color: black"> All rights
        reserved.</small>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-cyan">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/') ?>/dist/js/demo.js"></script>

<script src="<?php echo base_url('assets/') ?>/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?php echo base_url('assets/') ?>/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="<?php echo base_url('assets/') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/') ?>/plugins/select2/js/select2.full.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Toastr -->
<script src="<?php echo base_url('assets/') ?>/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
        });

        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    $('#datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    })
</script>
</body>