</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted"> &copy; E-voting Ketua OSIS</div>
            <!-- <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div> -->
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url('assets/js/') ?>jquery-3.4.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/js/') ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/js/') ?>myscript.js"></script>
<script src="<?= base_url('assets/js/') ?>bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/') ?>scripts.js"></script>
<script src="<?= base_url('assets/js/') ?>Chart.min.js"></script>
<script src="<?= base_url('assets/demo/') ?>chart-area-demo.js"></script>
<script src="<?= base_url('assets/demo/') ?>chart-bar-demo.js"></script>
<script src="<?= base_url('assets/js/') ?>jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/js/') ?>dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/demo/') ?>datatables-demo.js"></script>

<!-- <script type="text/javascript" src="<?= base_url('assets/DataTables') ?>datatables.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#tb_siswa').DataTable({
            dom: 'Bfrtip',
        });
    });
</script>
</body>

</html>