
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title;?> </h3>
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
                                <label>Jam </label>
                                <!-- <input type="text" name="jam" value="<?= (isset($row)) ? $row->jam : $input = (isset($flash)) ? $flash->input->jam : NULL; ?>" class="form-control"> -->
                                 <?php 
                                    $opt = [
                                        'class' => 'form-control',
                                    ];
                                    
                                        for ($i = 0; $i <=24 ; $i++) {
                                            $optJam[] = $i;
                                        }
                                    
                                    echo form_dropdown('jam', $optJam,(isset($row)) ? $row->jam : $input = (isset($flash)) ? $flash->input->jam : NULL,$opt); 
                                ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Menit </label>
                                <!-- <input type="text" name="menit" value="<?= (isset($row)) ? $row->menit : $input = (isset($flash)) ? $flash->input->menit : NULL; ?>" class="form-control"> -->
                                <?php 
                                    $opt = [
                                        'class' => 'form-control',
                                    ];
                                    
                                        for ($i = 0; $i <=60 ; $i++) {
                                            $optMenit[] = $i;
                                        }
                                    
                                    echo form_dropdown('menit', $optMenit,(isset($row)) ? $row->menit : $input = (isset($flash)) ? $flash->input->menit : NULL,$opt); 
                                ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Detik </label>
                                <!-- <input type="text" name="detik" value="<?= (isset($row)) ? $row->detik : $input = (isset($flash)) ? $flash->input->detik : NULL; ?>" class="form-control"> -->
                                <?php 
                                    $opt = [
                                        'class' => 'form-control',
                                    ];
                                    
                                        for ($i = 0; $i <= 60 ; $i++) {
                                            $optDetik[] = $i;
                                        }
                                    
                                    echo form_dropdown('detik', $optDetik,(isset($row)) ? $row->detik : $input = (isset($flash)) ? $flash->input->detik : NULL,$opt); 
                                ?>
                            </div>
                            <!-- <div class="form-group col-md-3">
                                <label>Interval <span class="required">*</span></label>
                                <input type="text" name="interval" value="<?= (isset($row)) ? gmdate("H:i:s", $row->interval) : $input = (isset($flash)) ? $flash->input->interval : NULL; ?>" id="interval-relay" placeholder="Ex: 12:30:15" class="form-control"> 
                            
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
                            <!-- <li>
                                <?php// $set_profil_status = ($this->uri->segment(6)=='1')?"0":"1"; ?>
                                <a class="btn btn-default" href="<?php //echo site_url('profil/setStatus/'.$this->uri->segment(4).'/'.$this->uri->segment(6).'/'.$set_profil_status); ?>"><?= ($this->uri->segment(6)=='1') ? "Status Aktif" : "Status Tidak Aktif"; ?></a>
                            </li> -->
                            <!-- <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li> -->
                            <a class="btn btn-default" href="<?php echo site_url('profil'); ?>" title="">Kembali</a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th>Waktu Awal</th> -->
                                    <!-- <th>Waktu Akhir</th> -->
                                    <th>Interval</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($rows->result() as $value): $no++?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <!-- <td><?= $value->awal; ?></td> -->
                                    <!-- <td><?= $value->akhir; ?></td> -->
                                    <td><?= gmdate('H:i:s',$value->interval); ?></td>
                                    <td>
                                    	<?php echo $status = ($value->status=='1') ? 'Nyala' : 'Mati'; ?>
                                    </td>
                                    <td><?php if($value->status_waktu=='1'){ 
                                        echo $status." Selama ".$value->counter." Detik";
                                    } ?></td> 
                                    <td>
                                      <!-- <a href="<?= site_url($this->uri->segment(1).'/kelola/'.$value->id);?>">Kelola </a> |	 -->
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

 <script type="text/javascript">
    $(function () {
        $('#interval').datetimepicker();
    });
</script>