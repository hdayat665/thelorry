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
        <div class="col-sm-6">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="acc_name" placeholder="" value="<?= $user[0]['acc_name'] ?>" required>
          <input type="hidden" name="acc_id" value="<?= $user[0]['acc_id'] ?>">
        </div>

        <div class="col-sm-6">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="email" placeholder="" value="<?= $user[0]['username'] ?>">
        </div>

        <?php if (!$this->uri->segment(3)): ?>
        <div class="col-sm-6">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="" value="<?= $user[0]['password'] ?>">
        </div>
        <?php endif ?>

        <div class="col-sm-6">
          <label class="form-label">Status</label>
          <?php
          $option = array(
            '1' => 'Active',
            '2' => 'Not Active'
          );
          $data = $user[0]['status'];
          echo form_dropdown('status', $option, $data, 'class="form-control"');

          ?>
        </div>
      </div>

      <hr class="my-4">

      <?php if ($this->uri->segment(3)): ?>
        <button class="btn btn-success w-25" id="update">Update</button>
        <?php else: ?>
          <button class="btn btn-primary w-25" id="save">Save</button>
        <?php endif ?>

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
      url: "<?= base_url() ?>Admin/register",
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
                window.location.href = "<?= base_url('/admin/user_list_view') ?>"
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
      url: "<?= base_url() ?>Admin/update_user",
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
                window.location.href = "<?= base_url('/admin/user_list_view') ?>"
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