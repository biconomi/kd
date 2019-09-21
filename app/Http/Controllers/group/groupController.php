<?php

namespace App\Http\Controllers\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

use DB;
use Yajra\DataTables\DataTables;
use Laratrust;
use App\Group;
class groupController extends HomeController
{
    protected $Subfolder='admin.page.group';

    public function group_list()
    {
    	$page='.group_list';
        $title_page='Group.list';
        $lable_title='List-group';
        $class_li_active='group';
        $branch=$this->load_branch();

        return view('backend.home')
                ->with('page',$this->sub_include.$this->Subfolder.$page)
                ->with('lable_title',$lable_title)
                ->with('title_page',$title_page)
                ->with('class_li_active',$class_li_active)
                ->with('branch',$branch);
    }
        //xu cac yeu cau cua form group
    public function handling_ajax_group(Request $request)
    {
        if($request->handling=='load_list_group')//load danh sach group
        {  
           
            $group = DB::table('group')
                ->select( 'group.gr_id','group.gr_name');

            return DataTables::of($group)
                    ->setRowId(function ($group) {
                        return $group->gr_id;
                    })
                    
                    ->addColumn('action', function ($group) {
                        return '
                        <a href="#" class="btn btn-outline-primary  id=""><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-primary  id=""><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-primary  id=""><i class="fa fa-edit"></i></a>                        
                        ';
                    })
             ->rawColumns(['action'])
            ->toJson();

        }       

        
        if($request->handling=='')// khong có tham so tih chuyen ve trang chu.
        {
            return $this->index();
        }

    }


      // ajax save group
    public function update_group(Request $request)
    {
        //them group 
        
        try 
        {   
            if($request->get('handling')=='create')
            {
               
                    $group=new Group();
                    $group->gr_name=$request->txtfullname;
                    $group->br_id=$request->txtbranch; 
                    $group->save();
                    return 'true';
            }
        } 
        catch (ModelNotFoundException $exception) 
        {
            return 'false';
        }
       
    }
}
