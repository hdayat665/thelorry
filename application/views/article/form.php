<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4 class="mb-3">Article</h4>
      <?php
      $attr = array(
        'name' => 'add_new',
        'method' => 'post',
        'id' => 'add_new');
      echo form_open_multipart('#', $attr); 
      ?>
        <div class="row g-3">
          <div class="col-sm-4">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="" value="<?= $article[0]['title'] ?>" required>
            <input type="hidden" name="article_id" value="<?= $this->uri->segment(3) ?>">
            <input type="hidden" name="acc_id" value="<?= $this->session->userdata['id'] ?>">
          </div>

          <div class="col-sm-4">
            <label class="form-label">Published By</label>
            <input type="text" class="form-control" name="publish_by" placeholder="" value="<?= $this->session->userdata['name'] ?>" required>
          </div>

          <div class="col-sm-4">
            <label class="form-label">Status</label>
            <?php
              $option = array(
                '1' => 'Active',
                '2' => 'Not Active'
              );
              $data = $article[0]['status'];
              echo form_dropdown('status', $option, $data, 'class="form-control"');

            ?>
          </div>

          <div class="col-12 mt-2">
            <label class="form-label">Artitle Description</label>
            <div class="input-group">
              <textarea class="form-control" name="article" rows="4"><?= $article[0]['article'] ?></textarea>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <?php if ($this->uri->segment(3)): ?>
          <button class="btn btn-success w-25" id="update">Update</button>
          <?php else: ?>
            <button class="btn btn-primary w-25" id="save">Save</button>
          <?php endif ?>
        </form>
      </div>
    </div>
  </div>

<script type="text/javascript">
  $('#add_new').submit(function(e){
    e.preventDefault();
  })
  $('#save').click(function(){

    if(!$('#add_new')[0].checkValidity())
    {
      return ;
    }
    var form = $('#add_new')[0];
    var datastring = new FormData(form);

    $.ajax({
      data: datastring,
      type: $('#add_new').attr('method'),
      url: "<?= base_url() ?>Admin/add_article",
      processData: false,
      contentType: false,
      cache: false,
      dataType: 'json',
      success: function(response){

        $.alert({
          title: 'TheLorry',
          content: response.msg,
          buttons: {
            OK: {
              text: 'OK',
              action: function(){
                window.location.href = "<?= base_url('/admin/user_view') ?>"
              }
            },
          }
        });

      },

      error: function(){
        $('body').removeClass('loading');
        $.alert({
          title: 'TheLorry',
          content: response.msg,
          buttons: {
            OK: {
              text: 'OK',

            },
          }
        });
      }
    });
  })

  $('#update').click(function(){

    if(!$('#add_new')[0].checkValidity())
    {
      return ;
    }
    var form = $('#add_new')[0];
    var datastring = new FormData(form);

    $.ajax({
      data: datastring,
      type: $('#add_new').attr('method'),
      url: "<?= base_url() ?>Admin/update_article",
      processData: false,
      contentType: false,
      cache: false,
      dataType: 'json',
      success: function(response){

        $.alert({
          title: 'TheLorry',
          content: response.msg,
          buttons: {
            OK: {
              text: 'OK',
              action: function(){
                window.location.href = "<?= base_url('/admin/user_view') ?>"
              }
            },
          }
        });

      },

      error: function(){
        $('body').removeClass('loading');
        $.alert({
          title: 'TheLorry',
          content: response.msg,
          buttons: {
            OK: {
              text: 'OK',

            },
          }
        });
      }
    });
  })
</script>