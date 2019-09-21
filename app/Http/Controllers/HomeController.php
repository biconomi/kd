<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('home.dashboard'));
    }
    

    public function dashboard()
    {
        $folder='business.';
        $page='.dashboard';
        $title_page='Dashboard';
        $lable_title='Dashboard';
        return view('backend.home')
            ->with('page','backend.dashboard')
            ->with('lable_title',$lable_title)
            ->with('title_page',$title_page);
    }

    public function Dashboard_js()
    {
        return view('backend.dashboard');
    }





    public function load_branch() //load chi nhanh cong ty dang hoat dong
    {
        return DB::table('branch')
                ->where('br_status','=',1)
                ->get();
    }

    public function load_provinces()//load danh sách tỉnh tp
    {
        return DB::table('provinces')->get();
    }
    
    public function ajax_load_district(Request $request)//ajax load danh sach huyen theo thanh pho
    {
        if($request->handling=='ajax_district')//get danh sách huyen
        {
            $district=DB::table('district')->where('pr_id','=',$request->id_provinces)->get();
            return view('backend.ajax.district')->with('district',$district);
        }

        if($request->handling=='ajax_wards')//get danh sách huyen
        {
            $wards=DB::table('wards')->where('id_dis','=',$request->id_district)->get();
            return view('backend.ajax.wards')->with('wards',$wards);
        }

        if($request->handling=='')// khong có tham so tih chuyen ve trang chu.
        {
            return $this->index();
        }
    } 
     


}
