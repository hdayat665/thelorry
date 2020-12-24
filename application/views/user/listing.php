<div class="row">
  <div class="col">
    <a href="<?= base_url('admin/edit_user_view') ?>"><button class="btn btn-primary mb-3"><span class="fa fa-plus"></span> Add New User</button></a>
  </div>
</div>

<div class="row">
  <div class="col">
    <table id="stege1" class="table table-responsive">
      <thead class="thead-dark">
        <tr>
          <th width="2%">Account Id</th>
          <th width="5%">Name</th>
          <th width="10%">Email</th>
          <th width="2%">Role</th>
          <th width="2%">Status</th>
          <th width="3%">Action</th>
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
      "url": "<?= base_url('Admin/user_list') ?>",
      "type": "POST",
      "data": {}
    },
    columns: [

    {"data": "acc_id"},
    {"data": "acc_name"},
    {"data": "username"},
    {"data": "role",
    render:function(row, x, data){
      html = '';
      if(row == 1){
        html = "Admin";
      }else if(row == 2){
        html = "User";
      }

      return html;
    }
  },
    {"data": "status",
      render:function(row, x, data){
        status = '';
        if(row == 1){
          status = "Active";
        }else if(row == 2){
          status = "Not Active";
        }

        return status;
      }
    },
  {"data": "acc_id",
  render:function(row, x, data){

      link = "<button type=\"button\" data-id=\""+row+"\" onclick=\"delete_user(this)\" class=\"btn btn-danger mr-2\"><span class=\"fa fa-trash\"></span></button>"+
      "<a href=\"<?= base_url('admin/edit_user_view') ?>/"+row+"\" ><button type=\"button\" class=\"btn btn-primary\"><span class=\"fa fa-pencil text-white\"></span></button></a>";

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
      content: 'Are you sure to delete this user?',
      boxWidth : '30%',
      useBootstrap : false,
      buttons: {
        Yes : {
          btnClass : 'btn-danger',
          action: function() {
           $.ajax({
            data: {id : dataId},
            type: 'post',
            url: '<?= base_url('admin/delete_user')?>',
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
                    window.location.href = '<?= base_url('admin/user_list_view' )?>';
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