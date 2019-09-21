@section('adminlte_css_custom')
{{-- tuy con code css --}}

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">      
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">      

@endsection



<div class="row">
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
  <table class="display responsive nowrap table_customer" style="width:100%;" id="list_customer" >
    <thead>
      <tr>
        <th rowspan="2">Id</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">Tên khác</th>
        <th rowspan="2">Giới tính</th>
        <th colspan="4">Số điện thoại</th>
        <th rowspan="2">Loại giấy tờ</th>
        <th rowspan="2">Số giấy</th>
        <th rowspan="2">Ngày cấp</th>
        <th rowspan="2">Nơi cấp</th>
        <th rowspan="2">Ngân hàng</th>
        <th rowspan="2">Số TK</th>
        <th rowspan="2">Tỉnh</th>
        <th rowspan="2">Huyện</th>
        <th rowspan="2">Xã</th>
        <th rowspan="2">Địa chỉ</th>
        <th rowspan="2">Email</th>
        <th rowspan="2">Ngày sinh</th>
        <th rowspan="2">Hình ảnh</th>
        <th rowspan="2">Nơi làm việc</th>
        <th rowspan="2">Mã số thuế</th>
        <th rowspan="2">Trạng thái</th>
        <th rowspan="2">Loại khách hàng</th>
        <th rowspan="2">Action</th>
      </tr>
      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
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





@section('adminlte_js_custom')



  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


<script>

 GetUrl_hadling_customer('{{route('customer.handling_ajax_customer')}}');


    var page_customer;
    $(document).ready(function()
    {
      $(function()
      {
        'use strict';

        page_customer=$('#list_customer').DataTable({

               // dom: 'Bfrtip',
               // buttons: [
               // 'copy', 'csv', 'excel', 'pdf', 'print'
               // ],
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
                  url: "{{ route('customer.handling_ajax_customer') }}",
                  data: {
                    handling: "load_list_customer"
                  }
                },
                columns: 
                [
                {data:'cus_id', name: 'customer.cus_id' },
                {data:'cus_name', name: 'customer.cus_name' },
                {data: 'cus_nickname', name: 'customer.cus_nickname'},
                {data: 'cus_sex', name: 'customer.cus_sex'},
                {data: 'cus_phone1', name: 'customer.cus_phone1'},
                {data: 'cus_phone2', name: 'customer.cus_phone2'},
                {data: 'cus_phone3', name: 'customer.cus_phone3'},
                {data: 'cus_phone4', name: 'customer.cus_phone4'},
                {data: 'ide_name', name: 'identity.ide_name'},
                {data: 'ide_conten', name: 'customer.ide_conten'},
                {data: 'date_of_issue_ide', name: 'customer.date_of_issue_ide'},
                {data: 'place_of_issue_ide', name: 'customer.place_of_issue_ide'},
                {data: 'bank_id', name: 'customer.bank_id'},
                {data: 'bank_content', name: 'customer.bank_content'},
                {data: 'pr_name', name: 'provinces.pr_name'},
                {data: 'dis_name', name: 'district.dis_name'},
                {data: 'wa_name', name: 'wards.wa_name'},
                {data: 'cus_address', name: 'customer.cus_address'},
                {data: 'cus_email', name: 'customer.cus_email'},
                {data: 'cus_birthday', name: 'customer.cus_birthday'},
                {data: 'cus_img', name: 'customer.cus_img'},
                {data: 'cus_company', name: 'customer.cus_company'},
                {data: 'tax_code', name: 'customer.tax_code'},
                {data: 'cus_status', name: 'customer.cus_status'},
                {data: 'cus_type', name: 'customer.cus_type'},
                { data: 'action', name: 'customer.action' }

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

 @endsection