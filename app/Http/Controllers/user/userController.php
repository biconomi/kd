<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use DB;
use Yajra\DataTables\DataTables;
use Laratrust;
use App\User;

class userController extends HomeController
{
    protected $Subfolder='admin.page.user';
    

    public function user_list()
    {
    	$page='.user_list';
        $title_page='User.list';
        $lable_title='List-user';
        $class_li_active='user';

        $provinces=$this->load_provinces();//danh sach thanh pho
        $branch=$this->load_branch();

        return view('backend.home')
                ->with('page',$this->sub_include.$this->Subfolder.$page)
                ->with('lable_title',$lable_title)
                ->with('title_page',$title_page)
                ->with('provinces',$provinces)
                ->with('branch',$branch)
                ->with('class_li_active',$class_li_active);      //thong tin option chi nhánh
    }

    //xu cac yeu cau cua form user
    public function handling_ajax_user(Request $request)
    {

        if($request->handling=='load_form_edit_user')//load danh sach user
        { 
            $provinces=$this->load_provinces();//danh sach thanh pho
            $branch=$this->load_branch();
            
            $edit_user=DB::table('users')
                        ->where('id','=',$request->id_user)
                        ->first();
            $district_edit=DB::table('district')
                        ->where('pr_id','=',$edit_user->pr_id)
                        ->get();
            $wards_edit=DB::table('wards')
                        ->where('id_dis','=',$edit_user->id_dis)
                        ->get(); 

            return view('backend.admin.page.user.edit_user')
                    ->with('provinces',$provinces)
                    ->with('branch',$branch)
                    ->with('district_edit',$district_edit)
                    ->with('wards_edit',$wards_edit)
                    ->with('edit_user',$edit_user);
        }

        if($request->handling=='load_list_user')//load danh sach user
        {  

            $users = DB::table('users')
                ->join('provinces', 'users.pr_id', '=', 'provinces.pr_id')
                ->join('district', 'users.id_dis', '=', 'district.id_dis')
                ->select( 'users.id','users.name','users.sex','users.email','users.phone','users.created_at','users.status','users.img','district.dis_name');

            return DataTables::of($users)
                    ->setRowId(function ($users) {
                        return $users->id;
                    })
                    ->addColumn('sex', function ($users) {
                        return $users->sex== 0 ? 'Nam' : 'Nữ';
                    })

                    ->addColumn('status', function ($users) {
                        return $users->status== 1 ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>';
                    })
                    ->addColumn('img', function ($users) {
                        return '<img class="direct-chat-img" src='.url('adminlte/upload/user/'.$users->img).' alt="message user image">';
                    })

                    ->addColumn('action', function ($users) {
                        return '
                        <a href="#" class="btn btn-outline-primary"  id="btn-edit-user" onclick= edit_user('.$users->id.') data-toggle="modal" data-target="#modal-edit_user"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"  id="btn_permission" onclick="permission();"><i class="fa fa-cog text-warning"></i></a>
                        <a href="#" class="btn btn-outline-danger"  id="" onclick="show_profile('.$users->id.')"><i class="fa fa-eye"></i></i></a>
                        <a href="#" class="btn btn-outline-primary"  id=""><i class="fa fa-trash text-danger"></i></a>                        
                        ';
                    })
             ->rawColumns(['action','sex','status','img'])
            ->toJson();

        }       

        if($request->handling=='check_email_exist')//check ton tai email
        {                  
            return $this->check_email_exist($request->get('txtemail'));           
        }


        if($request->handling=='check_email_exist_not_id')//check ton tai email
        {           
            return $this->check_email_exist_and_id($request->get('txtemail'),$request->get('id_user'));           
        }

        if($request->handling=='show_profile_user')//check ton tai email
        {           
           return $this->show_profile_user($request->get('id_user'));
        }



        if($request->handling=='')// khong có tham so tih chuyen ve trang chu.
        {
            return $this->index();
        }

    }

    public function show_profile_user($id_user)
    {
        $show_profile=DB::table('users')
                        ->join('provinces', 'users.pr_id', '=', 'provinces.pr_id')
                        ->join('district', 'users.id_dis', '=', 'district.id_dis')
                        ->join('wards', 'users.wa_id', '=', 'wards.wa_id')

                        ->where('id','=',$id_user)

                        ->first();
        return view('backend.admin.page.user.profile')
                ->with('show_profile',$show_profile);
    }

