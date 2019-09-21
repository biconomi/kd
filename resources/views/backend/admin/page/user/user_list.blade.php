
<div class="row" id="div_user">
  <div class="col-xs-12">
    <div class="box">
     <div class="box-header with-border">
      <div class="pull-right">
        <div class="dropdown pull-right column-selector" style="margin-right: 10px">
          <button type="button" class="btn btn-sm btn-instagram" data-toggle="dropdown">
            <i class="fa fa-table"> &nbsp; Export</i>
          </button>

        </div>

        <div class="btn-group pull-right" style="margin-right: 10px">
         <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add_user">
          <i class="fa fa-plus"> &nbsp; Add</i>
        </button>
      </div>

    </div>
    <span>
     <a class="btn btn-sm btn-primary grid-refresh" title="Refresh"><i class="fa fa-refresh"></i><span class="hidden-xs"> Refresh</span></a> 
     <div class="btn-group" style="margin-right: 10px" data-toggle="buttons">

     </div>
   </span>
 </div>
 <!-- /.box-header -->
 <div class="box-body">
  <table class="display responsive table_customer" style="width:100%" id="list_customer" >
    <thead>
      <tr>
        <th>Id</th>
        <th>img</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Email</th>

        <th>Phone</th>

        <th>Satus</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
  <div id="paginationListUsers" style="margin-bottom: 10px; display: flex;">
    <input class="form-control" type="text" placeholder="Page" id="inputPaginationListUsers" style="width: 60px; margin-right: 5px;">
    <button class="btn btn-primary" id="buttonPaginationListUsers">Go</button>
  </div>

  <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- /.box -->
</div>
<!-- /.col -->
</div>
</div>
@include('backend.admin.page.user.create_user')

<div id='div_show_profile_user'>  
 
</div>

<div class="modal fade in" id="modal-edit_user" style="display: none; padding-right: 17px;" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" id="edit_user">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Edit người dùng </h4>
        </div>
        <div id="div_edit_user"></div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  id ="btn_update_user">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



  <script>
   GetUrl_hadling_user('{{route('user.handling_ajax_user')}}');
    var page_customer;
    $(document).ready(function()
    {
      $(function()
      {
        'use strict';

        page_customer=$('#list_customer').DataTable({

               dom: 'Bfrtip',
               buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print'
               ],
               responsive: true,

               "scrollY": false,
               "scrollX": true,
               "lengthMenu": [[5, 10, 25, 50,100], [5, 10, 25, 50,100]],
               
              // processing: true,            
              // language: {
              //  processing: ""
             //       // processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
             //      },
               serverSide: true,
               ajax: 
               {
                  url: "{{ route('user.handling_ajax_user') }}",
                  data: {
                    handling: "load_list_user"
                  }
                },
                columns: 
                [
                { data: 'id', name: 'users.id' },
                { data: 'img', name: 'users.img' },
                { data: 'name', name: 'users.name' },
                { data: 'sex', name: 'users.sex'},
                { data: 'email', name: 'users.email' },
                { data: 'phone', name: 'users.phone' },
                { data: 'status', name: 'users.status' },
                { data: 'action', name: 'action'}              
                ],
              });

        });

    });


    $('#buttonPaginationListUsers').click(function () {
      var inputPage = parseInt($('#inputPaginationListUsers').val());
      var totalPages = page_customer.page.info().pages;
      if (!inputPage) {
        swal("Khùng hả mậy","Nhập số trang", "warning");
        $('#inputPaginationListUsers').each(function(){
          $(this).val('');
        });       
        page_customer.off();
      } else if (inputPage > totalPages) {
        swal("Khùng hả mậy","Không có trang này", "warning");
        $('#inputPaginationListUsers').each(function(){
          $(this).val('');
        }); 
      } else {
        page_customer.page(inputPage - 1).draw(false);
      }
    });
    function permission()
    {
      $("#div_user").toggle(1500);
    }
  </script>


