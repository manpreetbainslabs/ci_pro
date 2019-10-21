<?php echo validation_errors(); ?>
<a class="pull-right" style="float:right;" href="<?php echo base_url('news');?>">View News</a>
<div class="col-md-6">
<?php echo form_open_multipart('news/create'); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input name="title" type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="upload">Upload</label>
    <input name="upload" type="file" class="form-control" id="upload">
  </div>
  <div class="form-group">
    <label for="text">Description</label>
    <textarea class="form-control" id="text" name="text"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>