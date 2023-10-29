<?php $this->load->view('back/meta') ?>
<div class="wrapper">
  <?php $this->load->view('back/navbar') ?>
  <?php $this->load->view('back/sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Laporan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo $module ?></a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6">
          <div class="box box-primary">
            <!-- form start -->

            <?php echo form_open('admin/reports/generateReport', ['method' => 'get']) ?>
            <div class="box-body">
              <div class="panel-body">
                <h4 class="box-title"><b>Periode:</b></h4>
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <div class="form-group">
                  <input type="text" class="form-control date-picker" name="start_date" id="start_date" placeholder="Isi tanggal mulai" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control date-picker" name="end_date" id="end_date" placeholder="Isi tanggal akhir" required>
                </div>
                <h4 class="box-title"><b>Jenis Laporan:</b></h4>
                <div class="form-group">
                  <select name="report_type" class="form-control">
                    <option value="monthly_sales_recap">Laporan Rekapitulasi Bulanan</option>
                    <option value="sales_by_customers">Laporan Rekapitulasi TIM</option>
                    <option value="sales_detail">Laporan Rincian Transaksi Harian</option>
                  </select>
                </div>
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-success">Download</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
            <?php echo form_close() ?>
          </div><!-- /.box -->
        </div>
      </div><!-- /.row -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->
<?php $this->load->view('back/js') ?>
<link href="<?php echo base_url('assets/plugins/') ?>datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="<?php echo base_url('assets/plugins/') ?>datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(function() {
    $('.date-picker').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd'
    });
  });
</script>
</body>

</html>