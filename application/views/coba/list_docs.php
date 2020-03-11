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
                        <td><?php echo $datadoc->nama_doc ?></td>
                        <td><?php echo $datadoc->divisi ?></td>
                        <td><?php echo $datadoc->file ?></td>
                      </tr>

                    <?php
                    $no+=1;
                }
               ?>
            </tbody>

            <!-- <tfoot>
              <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>NAMA FILE</th>
                <th>DIVISI</th>
                <th>FILE</th>
              </tr>
            </tfoot> -->
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