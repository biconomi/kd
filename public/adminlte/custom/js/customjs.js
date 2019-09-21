//custom js.

// $(document).ready(function(){

// 	// Binds to the global ajax scope
// 	$( document ).ajaxStart(function() {	
// 		// $( ".ui-widget-overlay-v2" ).show();
// 		alert();
// 		check_Auth();
		
// 		//check_Auth();
// 	});

// 	$( document ).ajaxComplete(function() {	
// 		//$( ".ui-widget-overlay-v2" ).hide();
// 		//alert('ajax');
// 	});
// });



var url_ajx_change_district=''
var url_checkAuth='';
var url_route='';

function url_handling_route(url)
{
	url_route=url;
}


$('#menu_user').click(function(){
	handling_route('admin.user.list','List_user');
});

$('#menu_group').click(function(){
	handling_route('admin.group.list','List_Group');
});

$('#menu_dashboard').click(function(){
	handling_route('Dashboard','Dashboard');
});

$('#menu_customer').click(function(){
	handling_route('business.customer','Customer');
});


function handling_route(handling,lable_title)
{	
	var handling=handling//handling
	$.ajax({       
		url: url_route,
		data: {handling:handling},
		type: 'get',
		dataType: 'html',
		traditional: true,  
		success: function (data) {
			$('.modal-backdrop').remove();

			$("#content").empty();
			$("#content").fadeIn();
			$("#lable_title").html(lable_title); 

			$("#content").html(data); 

			},
		error: function (jqXHR,xhr, ajaxOptions, thrownError) {

		}
	});
}


// route js


function GetUrl_ajx_change_district(url)
{
	url_ajx_change_district=url;
}

function GetUrl_Auth(url_Auth)
{
	url_checkAuth=url_Auth;//get url de thuwc hien check login
}

function check_Auth()
{
	var url=url_checkAuth;// name('check.Auth');
	$.ajax({       
		url: url,
		type: 'get',
		dataType: 'html',
		traditional: true,  
		success: function (data) {
			if(data=='false')
			{
				location.reload(); 
			}
		}
	});
}


