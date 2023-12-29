<link rel="stylesheet" href="assets/wysiwyg/css/froala_editor.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/froala_style.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/code_view.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/draggable.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/colors.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/emoticons.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/image_manager.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/image.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/table.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/char_counter.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/video.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/file.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/help.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/third_party/spell_checker.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/special_characters.css">
<script type="text/javascript" src="assets/wysiwyg/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/word_paste.min.js"></script>
<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * from system_settings limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
 ?>
<div class="container-fluid">
	
	<div class="card col-lg-12">
		<div class="card-body">
			<form action="" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">System Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">Contact</label>
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="about" class="control-label">About Content</label>
					<textarea name="about" class="text-jqte" id="page_content"><?php echo isset($meta['about_content']) ? $meta['about_content'] : '' ?></textarea>

				</div>
				<div class="form-group">
					<label for="" class="control-label">Image</label>
					<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['cover_img']) ? 'assets/uploads/'.$meta['cover_img'] :'' ?>" alt="" id="cimg">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Save</button>
				</center>
			</form>
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
</style>

<script>
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	(function () {
      const editorInstance = new FroalaEditor('#page_content',{
      	heightMin:'40vh',
	    imageUploadParam: 'img',
	    imageUploadURL: 'ajax.php?action=save_page_img',
	    imageUploadParams: {},
	    imageUploadMethod: 'POST',
	    imageMaxSize: 5 * 1024 * 1024,
	    imageAllowedTypes: ['jpeg', 'jpg', 'png'],
	    events: {
		      'image.beforeUpload': function (images) {
		        start_load()
		      },
		      'image.uploaded': function (response) {
		        end_load()
		      },
		      'image.replaced': function ($img, response) {
		        // Image was replaced in the editor.
		        console.log($img,response)
		      },
		  }
      })
    })()

	$('#manage-settings').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_settings',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
</script>
<style>
	
</style>
</div>
