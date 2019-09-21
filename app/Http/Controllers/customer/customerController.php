<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use DB;
use Yajra\DataTables\DataTables;
use Laratrust;

class customerController extends HomeController
{
    protected $Subfolder='business.page.customer';

    public function customer_list()
    {
    	$page='.customer_list';
        $title_page='Customer.list';
        $lable_title='List-customer';
        $class_li_active='dskh';

        return view('backend.home')
                ->with('page',$this->sub_include.$this->Subfolder.$page)
                ->with('lable_title',$lable_title)
                ->with('title_page',$title_page)
                ->with('class_li_active',$class_li_active);
    }


       //xu cac yeu cau cua form customer
     public function handling_ajax_customer(Request $request)
    {
        if($request->handling=='load_list_customer')//load danh sach user
        {  
            $branch=$this->load_branch();
            $customer = DB::table('customer')
                ->join('provinces', 'customer.pr_id', '=', 'provinces.pr_id')
                ->join('district', 'customer.dis_id', '=', 'district.id_dis')
                ->select( 'customer.cus_id','customer.cus_name','customer.cus_nickname','customer.cus_sex','customer.cus_phone1','customer.cus_phone2','provinces.pr_name','district.dis_name');            

            return DataTables::of($customer)
                    ->setRowId(function ($customer) {
                        return $customer->cus_id;
                    })
                    ->addColumn('cus_sex', function ($customer) {
                        return $customer->cus_sex== 0 ? 'Nam' : 'Nữ';
                    })
                    
                    // ->addColumn('cus_status', function ($customer) {
                    //     return $customer->cus_status== 1 ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>';
                    // })

                    // ->addColumn('cus_img', function ($customer) {
                    //     return '<img class="direct-chat-img" src='.url('adminlte/upload/user/'.$customer->cus_img).' alt="message user image">';
                    // })
                   ->addColumn('action', function ($customer) {
                        return '
                        <a href="#" class="btn btn-outline-primary"  id="btn-edit-user" onclick= edit_user('.$customer->cus_id.') data-toggle="modal" data-target="#modal-edit_user"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"  id="btn_permission" onclick="permission();"><i class="fa fa-cog text-warning"></i></a>
                        <a href="#" class="btn btn-outline-danger"  id="" onclick="show_profile_customer('.$customer->cus_id.')"><i class="fa fa-eye"></i></i></a>
                        <a href="#" class="btn btn-outline-primary"  id=""><i class="fa fa-trash text-danger"></i></a>                        
                        ';
                    })
             ->rawColumns(['action','cus_sex'])
            ->toJson();

        }
        if($request->handling=='show_profile_customer')//show profile customer
        {
            return $this->show_profile_customer($request->get('id_customer'));
        }
        
        if($request->handling=='')// khong có tham so tih chuyen ve trang chu.
        {
            return $this->index();
        }

    }

     public function show_profile_customer($id_customer)
    {
        $show_profile=DB::table('customer')
                        // ->join('provinces', 'users.pr_id', '=', 'provinces.pr_id')
                        // ->join('district', 'users.id_dis', '=', 'district.id_dis')
                        // ->join('wards', 'users.wa_id', '=', 'wards.wa_id')

                        ->where('cus_id','=',$id_customer)
                        ->first();
        return view('backend.business.page.customer.profile_customer')
                ->with('show_profile',$show_profile);
    }




    // public function handling_ajax_customer(Request $request)
    // {
    //     if($request->handling=='load_list_customer')//load danh sach user
    //     {  
    //         $branch=$this->load_branch();
    //         $customer = DB::table('customer')
    //             ->join('provinces', 'customer.pr_id', '=', 'provinces.pr_id')
    //             ->join('district', 'customer.dis_id', '=', 'district.id_dis')
    //             ->join('wards', 'customer.war_id', '=', 'wards.wa_id')
    //             ->join('identity', 'customer.ide_id', '=', 'identity.ide_id')
    //             ->select( 'customer.cus_id','customer.cus_name','customer.cus_nickname','customer.cus_sex','customer.cus_phone1','customer.cus_phone2','customer.cus_phone3','customer.cus_phone4','customer.pr_id','customer.dis_id','customer.war_id','customer.cus_address','customer.cus_email','customer.cus_birthday','customer.cus_img','customer.ide_id','customer.ide_conten','customer.date_of_issue_ide','customer.place_of_issue_ide','customer.bank_id','customer.bank_content','customer.cus_company','customer.tax_code','customer.cus_status','customer.cus_type','district.dis_name','provinces.pr_name','wards.wa_name','identity.ide_name'

    //         );

            

    //         return DataTables::of($customer)
    //                 ->setRowId(function ($customer) {
    //                     return $customer->cus_id;
    //                 })
    //                 ->addColumn('cus_sex', function ($customer) {
    //                     return $customer->cus_sex== 0 ? 'Nam' : 'Nữ';
    //                 })
    //                 ->addColumn('cus_status', function ($customer) {
    //                     return $customer->cus_status== 1 ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>';
    //                 })

    //                 ->addColumn('cus_img', function ($customer) {
    //                     return '<img class="direct-chat-img" src='.url('adminlte/upload/user/'.$customer->cus_img).' alt="message user image">';
    //                 })
    //                 ->addColumn('action', function ($customer) {
    //                     return '
    //                     <a href="#" class="btn btn-outline-primary  id=""><i class="fa fa-edit"></i></a>
    //                     <a href="#" class="btn btn-outline-warning  id=""><i class="fa fa-times"></i></a>                        
    //                     ';
    //                 })
    //          ->rawColumns(['action','cus_sex','cus_status','cus_img'])
    //         ->toJson();

    //     }       

        
    //     if($request->handling=='')// khong có tham so tih chuyen ve trang chu.
    //     {
    //         return $this->index();
    //     }

    // }
}
