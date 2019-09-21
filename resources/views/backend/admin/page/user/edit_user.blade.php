<form action="post" name="frmEditteUser" id="frmEditteUser">
          {{ csrf_field() }}
          <input type="hidden" id="txtid_user_edit" name="txtid_user_edit" value="{{$edit_user->id}}">
          <div class="modal-body">
            <div class="row">

              <div class="col-md-6">
                <div id="div_txtfullname_edit" class="form-group has-success">
                  <label for="txtfullname_edit">Họ tên</label>
                  <input type="text" class="form-control" id="txtfullname_edit" placeholder="Nhập họ và tên" name='txtfullname_edit' maxlength="60" value="{{$edit_user->name}}">
                </div>
                <div id ="div_txtsex_edit" class="form-group has-success">
                  <label>Giới tính</label>
                  <select class="form-control" id="txtsex_edit" name="txtsex_edit">
                    @if($edit_user->sex==0)
                    	<option value="0" selected="selected">Nam</option>
                    	<option value="1">Nữ</option>
                    @else
                   		<option value="0" >Nam</option>
                    	<option value="1" selected="selected">Nữ</option>
                    @endif
                  </select>
                </div>

                <div id="div_txtphone_edit" class="form-group has-success">
                  <label for="exampleInputEmail1">Điện thoại</label>
                  <input id="txtphone_edit" name="txtphone_edit" type="text" class="form-control" placeholder="0975825702" maxlength="11" value="{{$edit_user->phone}}">
                </div>

                <div id="div_txtemail_edit" class="form-group has-success">
                  <label for="text">Email</label>
                  <input type="text" class="form-control" id="txtemail_edit" name="txtemail_edit" placeholder="Nhập email" maxlength="30" value="{{$edit_user->email}}">
                </div>   


                <div id="div_txtpassword_edit" class="form-group has-success">
                  <label for="password">Mật khẩu</label>
                  <input type="password" class="form-control" id="txtpassword_edit" name="txtpassword_edit" placeholder="Để trống không đổi mật khẩu" maxlength="8" value="">
                </div> 

              </div>

              <div class="col-md-6">
                 <div id="div_provinces_edit" class="form-group has-success">
                  <label>Thành phố</label>
                  <select class="form-control" id="provinces_edit" name="provinces_edit" onchange="loadDistrict();">
                  	@foreach($provinces as $provinces)
                  		@if($provinces->pr_id==$edit_user->pr_id)
                  			<option value="{{$provinces->pr_id}}" selected="selected">{{$provinces->pr_name}}</option>
                  		@else
                  			<option value="{{$provinces->pr_id}}">{{$provinces->pr_name}}</option>
                  		@endif
                  	@endforeach
                  </select>
                </div>

                 <div id="div_district_edit" class="form-group has-success">
                  <label>Quận/huyện</label>
                  <select class="form-control" id="district_edit" name="district_edit" onchange="loadWards();" onclick="loadWards();">
                  	@foreach($district_edit as $district_edit)
                  		@if($district_edit->id_dis==$edit_user->id_dis)
                  			<option value="{{$district_edit->id_dis}}" selected="selected">{{$district_edit->dis_name}}</option>
                  		@else
                  			<option value="{{$district_edit->id_dis}}">{{$district_edit->dis_name}}</option>
                  		@endif
                  	@endforeach
                  </select>
                </div>

                <div id="div_wards_edit" class="form-group has-success">
                  <label>Phường/ xã</label>
                  <select class="form-control" id="wards_edit" name="wards_edit">
                  	@foreach($wards_edit as $wards_edit)
	                  	@if($wards_edit->wa_id==$edit_user->wa_id)
	                  		<option value="{{$wards_edit->wa_id}}" selected="selected">{{$wards_edit->wa_name}}</option>
	                  	@else
	                  		<option value="{{$wards_edit->wa_id}}">{{$wards_edit->wa_name}}</option>
	                  	@endif
                  	@endforeach
                  </select>
                </div> 

                <div id="div_txtaddress_edit" class="form-group has-success">
                  <label for="exampleInputPassword1">Địa chỉ</label>
                  <input type="text" class="form-control" id="txtaddress_edit" name="txtaddress_edit" placeholder="Nhập địa chỉ nhân viên" maxlength="60" value="{{$edit_user->address}}">
                </div> 

                 <div class="form-group has-success">
                  <label>Đại lý</label>
                  <select class="form-control" id="txtbranch_edit" name="txtbranch_edit">
                    @foreach($branch as $branch)
                    	@if($edit_user->br_id==$branch->br_id)
                    	<option value="{{$branch->br_id}}" selected="selected">{{$branch->br_name}} </option>
                    	@else
                    	<option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                    	@endif
                    @endforeach
                  </select>
                </div>

              </div>

              <div class="col-md-12">

                <div id="div_img_user_edit" class="form-group has-success">
                  <label for="exampleInputFile">Ảnh đại diện</label>
                  <input type="file" id="img_user_edit"  name="img_user_edit" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" onchange="chang_img_edit_user();">
                  <p class="help-block">Ảnh không quá 4MB</p>
                </div>

              </div>
               <div class="col-md-12">

                <div id="img_review_edit" class="form-group has-success">
               		<img class="wd-80 rounded-circle" style="height: 100px;width: 100px;" src="{{url('adminlte/upload/user/'.$edit_user->img)}}">
                </div>

              </div>



            </div>
          </div>
        </form>

<script type="text/javascript">

  $('#btn_update_user').click(function(){
      update_form_user();
  });

  
//khong cho nhap chu vao texxbox so dien thoai
$('#txtphone_edit').keypress(function()
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