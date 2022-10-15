<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Models\JobContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobLibrary extends Controller
{
    public function show()
    {

        $get_parent_category = JobCategory::where('jd_category_order', 0)->where('js_category_parent_id', 0)->get();
        return view('admin.helper_view.category')->with(compact('get_parent_category'));
    }
    public function fetch_library_sub_category($category_id){
        $get_sub_category_list = JobContent::where('parent_category_id',$category_id)->groupBy('sbc_name')->get();
        return response()->json([
            'filename' => $get_sub_category_list,
            'status' => "success",
        ]);
        
    }
    public function submit_data(Request $tic)
    {
        $text = trim($tic->content_list);
        $textAr = explode("\n", $text);
        $textAr = array_filter($textAr, 'trim'); 
        foreach ($textAr as $line) {
            JobContent::insert([
                    'sbc_name'=>$tic->sbc_name,
                    'parent_category_id'=>$tic->category_id,
                    'content_type'=>$tic->content_type,
                    'content_list'=>$line,
            ]);
        }
        return "success";
    }
    public function fetch_library_content($sbc_id){
        $get_sub_category = JobContent::where('sbc_id',$sbc_id)->first();
        $get_sub_category_name = $get_sub_category->sbc_name;
        $get_content = JobContent::where('sbc_name',$get_sub_category_name)->get();
        return response()->json([
            'content' => $get_content,
            'status' => "success",
        ]);
    }
    public function fetch_library_content_init($sbc_id){
        $get_sub_category = JobContent::where('parent_category_id',$sbc_id)->first();
        $get_sub_category_name = $get_sub_category->sbc_name;
        $get_content = JobContent::where('sbc_name',$get_sub_category_name)->get();
        return response()->json([
            'content' => $get_content,
            'status' => "success",
        ]);
    }
    public function search_sub_category($search){
        $get_sub_category_list = JobContent::where('sbc_name','like', '%'.$search.'%')->groupBy('sbc_name')->get();
        $get_category_name = JobCategory::all();
        return response()->json([
            'filename' => $get_sub_category_list,
            'category'=> $get_category_name,
            'status' => "success",
        ]);
    }
    public function get_parent_category($parent_id){
        $get_category_name = JobCategory::where('jd_category_id',$parent_id)->first();
        return $get_category_name->jd_category_name;
    }
}
