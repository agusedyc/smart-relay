
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title;?></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $form;?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">                    
                        <br />
                        <?php $atrib = array('id' => 'dtProfil', 'class' => 'form-vertical form-label-left'); ?>
                        <?= form_open_multipart($this->uri->segment(1).'/'.$act = (isset($row)) ? 'update' : 'add',$atrib); ?>
                        <?php 
                            $data = array(
                                'url' => site_url(['waktu','kelola','0',$this->uri->segment(4),$this->uri->segment(5),$this->uri->segment(6)]),
                                'id'  => (isset($row)) ? $row->id : null, 
                                'profil_id' => $this->uri->segment(4),
                                'mode' => $this->uri->segment(5),
                            );
                            echo form_hidden($data);
                        ?>
                            <div class="form-group col-md-3">
                                <label>Waktu Awal <span class="required">*</span></label>
                                <input type="text" name="awal" value="<?= (isset($row)) ? $row->awal : $input = (isset($flash)) ? $flash->input->awal : NULL; ?>" id="tanggal-awal" placeholder="Format : <?php echo date('Y-m-d H:i:s') ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Waktu Akhir <span class="required">*</span></label>
                                <input type="text" name="akhir" value="<?= (isset($row)) ? $row->akhir : $input = (isset($flash)) ? $flash->input->akhir : NULL; ?>" id="tanggal-akhir" placeholder="Format : <?php echo date('Y-m-d H:i:s') ?>" class="form-control">
                            </div>
                            <!-- <div class="form-group col-md-3">
                                <label>Interval <span class="required">*</span></label>
                                <input type="text" name="interval" value="<?= (isset($row)) ? $row->interval : $input = (isset($flash)) ? $flash->input->interval : NULL; ?>" id="first-name" required="required" class="form-control">
                            </div> -->
                            <div class="form-group col-md-3">
                                <label>Status <span class="required">*</span></label>
                                <!-- <input type="text" name="status" value="<?= (isset($row)) ? $row->status : $input = (isset($flash)) ? $flash->input->status : NULL; ?>" id="first-name" required="required" class="form-control" > -->
                                <?php 
                                    $opt = [
                                        'class' => 'form-control',
                                    ];
                                    $optStatus = [
                                        '0' => 'Mati',
                                        '1' => 'Nyala',
                                    ];
                                    echo form_dropdown('status', $optStatus,(isset($row)) ? $row->status : $input = (isset($flash)) ? $flash->input->status : NULL,$opt); 
                                ?>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                                    <a href="<?= site_url($this->uri->segment(1).'/'.$this->uri->segment(4));?>" type="submit" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                <div class="col-md-6">
                                    <!-- Flash Data -->
                                    <?php if (!empty($flash)): ?>
                                    <div class="alert alert-<?php echo $flash->type; ?> alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Alert!</strong> <?php echo $flash->notif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?= form_close(); ?>
                    </div>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $table;?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                             <!-- <li>
                                <?php //$set_profil_status = ($this->uri->segment(6)=='1')?"0":"1"; ?>
                                <a class="btn btn-default" href="<?php// echo site_url('profil/setStatus/'.$this->uri->segment(4).'/'.$this->uri->segment(6).'/'.$set_profil_status); ?>"><?= ($this->uri->segment(6)=='1') ? "Status Aktif" : "Status Tidak Aktif"; ?></a>
                            </li> -->
                            <a class="btn btn-default" href="<?php echo site_url('profil'); ?>" title="">Kembali</a>
                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> -->
                                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Waktu Awal</th>
                                    <th>Waktu Akhir</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($rows->result() as $value): $no++?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $value->awal; ?></td>
                                    <td><?= $value->akhir; ?></td>
                                    <!-- <td><?= date('d-m-Y H:i:s',strtotime($value->awal)); ?></td> -->
                                    <!-- <td><?= date('d-m-Y H:i:s',strtotime($value->akhir)); ?></td> -->
                                    <!-- <td><?= $value->interval; ?></td> -->
                                    <td>
                                        <?php echo $status = ($value->status=='1') ? 'Nyala' : 'Mati'; ?>
                                    </td>
                                     <td><?php if($value->status_waktu=='1'){ 
                                        echo $status." Sampai Tanggal ".date('d-M-Y',strtotime($value->akhir))." Pukul ".date('H:i:s',strtotime($value->akhir));
                                    } ?></td>
                                   <td>
                                      <a href="<?= site_url($this->uri->segment(1).'/edit/'.$value->id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));?>">Edit </a> |
                                      <a href="<?= site_url($this->uri->segment(1).'/delete/'.$value->id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));?>">Delete </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="ln_solid col-md-12"></div>
                    <div class="row">
                      <div class="col-md-12" align="center">
                        <?php //echo $pagination; ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- /page content  -->