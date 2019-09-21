
<div class="modal fade in" id="modal-add_customer" style="display: none; padding-right: 17px;" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Tạo mới khách hàng</h4>
        </div>
        
        <form action="post" name="frmCreate_Customer" id="frmCreate_Customer">
          {{ csrf_field() }}

          <div class="modal-body">
            <div class="row">

              <div class="col-md-4">
                <div id="div_txtfullname" class="form-group has-success">
                  <label for="txtfullname">NickName(tên thường gọi)</label>
                  <input type="text" class="form-control" id="txtfullname" placeholder="Nhập họ và tên" name='txtfullname' maxlength="60">
                </div>
                <div id="div_txtfullname" class="form-group has-success">
                  <label for="txtfullname">Họ tên(tên đầy đủ)</label>
                  <input type="text" class="form-control" id="txtfullname" placeholder="Nhập họ và tên" name='txtfullname' maxlength="60">
                </div>
                <div id ="div_txtsex" class="form-group has-success">
                  <label>Giới tính</label>
                  <select class="form-control" id="txtsex" name="txtsex">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                  </select>
                </div>

                <div id="div_txtphone" class="form-group has-success">
                  <label for="exampleInputEmail1">Điện thoại</label>
                  <input id="txtphone" name="txtphone" type="text" class="form-control" placeholder="0975825702" maxlength="11">
                </div>

                <div id="div_txtphone" class="form-group has-success">
                  <label for="exampleInputEmail1">Điện thoại</label>
                  <input id="txtphone" name="txtphone" type="text" class="form-control" placeholder="0975825702" maxlength="11">
                </div>

                <div id="div_txtemail" class="form-group has-success">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Nhập email" maxlength="30">
                </div> 


                <div id="div_txtfullname" class="form-group has-success">
                  <label for="txtfullname">Sinh nhật</label>
                  <input type="date" class="form-control" id="txtfullname" placeholder="Nhập họ và tên" name='txtfullname' maxlength="60">
                </div>

                 <div id="div_provinces" class="form-group has-success">
                  <label>Thành phố</label>
                  <select class="form-control" id="provinces" name="provinces">
{{--                    @foreach($provinces as $provinces)
                      <option value="{{$provinces->pr_id}}">{{$provinces->pr_name}}</option>
                   @endforeach --}}
                  </select>
                </div>

                 <div id="div_district" class="form-group has-success">
                  <label>Quận/huyện</label>
                  <select class="form-control" id="district" name="district">

                  </select>
                </div>

                <div id="div_wards" class="form-group has-success">
                  <label>Phường/ xã</label>
                  <select class="form-control" id="wards" name="wards">

                  </select>
                </div> 

                <div id="div_txtaddress" class="form-group has-success">
                  <label for="exampleInputPassword1">Địa chỉ</label>
                  <input type="text" class="form-control" id="txtaddress" name="txtaddress" placeholder="Nhập địa chỉ nhân viên" maxlength="60">
                </div> 
              </div>





              <div class="col-md-4">

                <div id="div_txtfullname" class="form-group has-success">
                  <label for="txtfullname">Loại giấy tờ</label>
                  <input type="text" class="form-control" id="txtfullname" placeholder="Nhập họ và tên" name='txtfullname' maxlength="60">
                </div>

                 <div id="div_provinces" class="form-group has-success">
                  <label>Số giấy tờ tùy thân</label>
                  <select class="form-control" id="provinces" name="provinces">
{{--                    @foreach($provinces as $provinces)
                      <option value="{{$provinces->pr_id}}">{{$provinces->pr_name}}</option>
                   @endforeach --}}
                  </select>
                </div>

                 <div id="div_district" class="form-group has-success">
                  <label>Ngày cấp</label>
                  <select class="form-control" id="district" name="district">

                  </select>
                </div>

                <div id="div_wards" class="form-group has-success">
                  <label>Nơi cấp</label>
                  <select class="form-control" id="wards" name="wards">
                  </select>
                </div> 

                 <div id="div_district" class="form-group has-success">
                  <label>Số GPLX</label>
                  <select class="form-control" id="district" name="district">

                  </select>
                </div>

                <div id="div_wards" class="form-group has-success">
                  <label>Ngày hết hạn</label>
                  <select class="form-control" id="wards" name="wards">
                  </select>
                </div> 

                <div id="div_txtaddress" class="form-group has-success">
                  <label for="exampleInputPassword1">Ngân hàng</label>
                  <input type="text" class="form-control" id="txtaddress" name="txtaddress" placeholder="Nhập địa chỉ nhân viên" maxlength="60">
                </div> 

                 <div class="form-group has-success">
                  <label>Số TK ngân hàng</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>
                <div id="div_txtaddress" class="form-group has-success">
                  <label for="exampleInputPassword1">Tên công ty</label>
                  <input type="text" class="form-control" id="txtaddress" name="txtaddress" placeholder="Nhập địa chỉ nhân viên" maxlength="60">
                </div> 

                 <div class="form-group has-success">
                  <label>Mã số thuế</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>
                <div class="form-group has-success">
                  <label>Nghề nghiệp</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>

                <div class="form-group has-success">
                  <label>Ghi chú</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>

              </div>

              <div class="col-md-4">

                <div id="div_txtfullname" class="form-group has-success">
                  <label for="txtfullname">Loại giấy tờ</label>
                  <input type="text" class="form-control" id="txtfullname" placeholder="Nhập họ và tên" name='txtfullname' maxlength="60">
                </div>

                 <div id="div_provinces" class="form-group has-success">
                  <label>Số giấy tờ tùy thân</label>
                  <select class="form-control" id="provinces" name="provinces">
{{--                    @foreach($provinces as $provinces)
                      <option value="{{$provinces->pr_id}}">{{$provinces->pr_name}}</option>
                   @endforeach --}}
                  </select>
                </div>

                 <div id="div_district" class="form-group has-success">
                  <label>Ngày cấp</label>
                  <select class="form-control" id="district" name="district">

                  </select>
                </div>

                <div id="div_wards" class="form-group has-success">
                  <label>Nơi cấp</label>
                  <select class="form-control" id="wards" name="wards">
                  </select>
                </div> 

                 <div id="div_district" class="form-group has-success">
                  <label>Số GPLX</label>
                  <select class="form-control" id="district" name="district">

                  </select>
                </div>

                <div id="div_wards" class="form-group has-success">
                  <label>Ngày hết hạn</label>
                  <select class="form-control" id="wards" name="wards">
                  </select>
                </div> 

                <div id="div_txtaddress" class="form-group has-success">
                  <label for="exampleInputPassword1">Ngân hàng</label>
                  <input type="text" class="form-control" id="txtaddress" name="txtaddress" placeholder="Nhập địa chỉ nhân viên" maxlength="60">
                </div> 

                 <div class="form-group has-success">
                  <label>Số TK ngân hàng</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>
                <div id="div_txtaddress" class="form-group has-success">
                  <label for="exampleInputPassword1">Tên công ty</label>
                  <input type="text" class="form-control" id="txtaddress" name="txtaddress" placeholder="Nhập địa chỉ nhân viên" maxlength="60">
                </div> 

                 <div class="form-group has-success">
                  <label>Mã số thuế</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>
                <div class="form-group has-success">
                  <label>Nghề nghiệp</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>

                <div class="form-group has-success">
                  <label>Ghi chú</label>
                  <select class="form-control" id="txtbranch" name="txtbranch">
                   {{--  @foreach($branch as $branch)
                    <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    @endforeach --}}
                  </select>
                </div>

              </div>  

              <div class="col-md-12">

                <div id="div_img_user" class="form-group has-success">
                  <label for="exampleInputFile">Ảnh đại diện</label>
                  <input type="file" id="img_user"  name="img_user" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" onchange="chang_img_create_user();">
                  <p class="help-block">Ảnh không quá 4MB</p>
                </div>

              </div>
               <div class="col-md-12">

                <div id="img_review" class="form-group has-success">
               
                </div>

              </div>



            </div>
          </div>
        </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  id ="btn_craete_user" onclick="create_user();">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script type="text/javascript">

    
$('#provinces').change(function(){
  ajax_district('provinces','district');// load danh huyen theo thanh pho form create user
  $('#wards').empty();
  $('#district').empty();   
});

$('#district').click(function(){
  ajax_wards('district','wards');// load danh sach phuong xa. 
});



$('#district').change(function(){
  ajax_wards('district','wards');// load danh sach phuong xa. 
});


    //khong cho nhap chu vao texxbox so dien thoai
    $('#txtphone').keypress(function()
    {
      var keyword=null;
      if(window.event)
      {
        keyword=window.event.keyCode;
      }else
      {
        keyword=e.which; //NON IE;
      }

      if(keyword<48 || keyword>57)
      {
        if(keyword==48 || keyword==127)
        {
          return ;
        }
        return false;
      }
    });

  </script>