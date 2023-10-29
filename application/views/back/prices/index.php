<?php $this->load->view('back/meta') ?>
<div class="wrapper">
    <?php $this->load->view('back/navbar') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?php echo $title ?></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><?php echo $module ?></a></li>
                <li class="active"><?php echo $title ?></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <hr>
                            <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : '' ?>
                            <?= form_open("admin/prices/save?") ?>
                            <div class="table-responsive no-padding">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; width:5%;">Jam</th>
                                            <th style="text-align: left;width:15%;">Tarif Sewa (Rp.)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($prices as $item) : ?>
                                            <tr>
                                                <td><?= str_pad($item->hour, 2, '0', STR_PAD_LEFT); ?>:00</td>
                                                <td><input type="number" min="0" max="9999999" step="5000" name="prices[<?= $item->hour ?>]" value="<?= $item->price ?>"></td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->
<?php $this->load->view('back/js') ?>
</body>

</html>