<div class="row">
  <div class="col">
    <a href="<?= base_url('admin/add_article_view') ?>"><button class="btn btn-primary mb-3"><span class="fa fa-plus"></span> Publish New Article</button></a>
  </div>
</div>

<div class="row">
  <div class="col">
    <table id="stege1" class="table table-responsive">
      <thead class="thead-dark">
        <tr>
          <th width="2%">Article Code</th>
          <th width="5%">Title</th>
          <th width="10%">Article Description</th>
          <th width="2%">Published By</th>
          <th width="2%">Status</th>
          <th width="5%">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
  mainTable = $("#stege1").dataTable({

    ajax: {
      "url": "<?= base_url('Admin/article_list') ?>",
      "type": "POST",
      "data": {}
    },
    columns: [

    {"data": "article_id"},
    {"data": "title"},
    {"data": "article",
      render:function(row, x, data){
        article = "<div class=\"limit\">"+row+"</div>";

      return article;
      }
    },
    {"data": "acc_name",
      
      render:function(row, x, data){

        name = row;
       if (data.acc_id == <?= $this->session->userdata['id'] ?>) {
        name = 'You';
       }

       return name;
      }
    },
    {"data": "status",
    render:function(row, x, data){
      html = '';
      if(row == 1){
        html = "Published";
      }else if(row == 2){
        html = "Banned";
      }

      return html;
    }
  },
  {"data": "article_id",
  render:function(row, x, data){

    var acc_id = data.acc_id;
    var role =  <?= $this->session->userdata['role'];?>

    link = "<a href=\"<?= base_url('admin/details_article') ?>/"+row+"\" class=\"mr-2\" ><button type=\"button\" class=\"btn btn-dark\"><span class=\"fa fa-eye text-white\"></span></button></a>"

    if (acc_id == <?= $this->session->userdata['id'] ?>) {

    link = "<a href=\"<?= base_url('admin/add_article_view') ?>/"+row+"\" class=\"mr-2\" ><button type=\"button\" class=\"btn btn-primary\"><span class=\"fa fa-pencil\"></span></button></a>"+
    "<button type=\"button\" data-id=\""+row+"\" onclick=\"delete_user(this)\" class=\"btn btn-danger mr-2\"><span class=\"fa fa-trash\"></span></button>"+
    "<a href=\"<?= base_url('admin/details_article') ?>/"+row+"\" ><button type=\"button\" class=\"btn btn-dark\"><span class=\"fa fa-eye text-white\"></span></button></a>";

    }else if(role == 1){

    link = "<button type=\"button\" data-id=\""+row+"\" onclick=\"delete_user(this)\" class=\"btn btn-danger mr-2\"><span class=\"fa fa-trash\"></span></button>"+
    "<a href=\"<?= base_url('admin/details_article') ?>/"+row+"\" ><button type=\"button\" class=\"btn btn-dark\"><span class=\"fa fa-eye text-white\"></span></button></a>";

    }

    return link;
  }
},
],



});

  function delete_user(elem){
    var dataId = $(elem).data("id");
    $.alert({
      title: 'TheLorry',
      type: 'red',
      content: 'Are you sure to delete this article?',
      boxWidth : '30%',
      useBootstrap : false,
      buttons: {
        Yes : {
          btnClass : 'btn-danger',
          action: function() {
           $.ajax({
            data: {id : dataId},
            type: 'post',
            url: '<?= base_url('admin/delete_article')?>',
            dataType: 'json',
            success: function(response){

              $.alert({
                title: 'Delete success',
                content: response.msg,
                type: 'red',
                buttons: {
                 OK: {
                  text: 'OK',
                  action: function(){
                    window.location.href = '<?= base_url('admin/user_view' )?>';
                  }
                },
              }
            });           
            },
            error: function(){
              $('body').removeClass('loading');

            }
          });
         }
       },

       No: function() {

       }
     }
   })
  }
</script>