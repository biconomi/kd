

<div class="row" id="div_customer">
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
         <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add_customer">
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
  <table class="display responsive table_customer" style="width:100%;" id="list_customer" >
    <thead>
      <tr>
        <th style="width: 30px!important;">Id</th>
        <th style="width: 100px!important;">Nickname</th>
        <th style="width: 70px!important;">Phone</th>
        <th style="width: 70px!important;">Phone 2</th>
        <th style="width: 180px!important;">Name</th>        
        
        <th >Provinces</th>
        <th >District</th>
        <th >Action</th>        
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

@include('backend.business.page.customer.create_customer')


<div id='div_show_profile_customer'>  
 
</div>



<script>

 GetUrl_hadling_customer('{{route('customer.handling_ajax_customer')}}');
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

               "scrollY": true,
               "scrollX": true,
               "lengthMenu": [[10, 10, 25, 50,100], [10, 10, 25, 50,100]],
               
              //  processing: true,
              //  language: {
              //   processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
              // },

               serverSide: true,
               ajax: 
               {
                  url: "{{ route('customer.handling_ajax_customer') }}",
                  data: {
                    handling: "load_list_customer"
                  }
                },
                columns: 
                [                  
                  {data:'cus_id', name: 'customer.cus_id' },
                  {data: 'cus_nickname', name: 'customer.cus_nickname'},
                  {data:'cus_phone1', name: 'customer.cus_phone1' },
                  {data:'cus_phone2', name: 'customer.cus_phone2' },
                  {data:'cus_name', name: 'customer.cus_name' },

                  
                  {data:'pr_name', name: 'provinces.pr_name'},
                  {data:'dis_name', name: 'district.dis_name' },
                  {data:'action', name: 'action' }
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
</script>
