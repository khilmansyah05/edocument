<form action="<?php echo site_url('User/source_user_list'); ?>" id='display-table'>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Filter</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-too" data-widget="collapse"><i class="icon expand-icon wb-plus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <div class='col-md-6'>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input class="form-control" id="nama" placeholder="Nama" type="text" name='full_name' />
                        </div>
                        <div class="form-group">
                          <label for="nama">Username</label>
                          <input class="form-control" id="nama" placeholder="Username" type="text" name='username' />
                        </div>

                    </div>
                    <div class='col-md-6'>
                        <div class="form-group">
                          <label for="nama">NIK</label>
                          <input class="form-control" id="nama" placeholder="NIK" type="text" name='NIK' />
                        </div>
                        <div class="form-group">
                          <label for="nama">Level</label>
                          <select name='level'  class="form-control">
                              <option value=''>1</option>
							  <option value=''>2</option>
							  <option value=''>3</option>
							  <option value=''>4</option>
							  <option value=''>Semua Level</option>
                              <?php

                                foreach($level as $key => $lvl) {
                                    echo "<option value='$key'>$lvl</option>";
                                }
                              ?>
                          </select>
                        </div>

                    </div>
                    <div class='clearfix'></div>
                    <button type="button" class="btn btn-primary ml-15" id='select-filter'>Filter</button>
                </div>
            </div>
            <!-- /.box-body -->




            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo show_alert('message');?>
                    <table id="listed-table" class="table table-bordered table-striped mb-20" >
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Divisi</th>
								<th class="text-center">Level</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">

                        </tbody>
                    </table>
                    <br class='clearfix'/>
                    <div class="btn-group pull-right">
                        <button class="btn btn-primary active btn-sm prev-page" type="button"><i class="fa fa-angle-double-left "></i></button>
                        <button class="btn btn-primary btn-sm next-page" type="button"><i class="fa fa-angle-double-right"></i></button>
                    </div>
                    <input type='hidden' name='current_page' class='current-page' value='1' />

                    <br class='clearfix'/>
                </div>
            </div>
        </div>
    </div>
</section>

</form>
