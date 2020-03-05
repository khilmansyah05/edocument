<?php

$this->load->view('header');

echo $content;
// dumper($data);

$this->load->view('footer');
?>

<h4> Data : </h4>
<a href="<?php echo site_url('discover/dashboard');?>">
						<i class="icon-dashboard"></i>
						<span>Beranda</span>
