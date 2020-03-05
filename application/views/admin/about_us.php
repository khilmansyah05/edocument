<?php
  $this->load->view('header');
  // $title = "Tambah Event";
  // echo validation_errors('<div class="alert alert-danger">', '</div>');
  // if(!empty($this->config->item('error'))){
  //   echo '<div class="alert alert-danger">'.$this->config->item('error').'</div>';
  // }

  echo $this->session->flashdata('message');
  // $csrf = array(
  //   'name' => $this->security->get_csrf_token_name(),
  //   'hash' => $this->security->get_csrf_hash()
  // );
?>
  <title><?php echo $title; ?></title>
  <script type="text/javascript" src="<?php echo base_url('template/editor');?>/ckfinder/ckfinder.js"></script>
  <script type="text/javascript" src="<?php echo base_url('template/editor');?>/ckeditor/ckeditor.js"></script>
  <form class="form-horizontal" method='POST' enctype="multipart/form-data" action='<?php echo $action; ?>'>
    <h4>Edit Tentang Kami</h4>
    <br/>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->

    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Deskripsi Web : </label>
      <div class="col-md-9 col-xs-12">
        <textarea class='form-control' name='web_description' id="editor1" /><?php echo stripslashes(get_option('web_description'));?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-md-3 form-control-label">
          <button type='submit' class='btn btn-primary'>Save</button>
      </div>
    </div>
  </form>

  <script type="text/javascript">
  	// This is a check for the CKEditor class. If not defined, the paths must be checked.
  	if ( typeof CKEDITOR == 'undefined' )
  	{
  		document.write(
  			'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
  			'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
  			'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
  			'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
  			'value (line 32).' ) ;
  	}
  	else
  	{
  	var editor = CKEDITOR.replace( 'editor1',
  	 {
  		filebrowserBrowseUrl : '<?php echo base_url('template/editor');?>/ckfinder/ckfinder.html',
  		filebrowserImageBrowseUrl : '<?php echo base_url('template/editor');?>/ckfinder/ckfinder.html?type=Images',
  		filebrowserFlashBrowseUrl : '<?php echo base_url('template/editor');?>/ckfinder/ckfinder.html?type=Flash',
  		filebrowserUploadUrl : '<?php echo base_url('template/editor');?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
  		filebrowserImageUploadUrl : '<?php echo base_url('template/editor');?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
  		filebrowserFlashUploadUrl : '<?php echo base_url('template/editor');?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
  	 }
  	 );


  		// Just call CKFinder.setupCKEditor and pass the CKEditor instance as the first argument.
  		// The second parameter (optional), is the path for the CKFinder installation (default = "/ckfinder/").
  		CKFinder.setupCKEditor( editor, '../' ) ;

  		// It is also possible to pass an object with selected CKFinder properties as a second argument.
  		// CKFinder.setupCKEditor( editor, { basePath : '../', skin : 'v1' } ) ;
  	}
  </script>
<?php
  $this->load->view('footer');
?>