function ajax_district(id_provinces,id_div_district)//load danh sach quan huyen theo thanh pho
{
		var url=url_ajx_change_district;
		var handling='ajax_district';//handling
		var id_provinces=$("#"+id_provinces).val();
		$.ajax({       
			url: url,
			data: { id_provinces:id_provinces,handling:handling},
			type: 'get',
			dataType: 'html',
			traditional: true,  
			success: function (data) {
				$("#"+id_div_district).html(data); 
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {
				
			}
		});
}

function ajax_wards(id_district,id_div_wards)//load danh sach quan huyen theo thanh pho
{
		var url=url_ajx_change_district;
		var handling='ajax_wards';//handling
		var id_district=$("#"+id_district).val();
		$.ajax({       
			url: url,
			data: { id_district:id_district,handling:handling},
			type: 'get',
			dataType: 'html',
			traditional: true,  
			success: function (data) {
				$("#"+id_div_wards).html(data); 
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {
				
			}
		});
}


function resetForm(id_form)//reset form
{
	$('#'+id_form)[0].reset();
}

//kiem tra so dien thoại
function checkPhone(value)
{
	var regexphone = /\b\d{3,4}[-.]?\d{3}[-.]?\d{3,4}\b/;
	//var regexphone=/((09|03|07|08|05)+([0-9]{8})\b)/g;
	if (regexphone.test(value) == false) 
	{
		return false;
	}
	return true;
}
//kiem tra email
function checkEmail(value)
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if (reg.test(value) == false) 
	{
		return false;
	}
	return true;
}



//cac tham so url dc gui vào 
var Url_hadling_user='';
var Url_hadling_customer='';

function GetUrl_hadling_user(url)
{
	Url_hadling_user=url;
	
}

function GetUrl_hadling_customer(url)
{
	Url_hadling_customer=url;
	
}

function GetUrl_hadling_group(url)
{
	Url_hadling_group=url;
	
}


//form usser/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






// $('#provinces').change(function(){
// 	ajax_district('provinces','district');// load danh huyen theo thanh pho form create user
// 	$('#wards').empty();
// 	$('#district').empty();		
// });

// $('#district').click(function(){
// 	ajax_wards('district','wards');// load danh sach phuong xa. 
// });



// $('#district').change(function(){
// 	ajax_wards('district','wards');// load danh sach phuong xa. 
// });


function create_user()
{
	if(validate_form_Create_user()==false)
	{
		return false;
	}

	update_user('create')
}

function update_form_user()
{
	if(validate_form_Update_user()==false)
	{
		return false;
	}
	update_user('update');
}

// $('#btn_craete_user').click(function(){
// 	if(validate_form_Create_user()==false)
// 	{
// 		return false;
// 	}

// 	update_user('create');

// });

function loadDistrict()//load danh sach huyen form edit user
{
	ajax_district('provinces_edit','district_edit');
	$('#wards_edit').empty();
	$('#district_edit').empty();		
}

function loadWards()//load danh sach phuong form edit user
{
	ajax_wards('district_edit','wards_edit');
}

// $('#btn_update_user').click(function(){
// 	if(validate_form_Update_user()==false)
// 	{
// 		return false;
// 	}
// 	update_user('update');

// });







function edit_user(id_user)//load from ediuser
{
		var handling='load_form_edit_user';//handling		
		$.ajax({       
			url: Url_hadling_user,
			data: { id_user:id_user,handling:handling},
			type: 'get',
			dataType: 'html',
			traditional: true,  
			success: function (data) {
				$("#div_edit_user").html(data); 
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {
				
			}
		});
}


function show_profile(id_user)//load from ediuser
{

		var handling='show_profile_user';//handling		
		$.ajax({       
			url: Url_hadling_user,
			data: { id_user:id_user,handling:handling},
			type: 'get',
			dataType: 'html',
			traditional: true,  
			success: function (data) {
				$("#div_user").toggle(1500);

				$("#div_show_profile_user").show();
				$("#div_show_profile_user").html(data); 
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {
				
			}
		});
}




function chang_img_create_user(){
	var file=document.forms["frmCreateUser"].elements["img_user"].value;
      if(file.length>0)
      {
          if (window.File && window.FileReader && window.FileList && window.Blob)
          {
              // lay dung luong va kieu file tu the input file
              var fsize = $('#img_user')[0].files[0].size;
              var ftype = $('#img_user')[0].files[0].type;
              var fname = $('#img_user')[0].files[0].name;      
                  switch(ftype)
                  {
                    case 'image/png':
                    case 'image/jpeg':
                    case 'image/pjpeg':                
                    break;
                    default:
                    swal("Khùng hả mậy","có phải file ảnh không?", "warning");
                    $('#img_user').val('');
                    return false;  
                  }
                  if(fsize>4048576) //thuc hien dieu gi do neu dung luong file vuot qua 4MB
                  {
                      swal("Kích thước lớn hơn 4MB","không hỗ trợ", "warning");   
                      $('#img_user').val('');
                      return false;
                  }

                  var fileInput = document.forms["frmCreateUser"].elements["img_user"];
                  if (fileInput.files && fileInput.files[0]) 
                  {
                  	var reader = new FileReader();
                  	reader.onload = function(e) { 
                  		document.getElementById('img_review').innerHTML = '<img class="wd-80 rounded-circle" style="height: 100px;width: 100px;" src="'+e.target.result+'"/>';
                  	};
                  	reader.readAsDataURL(fileInput.files[0]);
                  }



          }
          else
          {
            swal("Trình duyệt","không hỗ trợ", "warning");
            return false;   
          }
      }
      else
      {
      	 swal("Vui lòng chọn ảnh","please", "warning");   
      	 return false;
      }      
}

function chang_img_edit_user()
{
	var file=document.forms["frmEditteUser"].elements["img_user_edit"].value;
      if(file.length>0)
      {
          if (window.File && window.FileReader && window.FileList && window.Blob)
          {
              // lay dung luong va kieu file tu the input file
              var fsize = $('#img_user_edit')[0].files[0].size;
              var ftype = $('#img_user_edit')[0].files[0].type;
              var fname = $('#img_user_edit')[0].files[0].name;      
                  switch(ftype)
                  {
                    case 'image/png':
                    case 'image/jpeg':
                    case 'image/pjpeg':                
                    break;
                    default:
                    swal("Khùng hả mậy","có phải file ảnh không?", "warning"); 
                    $('#img_user_edit').val('');
                    return false;  
                  }
                  if(fsize>4048576) //thuc hien dieu gi do neu dung luong file vuot qua 4MB
                  {
                      swal("Kích thước lớn hơn 4MB","không hỗ trợ", "warning");   
                      $('#img_user_edit').val('');
                      return false;
                  }

                  var fileInput = document.forms["frmEditteUser"].elements["img_user_edit"];
                  if (fileInput.files && fileInput.files[0]) 
                  {
                  	var reader = new FileReader();
                  	reader.onload = function(e) { 
                  		document.getElementById('img_review_edit').innerHTML = '<img class="wd-80 rounded-circle" style="height: 100px;width: 100px;" src="'+e.target.result+'"/>';
                  	};
                  	reader.readAsDataURL(fileInput.files[0]);
                  }



          }
          else
          {
            swal("Trình duyệt","không hỗ trợ", "warning");
            return false;   
          }
      }
      else
      {
      	 swal("Vui lòng chọn ảnh","please", "warning");   
      	 return false;
      }  
}



//validate form add user
function validate_form_Create_user()
{

	var txtfullname=document.forms["frmCreateUser"].elements["txtfullname"].value;
	$('#txtfullname-error').remove();
	$('#div_txtfullname').attr('class','form-group has-success');
	if($.trim(txtfullname)=='')
	{	
		$('#div_txtfullname').attr('class','form-group has-error');
		$('#txtfullname').after('<span id="txtfullname-error" class="help-block">Không được rỗng</span>');
		return false;
	}	

	var txtsex=document.forms["frmCreateUser"].elements["txtsex"].value;
	if($.trim(txtsex)=='')
	{	
		$('#div_txtsex').attr('class','form-group has-error');
		$('#txtsex').after('<span id="txtfullname-error" class="help-block">Liên hệ quản trị</span>');
		return false;
	}	


	var txtphone=document.forms["frmCreateUser"].elements["txtphone"].value;
	$('#txtphone-error').remove();
	$('#div_txtphone').attr('class','form-group has-success');
	if($.trim(txtphone)=='')
	{	
		$('#div_txtphone').attr('class','form-group has-error');
		$('#txtphone').after('<span id="txtphone-error" class="help-block">Không được rỗng</span>');
		return false;
	}
	else
	{
		if(checkPhone(txtphone)==false)
		{
			$('#div_txtphone').attr('class','form-group has-error');
			$('#txtphone').after('<span id="txtphone-error" class="help-block">Điện thoại không đúng</span>');
			return false;
		}
	}


	var txtemail=document.forms["frmCreateUser"].elements["txtemail"].value;
	$('#txtemail-error').remove();
	$('#div_txtemail').attr('class','form-group has-success');

	if($.trim(txtemail)=='')
	{	
		$('#div_txtemail').attr('class','form-group has-error');
		$('#txtemail').after('<span id="txtemail-error" class="help-block">Không được rỗng</span>');
		return false;
	}
	else
	{
		if(checkEmail(txtemail)==false)
		{
			$('#div_txtemail').attr('class','form-group has-error');
			$('#txtemail').after('<span id="txtemail-error" class="help-block">Email không đúng</span>');
			return false;
		}
		else
		{
			$('#txtemail-error').remove();
	        $('#div_txtemail').attr('class','form-group has-success');
			
			var url=Url_hadling_user;
			var handling='check_email_exist';
			var txtemail=$("#txtemail").val();
			$.ajax({       
				url: url,
				data: { txtemail:txtemail,handling:handling},
				type: 'get',
				dataType: 'html',
				traditional: true,  
				success: function (data) {
					if(data!=0)
					{
						$('#div_txtemail').attr('class','form-group has-error');
						$('#txtemail').after('<span id="txtemail-error" class="help-block">Tồn tại rồi bạn ơi!</span>');
					}
				},
				error: function (jqXHR,xhr, ajaxOptions, thrownError) {
					
				}
			});
		}
	}

	var txtpassword=document.forms["frmCreateUser"].elements["txtpassword"].value;
	$('#txtpassword-error').remove();
	$('#div_txtpassword').attr('class','form-group has-success');
	if($.trim(txtpassword)=='')
	{	
		$('#div_txtpassword').attr('class','form-group has-error');
		$('#txtpassword').after('<span id="txtpassword-error" class="help-block">Không được rỗng</span>');
		return false;
	}
	else
	{

		 if(txtpassword.length <6 || txtpassword.length>8)
          {
          	$('#div_txtpassword').attr('class','form-group has-error');
          	$('#txtpassword').after('<span id="txtpassword-error" class="help-block">Mật khẩu từ 6-8 ký tự</span>');
          	return false;
          }
	}



	var provinces=document.forms["frmCreateUser"].elements["provinces"].value;

	if($.trim(provinces)=='')
	{	
		$('#div_provinces').attr('class','form-group has-error');
		$('#provinces').after('<span id="provinces-error" class="help-block">Liên hệ quản trị</span>');
		return false;
	}

	var district=document.forms["frmCreateUser"].elements["district"].value;

	$('#district-error').remove();
	$('#div_district').attr('class','form-group has-success');
	if($.trim(district)=='')
	{	
		$('#div_district').attr('class','form-group has-error');
		$('#district').after('<span id="district-error" class="help-block">Không được trống</span>');
		return false;
	}

	var wards=document.forms["frmCreateUser"].elements["wards"].value;
	$('#wards-error').remove();
	$('#div_wards').attr('class','form-group has-success');
	if($.trim(wards)=='')
	{	
		$('#div_wards').attr('class','form-group has-error');
		$('#wards').after('<span id="wards-error" class="help-block">Không được trống</span>');
		return false;
	}	

	var txtaddress=document.forms["frmCreateUser"].elements["txtaddress"].value;
	$('#txtaddress-error').remove();
	$('#div_txtaddress').attr('class','form-group has-success');
	if($.trim(txtaddress)=='')
	{	
		$('#div_txtaddress').attr('class','form-group has-error');
		$('#txtaddress').after('<span id="txtaddress-error" class="help-block">Không được trống</span>');
		return false;
	}	
	
	var txtbranch=document.forms["frmCreateUser"].elements["txtbranch"].value;
	if($.trim(txtfullname)=='')
	{	
		$('#txtbranch').attr('class','form-control parsley-error');
		$('#txtbranch').after('<ul class="parsley-errors-list filled" id="txtbranch-error"><li class="parsley-required">Không được rỗng</li></ul>');
		return false;
	}	
	

	var file=document.forms["frmCreateUser"].elements["img_user"].value;
      if(file.length>0)
      {
          if (window.File && window.FileReader && window.FileList && window.Blob)
          {
              // lay dung luong va kieu file tu the input file
              var fsize = $('#img_user')[0].files[0].size;
              var ftype = $('#img_user')[0].files[0].type;
              var fname = $('#img_user')[0].files[0].name;      
                  switch(ftype)
                  {
                    case 'image/png':
                    case 'image/jpeg':
                    case 'image/pjpeg':                
                    break;
                    default:
                    swal("Khùng hả mậy","có phải file ảnh không?", "warning"); 
                    $('#img_user').val('');
                    return false;  
                  }
                  if(fsize>4048576) //thuc hien dieu gi do neu dung luong file vuot qua 4MB
                  {
                      swal("Kích thước lớn hơn 4MB","không hỗ trợ", "warning");   
                      $('#img_user').val('');
                      return false;
                  }

                  var fileInput = document.forms["frmCreateUser"].elements["img_user"];
                  if (fileInput.files && fileInput.files[0]) 
                  {
                  	var reader = new FileReader();
                  	reader.onload = function(e) { 
                  		document.getElementById('img_review').innerHTML = '<img class="wd-80 rounded-circle" style="height: 100px;width: 100px;" src="'+e.target.result+'"/>';
                  	};
                  	reader.readAsDataURL(fileInput.files[0]);
                  }



          }
          else
          {
            swal("Trình duyệt","không hỗ trợ", "warning");
            return false;   
          }
      }
      else
      {
      	 swal("Vui lòng chọn ảnh","please", "warning");   
      	 return false;
      }     

}

//validate form add user
function validate_form_Update_user()
{

	var txtfullname=document.forms["frmEditteUser"].elements["txtfullname_edit"].value;
	$('#txtfullname_edit-error').remove();
	$('#div_txtfullname_edit').attr('class','form-group has-success');
	if($.trim(txtfullname)=='')
	{	
		$('#div_txtfullname_edit').attr('class','form-group has-error');
		$('#txtfullname_edit').after('<span id="txtfullname_edit-error" class="help-block">Không được rỗng</span>');
		return false;
	}	

	var txtsex=document.forms["frmEditteUser"].elements["txtsex_edit"].value;
	if($.trim(txtsex)=='')
	{	
		$('#div_txtsex_edit').attr('class','form-group has-error');
		$('#txtsex_edit').after('<span id="txtfullname_edit-error" class="help-block">Liên hệ quản trị</span>');
		return false;
	}	


	var txtphone=document.forms["frmEditteUser"].elements["txtphone_edit"].value;
	$('#txtphone_edit-error').remove();
	$('#div_txtphone_edit').attr('class','form-group has-success');
	if($.trim(txtphone)=='')
	{	
		$('#div_txtphone_edit').attr('class','form-group has-error');
		$('#txtphone_edit').after('<span id="txtphone_edit-error" class="help-block">Không được rỗng</span>');
		return false;
	}
	else
	{
		if(checkPhone(txtphone)==false)
		{
			$('#div_txtphone_edit').attr('class','form-group has-error');
			$('#txtphone_edit').after('<span id="txtphone_edit-error" class="help-block">Điện thoại không đúng</span>');
			return false;
		}
	}


	var txtemail=document.forms["frmEditteUser"].elements["txtemail_edit"].value;
	$('#txtemail_edit-error').remove();
	$('#div_txtemail').attr('class','form-group has-success');

	if($.trim(txtemail)=='')
	{	
		$('#div_txtemail_edit').attr('class','form-group has-error');
		$('#txtemail_edit').after('<span id="txtemail_edit-error" class="help-block">Không được rỗng</span>');
		return false;
	}
	else
	{
		if(checkEmail(txtemail)==false)
		{
			$('#div_txtemail_edit').attr('class','form-group has-error');
			$('#txtemail_edit').after('<span id="txtemail_edit-error" class="help-block">Email không đúng</span>');
			return false;
		}
		else
		{
			$('#txtemail_edit-error').remove();
	        $('#div_txtemail_edit').attr('class','form-group has-success');
			
			var url=Url_hadling_user;
			var handling='check_email_exist_not_id';
			var txtemail=$("#txtemail_edit").val();

			var id_user=$("#txtid_user_edit").val();

			$.ajax({       
				url: url,
				data: { txtemail:txtemail,handling:handling,id_user:id_user},
				type: 'get',
				dataType: 'html',
				traditional: true,  
				success: function (data) {
					if(data!=0)
					{
						$('#div_txtemail_edit').attr('class','form-group has-error');
						$('#txtemail_edit').after('<span id="txtemail_edit-error" class="help-block">Tồn tại rồi bạn ơi!</span>');
					}
				},
				error: function (jqXHR,xhr, ajaxOptions, thrownError) {
					
				}
			});
		}
	}

	var txtpassword=document.forms["frmEditteUser"].elements["txtpassword_edit"].value;
	$('#txtpassword_edit-error').remove();
	$('#div_txtpassword_edit').attr('class','form-group has-success');
	
	if($.trim(txtpassword)!='')
	{	
		if(txtpassword.length <6 || txtpassword.length>8)
          {
          	$('#div_txtpassword_edit').attr('class','form-group has-error');
          	$('#txtpassword_edit').after('<span id="txtpassword_edit-error" class="help-block">Mật khẩu từ 6-8 ký tự</span>');
          	return false;
          }
	}


	var provinces=document.forms["frmEditteUser"].elements["provinces_edit"].value;

	if($.trim(provinces)=='')
	{	
		$('#div_provinces_edit').attr('class','form-group has-error');
		$('#provinces_edit').after('<span id="provinces_edit-error" class="help-block">Liên hệ quản trị</span>');
		return false;
	}

	var district=document.forms["frmEditteUser"].elements["district_edit"].value;

	$('#district_edit-error').remove();
	$('#div_district_edit').attr('class','form-group has-success');
	if($.trim(district)=='')
	{	
		$('#div_district_edit').attr('class','form-group has-error');
		$('#district_edit').after('<span id="district_edit-error" class="help-block">Không được trống</span>');
		return false;
	}

	var wards=document.forms["frmEditteUser"].elements["wards_edit"].value;
	$('#wards_edit-error').remove();
	$('#div_wards_edit').attr('class','form-group has-success');
	if($.trim(wards)=='')
	{	
		$('#div_wards_edit').attr('class','form-group has-error');
		$('#wards_edit').after('<span id="wards_edit-error" class="help-block">Không được trống</span>');
		return false;
	}	

	var txtaddress=document.forms["frmEditteUser"].elements["txtaddress_edit"].value;
	$('#txtaddress_edit-error').remove();
	$('#div_txtaddress_edit').attr('class','form-group has-success');
	if($.trim(txtaddress)=='')
	{	
		$('#div_txtaddress_edit').attr('class','form-group has-error');
		$('#txtaddress_edit').after('<span id="txtaddress_edit-error" class="help-block">Không được trống</span>');
		return false;
	}	
	
	var txtbranch=document.forms["frmEditteUser"].elements["txtbranch_edit"].value;
	if($.trim(txtfullname)=='')
	{	
		$('#txtbranch_edit').attr('class','form-control parsley-error');
		$('#txtbranch_edit').after('<span id="txtbranch_edit-error" class="help-block">Không được trống</span>');
		return false;
	}	
	

	var file=document.forms["frmEditteUser"].elements["img_user_edit"].value;
      if(file.length>0)
      {
          if (window.File && window.FileReader && window.FileList && window.Blob)
          {
              // lay dung luong va kieu file tu the input file
              var fsize = $('#img_user_edit')[0].files[0].size;
              var ftype = $('#img_user_edit')[0].files[0].type;
              var fname = $('#img_user_edit')[0].files[0].name;      
                  switch(ftype)
                  {
                    case 'image/png':
                    case 'image/jpeg':
                    case 'image/pjpeg':                
                    break;
                    default:
                    swal("Khùng hả mậy","có phải file ảnh không?", "warning"); 
                    $('#img_user_edit').val('');
                    return false;  
                  }
                  if(fsize>4048576) //thuc hien dieu gi do neu dung luong file vuot qua 4MB
                  {
                      swal("Kích thước lớn hơn 4MB","không hỗ trợ", "warning");   
                      $('#img_user_edit').val('');
                      return false;
                  }

                  var fileInput = document.forms["frmEditteUser"].elements["img_user_edit"];
                  if (fileInput.files && fileInput.files[0]) 
                  {
                  	var reader = new FileReader();
                  	reader.onload = function(e) { 
                  		document.getElementById('img_review_edit').innerHTML = '<img class="wd-80 rounded-circle" style="height: 100px;width: 100px;" src="'+e.target.result+'"/>';
                  	};
                  	reader.readAsDataURL(fileInput.files[0]);
                  }



          }
          else
          {
            swal("Trình duyệt","không hỗ trợ", "warning");
            return false;   
          }
      }
      else
      {
      	 // swal("Vui lòng chọn ảnh","please", "warning");   
      	 // return false;
      }     

}


function update_user(handling)//create va update user
{

	if(handling=='create')
	{ 
		var _token=document.forms["frmCreateUser"].elements["_token"].value;
		var form_data = new FormData(document.forms.frmCreateUser);

		form_data.append('handling', handling);   // add haading xu ly ben controller

		var url=Url_hadling_user;
		$.ajax({
			headers: { 'X-CSRF-TOKEN': _token},
			url: url,
			data: form_data,
			type: 'Post',
			contentType: false,
			processData: false,
			cache:false,
			success:function(data)
			{
				if(data=='true')
				{
					swal({
						title: "Thêm người dùng tiếp",
						text: "",
						icon: "success",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => 
					{
						if (willDelete) {

							resetForm('frmCreateUser');
							$('#img_review').empty();
						} 
						else 
						{
							handling_route('admin.user.list','List_user');
						}
					});
				}
				else
				{
					swal("Thêm mới","không thành công", "warning");   
				}				
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {

			}

		});
	}

	
	if (handling=='update') 
	{
		var _token=document.forms["frmEditteUser"].elements["_token"].value;
		var form_data = new FormData(document.forms.frmEditteUser);
		form_data.append('handling', handling);   // add haading xu ly ben controller

		var url=Url_hadling_user;
		$.ajax({
			headers: { 'X-CSRF-TOKEN': _token},
			url: url,
			data: form_data,
			type: 'Post',
			contentType: false,
			processData: false,
			cache:false,
			success:function(data)
			{ 
				//$.toaster({ priority : 'success', title : 'Title', message : 'Your message here'});
				if(data=='true')
				{ 
					   swal("Thành công","Cập nhật thành công", "success");
				}
				else
				{
					 swal("Thêm mới","không thành công", "warning");   success
				}		
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {
				 
			}

			});
	}
	
}




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


// ========================================================================================================================================================================
// Quan ly group

$('#btn_create_group').click(function(){
	if(validate_form_Create_group()==false)
	{
		return false;
	}

	update_group('create');

});
function validate_form_Create_group()
{
	
	var txtfullname=document.forms["frmCreateGroup"].elements["txtfullname"].value;
	$('#txtfullname-error').remove();
	$('#div_txtfullname').attr('class','form-group has-success');
	if($.trim(txtfullname)=='')
	{	
		$('#div_txtfullname').attr('class','form-group has-error');
		$('#txtfullname').after('<span id="txtfullname-error" class="help-block">Không được rỗng</span>');
		return false;
	}	
}

function update_group(handling)
{
	if(handling=='create')
	{ 
		var _token=document.forms["frmCreateGroup"].elements["_token"].value;
		var form_data = new FormData(document.forms.frmCreateGroup);

		form_data.append('handling', handling);   // add haading xu ly ben controller

		var url=Url_hadling_group;
		$.ajax({
			headers: { 'X-CSRF-TOKEN': _token},
			url: url,
			data: form_data,
			type: 'Post',
			contentType: false,
			processData: false,
			cache:false,
			success:function(data)
			{
				
				if(data=='true')
				{
					swal({
						title: "Thêm nhóm tiếp",
						text: "",
						icon: "success",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => 
					{
						if (willDelete) {

							resetForm('frmCreateGroup');
							$('#img_review').empty();
						} 
						else 
						{
							resetForm('frmCreateGroup');
							location.reload();
						}
					});
				}
				else
				{
					swal("Thêm mới","không thành công", "warning");   
				}				
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {

			}

		});
	}
	



}


///////////////////////////////////////////////////////////
// quan ly customer




function show_profile_customer(id_customer)//load from ediuser
{

		var handling='show_profile_customer';//handling		
		$.ajax({       
			url: Url_hadling_customer,
			data: { id_customer:id_customer,handling:handling},
			type: 'get',
			dataType: 'html',
			traditional: true,  
			success: function (data) {
				$("#div_customer").toggle(1500);

				$("#div_show_profile_customer").show();
				$("#div_show_profile_customer").html(data); 
			},
			error: function (jqXHR,xhr, ajaxOptions, thrownError) {
				
			}
		});
}
