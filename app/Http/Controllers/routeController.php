<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\user\userdemo;
use App\Http\Controllers\HomeController;


class routeController extends HomeController
{
    public function handling_route(Request $request)
    {

    	switch ($request->handling) {
    		case 'admin.user.list':
    			return $this->admin_load_list_user();
    			break;
    		case 'admin.group.list':
                return $this->admin_load_list_group();
                break;

            case 'business.customer':
                return $this->business_load_list_customer();
                break;

            case 'Dashboard':
                return $this->Dashboard_js();
                break;

    		default:
    			return $this->index();//chuyen ve trang chu
    			break;
    	}


    }

    public function admin_load_list_user()
    {        
        $provinces=$this->load_provinces();//danh sach thanh pho
        $branch=$this->load_branch();

        return view('backend.admin.page.user.user_list')
                ->with('provinces',$provinces)
                ->with('branch',$branch);//chi nhanh
    }

    public function admin_load_list_group()
    {        
        $branch=$this->load_branch();
        return view('backend.admin.page.group.group_list')
                ->with('branch',$branch);
    }

    public function business_load_list_customer()
    {
        $branch=$this->load_branch();
        return view('backend.business.page.customer.customer_list');
    }

}
