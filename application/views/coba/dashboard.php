<?php
  $this->load->view('header');
  // $title = "Tambah Event";
  // echo validation_errors('<div class="alert alert-danger">', '</div>');
  // if(!empty($this->config->item('error'))){
  //   echo '<div class="alert alert-danger">'.$this->config->item('error').'</div>';
  // }

  if(!isset($dt)){
    $dt =[];
  }
  // var_dump($dt);
  echo $this->session->flashdata('message');
?>

    <!-- Example Full-Bg Line -->
    <div class="example-wrap">
      <br/>
      <h4 class="example-title">Dashboard Admin</h4>
      <br/>

      <!-- form pencarian -->
      <div class="container">
        <form method="POST" action="<?php echo base_url('discover/dashboard') ?>" >
        <table border="0" class="table">
          <tr>
            <td width="50%">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input class="form-control" type="text" placeholder="Judul" id="judul" name="judul"></input>
              </div>

            </td>
            <td>
              <div class="form-group">
                <label for="divisi">Divisi</label>
                <select name="divisi" id="divisi" class="form-control">
                  <option value="">Pilih Divisi...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
              </div>
              
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <center>
                <!-- <a href="#" class="btn btn-info">Search</a> -->
                <input type="submit" name="submit" id="submit" class="btn btn-info">
              </center>
            </td>
          </tr>
        </table>
        </form>
      </div>
      <!-- akhir form pencarian -->

      <!-- table hasil -->
      <div class="card">
        <div class="card-header bg-info">
          <p>Tabel </p>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>NAMA FILE</th>
                <th>DIVISI</th>
                <th>FILE</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                foreach ($dt as $datadoc) {
                  $no = 1;
                    ?>

                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $datadoc->judul ?></td>
                        <td><?php echo $datadoc->nama_file ?></td>
                        <td><?php echo $datadoc->divisi ?></td>
                        <td><?php echo $datadoc->file ?></td>
                      </tr>

                    <?php
                    $no+=1;
                }
               ?>
            </tbody>

            <tfoot>
              <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>NAMA FILE</th>
                <th>DIVISI</th>
                <th>FILE</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- akhir table hasil -->


      <div class="example example-responsive">
        <div class="w-sm-400" id="exampleFlotFullBg"></div>
      </div>
    </div>
    <!-- End Example Full-Bg Line -->
  </div>

  <?php
    $this->load->view('footer');
  ?>
