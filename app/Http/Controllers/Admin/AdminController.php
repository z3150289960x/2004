<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
   public add(){
   	return $this->view("add");
   }
   public create(){
   		$data = [
   			'names'=>Request()->input("names"),
   			'tel' =>Request()->input("tel"),
   		];
   		$res=DB::table("user")->insert($data);
   		if (res) {
   			echo "添加成功";
   		}else{
   			echo "添加失败";
   		}
   }
   public select(){
   	$res=DB::table("users")->get();
   	return $this->view("list",["res"=>$res]);
   }  
   public update(){
   	return $this->view("update");
   }
   public update_add(){
   		$cate = [
   			'names'=>Request()->input("names"),
   			'tel'=>Request()->input("tel"),
   		];
   		$res=DB::table("user")->update($cate);
   		if (res) {
   			echo "修改成功";
   		}else{
   			echo "修改失败";
   		}

   }
      public function index(){
        $users = DB::table('users')->get();
        return view('users.index',['users' => $users]);
        $users = DB::table('users')->paginate(10);
        return view('user.index',['users' => $users]);
      }

}
