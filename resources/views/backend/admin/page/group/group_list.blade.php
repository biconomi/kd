

<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="box">
     <div class="box-header with-border">
      <div class="pull-right">
        <div class="dropdown pull-right column-selector" style="margin-right: 10px">
          <button type="button" class="btn btn-sm btn-instagram" data-toggle="dropdown">
            <i class="fa fa-table"> &nbsp; Export</i>
          </button>

        </div>

        <div class="btn-group pull-right" style="margin-right: 10px">
         <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add_group">
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
  <table class="display responsive table_customer" style="width:100%" id="list_group" class="list_group">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
  <div id="paginationListgroups" style="margin-bottom: 10px; display: flex;">
    <input class="form-control" type="text" placeholder="Page" id="inputPaginationListgroups" style="width: 60px; margin-right: 5px;">
    <button class="btn btn-primary" id="buttonPaginationListgroups">Go</button>
  </div>

  <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- /.box -->
</div>
<!-- /.col -->
</div>
@include('backend.admin.page.group.employee')
@include('backend.admin.page.group.create_group')
</div>




<script>

 GetUrl_hadling_group('{{route('group.handling_ajax_group')}}');


    var page_group;
    $(document).ready(function()
    {
      $(function()
      {
        'use strict';

        page_group=$('#list_group').DataTable({

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
                  url: "{{ route('group.handling_ajax_group') }}",
                  data: {
                    handling: "load_list_group"
                  }
                },
                columns: 
                [
                { data: 'gr_id', name: 'group.gr_id' },
                { data: 'gr_name', name: 'group.gr_name' },
                { data: 'action', name: 'group.action' },
                ],
              });

        });

    });
</script>

