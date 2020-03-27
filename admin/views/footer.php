</div><!-- Main Wrapper -->
                
</div><!-- Page Inner -->
    <div class="page-footer" style="background-color:#eee;">
        <p class="no-s">Made with <i class="fa fa-heart"></i> by Smart Store</p>
    </div>
    </main><!-- Page Content -->
	

        <!-- Javascripts -->
        <script src="<?php echo(BASE_URL); ?>assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/waves/waves.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/js/meteor.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/js/pages/dashboard.js"></script>

        <!-- data tables -->
        <script src="<?php echo(BASE_URL); ?>assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="<?php echo(BASE_URL); ?>assets/js/pages/table-data.js"></script>

        <!-- toastr js -->
        <script src="<?php echo(BASE_FOLDER); ?>assets/js/toastr.min.js"></script>

        
        <script>
            $(document).ready(function(e) {
                toastr.options.escapeHtml = true;
                toastr.options.closeButton = true;
                toastr.options.preventDuplicates = true;
                toastr.options.progressBar = true;
                <?php
                    if(isset($_SESSION['error'])) {
                        echo("toastr.error('".$_SESSION['error']."');");
                        unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])) {
                        echo("toastr.success('".$_SESSION['success']."');");
                        unset($_SESSION['success']);
                    }
                    if(isset($_SESSION['info'])) {
                        echo("toastr.info('".$_SESSION['info']."');");
                        unset($_SESSION['info']);
                    }
                ?>
            });
        </script>
        
    </body>
</html>