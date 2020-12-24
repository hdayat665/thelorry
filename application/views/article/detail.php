    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded box-shadow">
        <img class="mr-3" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">TheLorry Article</h6>
          <br>
          <div>Latest Update</div>
        </div>
      </div>

      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0"><?= $article[0]['title'] ?></h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">By <?= $article[0]['acc_name'] ?></strong><br>
            <?= $article[0]['article'] ?>
          </p>
        </div>
      </div>

      <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="media text-muted">
          <div id="accordion" class="w-100">
            <div class="card">
              <div class="breadcrumb bg-primary text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                <div class="breadcrumb-item">
                    Comment Section 
                    <br>
                    <small><i> Click to close comment </i></small>
                </div>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <?php 

                  $article_id = $this->uri->segment(3);
                  $data = comment($article_id);

                  foreach ($data as $key): ?>
                    <?php if ($key['acc_id'] == $this->session->userdata['id']):
                      $key['acc_name'] = 'You';
                     endif ?>
                  <div class="media">
                    <img class="mr-3" src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" width="5%" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mt-0"><?= $key['acc_name'] ?></h5>
                      <?= $key['cmn_desc'] ?>
                      <br>
                      <small><i>Comment on : <?= $key['date_created'] ?></i></small>
                    </div>
                  </div>
                  <hr>

                  <?php endforeach ?>
                </div>
                
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-10">
                      <?php
                      $attr = array(
                        'name' => 'comment',
                        'method' => 'post',
                        'id' => 'comment');
                      echo form_open_multipart('#', $attr); 
                      ?>
                      <input type="text" class="form-control" placeholder="Type your comment here" name="comment">
                      <input type="hidden" class="form-control" value="<?= $this->session->userdata['id'] ?>" name="acc_id">
                      <input type="hidden" class="form-control" name="article_id" value="<?= $this->uri->segment(3) ?>">
                    </div>
                    <?php echo form_close()  ?>

                    <div class="col-2">
                      <button class="btn btn-primary" id="save"><span class="fa fa-comment"></span> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script type="text/javascript">
     $('#comment').submit(function(e){
      e.preventDefault();
    })
     $('#save').click(function(){

      if(!$('#comment')[0].checkValidity())
      {
        return ;
      }
      var form = $('#comment')[0];
      var datastring = new FormData(form);
      var id = "<?=$this->uri->segment(3)?>";
      $.ajax({
        data: datastring,
        type: $('#comment').attr('method'),
        url: "<?= base_url() ?>Admin/add_comment",
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        success: function(response){
            window.location.href = "<?= base_url('/admin/details_article')?>/"+id;
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