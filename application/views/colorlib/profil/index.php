
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
	                        	// id => Profil
	                            'id'  => (isset($row)) ? $row->id : null, 
	                            // 'fk_user' => (isset($row)) ? $row->fk_user : null
	                        );
	                        echo form_hidden($data);
                        ?>
                            <div class="form-group col-md-3">
                                <label>Profil <span class="required">*</span></label>
                                <input type="text" name="profil" value="<?= (isset($row)) ? $row->profil : $input = (isset($flash)) ? $flash->input->profil : NULL; ?>" id="first-name" required="required" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Keterangan <span class="required">*</span></label>
                                <input type="text" name="keterangan" value="<?= (isset($row)) ? $row->keterangan : $input = (isset($flash)) ? $flash->input->keterangan : NULL; ?>" id="first-name" required="required" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Mode <span class="required">*</span></label>
                                <!-- <input type="text" name="mode" value="<?= (isset($row)) ? $row->mode : $input = (isset($flash)) ? $flash->input->mode : NULL; ?>" id="first-name" required="required" class="form-control"> -->

                                <?php 
                                    $opt = [
                                        'class' => 'form-control',
                                    ];
                                    $optMode = [
                                        '0' => 'Waktu',
                                        '1' => 'Interval',
                                    ];
                                    echo form_dropdown('mode', $optMode,(isset($row)) ? $row->mode : $input = (isset($flash)) ? $flash->input->mode : NULL,$opt); 
                                ?>
                            </div>
                            <!-- <div class="form-group col-md-3">
                                <label>Aktif <span class="required">*</span></label>
                                <input type="text" name="aktif" value="<?= (isset($row)) ? $row->aktif : $input = (isset($flash)) ? $flash->input->aktif : NULL; ?>" id="first-name" required="required" class="form-control" <?= (isset($row)) ? null: 'disabled'; ?>>
                            </div> -->
                            <div class="form-group col-md-12">
                                <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                                    <a href="<?= site_url($this->uri->segment(1));?>" type="submit" class="btn btn-primary">Cancel</a>
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
                            <a class="btn btn-sm btn-danger" href="<?= site_url($this->uri->segment(1).'/setNAktif'); ?>">Matikan Semua</a>
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
                                    <th>Profil</th>
                                    <th>Keterangan</th>
                                    <th>Mode</th>
                                    <th>Profil Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($rows->result() as $value): $no++?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $value->profil; ?></td>
                                    <td><?= $value->keterangan; ?></td>
                                    <td>
                                        <?= ($value->mode=='1') ? "Interval" : "Waktu"; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-default" href="<?= site_url($this->uri->segment(1).'/setAktif/'.$value->id.'/'.$value->aktif); ?>">
                                            <?= ($value->aktif=='1') ? "Aktif" : "Tidak Aktif"; ?>
                                        </a>
                                    </td>
                                    <td>
                                      <a href="<?= site_url('waktu/kelola/0/'.$value->id.'/'.$value->mode.'/'.$value->aktif);?>">Kelola </a> |	
                                      <a href="<?= site_url($this->uri->segment(1).'/edit/'.$value->id);?>">Edit </a> |
                                      <a href="<?= site_url($this->uri->segment(1).'/delete/'.$value->id);?>">Delete </a>
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