    public function check_email_exist($Value_email)
    {
        $numbermail=count(DB::table('users')->where('email','=',$Value_email)->get());
        return $numbermail;
    }

    public function check_email_exist_and_id($Value_email,$id_user)
    {
        $numbermail=count(DB::table('users')
                                    ->where('email','=',$Value_email)
                                    ->where('id','<>',$id_user)
                                    ->get());
        return $numbermail;
    }

    public function check_user_exist($Value_id)
    {
        $numberuser=count(DB::table('users')->where('id','=',$Value_id)->get());
        return $numberuser;
    }

     // ajax save nhân vien 
    public function update_user(Request $request)
    {
        //them nhan vien moi     
        try 
        {   
            if($request->get('handling')=='create')
            {
                if($this->check_email_exist($request->txtemail)==0)
                {

                    $users=new User();
                    $users->name=$request->txtfullname;
                    $users->sex=$request->txtsex;    
                    $users->phone=$request->txtphone;      
                    $users->pr_id=$request->provinces;
                    $users->id_dis=$request->district;      
                    $users->address=$request->txtaddress;      
                    $users->email=$request->txtemail;     
                    $users->br_id=$request->txtbranch; 
                    $users->wa_id=$request->wards;      
                    $users->password=bcrypt($request->txtpassword); 

                    if($request->hasFile('img_user'))
                    {
                        $inputimg=$request->img_user;
                        $type_inputing=$inputimg->getClientOriginalExtension();

                // if($type_inputing!='JPG' && $type_inputing!='PNG'&&$type_inputing!='jpg' && $type_inputing!='png')
                //     {
                //         return "false";
                //     }

                        $name_img=rand().time().'.'.$type_inputing;

                //return 'Uploads/'.$it_general_setup->gs_parameter;
                // if(file_exists('backend/user/img/'.$user->img))
                // {   
                //     //return 'ton tai';             
                //     \File::delete('backend/user/img/'.$user->img); 
                // }
                        $inputimg->move('adminlte/upload/user/',$name_img);
                        $users->img=$name_img; 
                    }        

                    $users->save();
                    return 'true';
                } 
                else
                {
                    return 'false';
                }     
            }

            if($request->get('handling')=='update')
            {   
                if($this->check_user_exist($request->txtid_user_edit)>0)
                {
                    if($this->check_email_exist_and_id($request->txtemail_edit,$request->txtid_user_edit)>0)
                    {
                        return 'false';
                    }


                    $user_edit =user::find($request->txtid_user_edit);    
                    $user_edit->name=$request->txtfullname_edit;
                    $user_edit->sex=$request->txtsex_edit;    
                    $user_edit->phone=$request->txtphone_edit;      
                    $user_edit->pr_id=$request->provinces_edit;
                    $user_edit->id_dis=$request->district_edit;      
                    $user_edit->wa_id=$request->wards_edit;   
                    $user_edit->address=$request->txtaddress_edit;      
                    //$user_edit->email=$request->txtemail_edit;

                    $user_edit->br_id=$request->txtbranch_edit;

                    if(!empty($request->txtpassword_edit))
                    {
                        $user_edit->password=bcrypt($request->txtpassword_edit);
                    }


                    if($request->hasFile('img_user_edit'))
                    {

                        $inputimg=$request->img_user_edit;
                        $type_inputing=$inputimg->getClientOriginalExtension();

                        if($type_inputing!='JPG' && $type_inputing!='PNG'&&$type_inputing!='jpg' && $type_inputing!='png')
                            {
                                return "false";
                            }

                        $name_img=rand().time().'.'.$type_inputing;

                        if(file_exists('adminlte/upload/user/'.$user_edit->img))
                        {   
                            //return 'ton tai';             
                            \File::delete('adminlte/upload/user/'.$user_edit->img); 
                        }
                        $inputimg->move('adminlte/upload/user/',$name_img);
                        $user_edit->img=$name_img; 
                    }

                
                    $user_edit->save();
                    return 'true';
                }
                else
                {
                    return 'false';
                }
            }
                  
        } 
        catch (ModelNotFoundException $exception) 
        {
            return 'false';
        }
       
    }
    

}
