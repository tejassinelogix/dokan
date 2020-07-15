<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\category;
use Illuminate\Http\Request;
use DB;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = category::latest()->paginate(50);
        return view('admin/categorylist', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function filter(Request $request,category $category)
    {
       
        $queryCat = category::query();
        if(!empty($request->input('category_name')))
        {
             $queryCat->where('category_name','=',$request->input('category_name'))->paginate(1);
        }
        if (!empty($request->input('alias')))
        {    
              $data=$queryCat->where('alias','=',$request->input('alias'))->paginate(1);;
        }

        if (!empty($request->input('alias')) && !empty($request->input('category_name')))
        {   
             $queryCat->where('category_name','=',$request->input('category_name')); 
             $queryCat->where('alias','=',$request->input('alias')); 
        }
        $data = $queryCat->paginate(1);

        return view('admin/categorylist', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function excelexport(Request $request)
    {
        return Excel::download(new UsersExport, 'category.xlsx');
        return redirect()->action('CategoryController@index');
   }

    public function csvexport(Request $request)
    {
        return Excel::download(new UsersExport, 'category.csv');
        return redirect()->action('CategoryController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->cat_id =='')
       {

        $image = $request->file('category_images');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('category_images'), $new_name);

        $category = new category; // This is an Eloquent model
        $category
           ->setTranslation('category_name', 'en', $request->category_name_en)
           ->setTranslation('category_name', 'ar', $request->category_name_ar);
           //->save();
        $category->sub_category_name = $request->get('sub_category_name');
        $category->category_description = $request->get('category_description');
        $category->cat_badge = $request->get('cat_badge');
        $category->badgestyle = $request->get('badgestyle');
        $category->displaymode = $request->get('displaymode');
        $category->cat_mall = $request->get('cat_mall');
        $category->alias = $request->get('alias');
        $category->pagesizeoptions = $request->get('pagesizeoptions');
        $category->pagesize = $request->get('pagesize');
        $category->cat_status = $request->get('cat_status');
        $category->category_images = $new_name;

        

        // $form_data = array(
        //     'category_name'          =>   $request->category_name,
        //     'sub_category_name'         =>   $request->sub_category_name,
        //     'category_description'           =>   $request->category_description,
        //     'cat_badge'           =>   $request->cat_badge,
        //     'badgestyle'           =>   $request->badgestyle,
        //     'displaymode'           =>   $request->displaymode,
        //     'cat_mall'           =>   $request->cat_mall,
        //     'alias'           =>   $request->alias,
        //     'pagesizeoptions'           =>   $request->pagesizeoptions,
        //     'pagesize'           =>   $request->pagesize,
        //     'cat_status'           =>   $request->cat_status,
        //     'category_images'        =>   $new_name
        // );

        

        //$check =category::create($category);
        $category->save();

        $check=$category->id;
        
        $id=$check;
        
        $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
        if($check){ 
        $arr = array('msg' => 'Data Save Successfully', 'status' => true);
        $arr = array('id' =>$id , 'status' => true);
        }
        return Response()->json($arr);

    }
    else
    {
        
        $id= $request->get('cat_id');
        $category = category::find($id);

        $category->cat_meta_key =  $request->get('cat_meta_key');
        $category->cat_meta_discription = $request->get('cat_meta_discription');
        $category->cat_meta_title = $request->get('cat_meta_title');

        $category->cat_meta_url =  $request->get('cat_meta_url');
        $check = $category->save();
        if($check){ 
        $data = array('msg' => 'Data Save Successfully','data' => 1);
        //$arr = array('id' =>$id , 'status' => true);
        }

        return Response()->json($data);
        
    }

        //return redirect('admin/category')->with('success', 'Category Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = category::find($id);
        $data = category::all();
        return view('admin/category_update', compact('category','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        return view('admin/category_update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo $request->parent_category_en;die;
        if($request->cat_id =='')
       {
        //echo $request->parent_category_en;die;

        $category = category::find($id); 

        if($request->parent_category_en !='')
        {
            $cat = category::find($request->parent_category_en);
            $parent_en=$cat->getTranslation('category_name', 'en');
            $parent_ar=$cat->getTranslation('category_name', 'ar');
            $category
                ->setTranslation('parent_category', 'en', $parent_en)
                ->setTranslation('parent_category', 'ar', $parent_ar);
        }

        $category
           ->setTranslation('category_name', 'en', $request->category_name_en)
           ->setTranslation('category_name', 'ar', $request->category_name_ar);
           // ->setTranslation('parent_category','en', $request->parent_category_en)
           // ->setTranslation('parent_category','ar', $request->parent_category_ar);
        
        $category->sub_category_name = $request->get('sub_category_name');
        $category->category_description = $request->get('category_description');

        $category->cat_badge =  $request->get('cat_badge');
        $category->badgestyle = $request->get('badgestyle');
        $category->displaymode = $request->get('displaymode');
        $category->cat_mall = $request->get('cat_mall');
        $category->alias = $request->get('alias');
        $category->pagesizeoptions = $request->get('pagesizeoptions');
        $category->pagesize = $request->get('pagesize');
        $category->cat_status = $request->get('cat_status');
        $category->cat_meta_key =  $request->get('cat_meta_key');
        $category->cat_meta_discription = $request->get('cat_meta_discription');
        $category->cat_meta_title = $request->get('cat_meta_title');

        $category->cat_meta_url =  $request->get('cat_meta_url');
        
        if($request->hasFile('category_images')){
            $image = $request->file('category_images');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('category_images'), $new_name);
            $category->category_images = $new_name;
        }

       $check = $category->save();
        if($check){ 
        //$data = array('msg' => 'Data Save Successfully','data' => 1);
        $arr = array('id' =>$id , 'status' => true);
        }

        return Response()->json($arr);

    }
    else
    {
        $category = category::find($id);

        if($request->parent_category_en !='')
        {
            $cat = category::find($request->parent_category_en);
            $parent_en=$cat->getTranslation('category_name', 'en');
            $parent_ar=$cat->getTranslation('category_name', 'ar');
            //dd($parent_ar);
            $category
                ->setTranslation('parent_category', 'en', $parent_en)
                ->setTranslation('parent_category', 'ar', $parent_ar);
        }

       $category
           ->setTranslation('category_name', 'en', $request->category_name_en)
           ->setTranslation('category_name', 'ar', $request->category_name_ar);
           //->setTranslation('parent_category','en',$request->parent_category_en)
           //->setTranslation('parent_category', 'ar', $request->parent_category_ar);
        //$category->parent_category = $request->get('parent_category');
        $category->sub_category_name = $request->get('sub_category_name');
        $category->category_description = $request->get('category_description');

        $category->cat_badge =  $request->get('cat_badge');
        $category->badgestyle = $request->get('badgestyle');
        $category->displaymode = $request->get('displaymode');
        $category->cat_mall = $request->get('cat_mall');
        $category->alias = $request->get('alias');
        $category->pagesizeoptions = $request->get('pagesizeoptions');
        $category->pagesize = $request->get('pagesize');
        $category->cat_status = $request->get('cat_status');
        $category->cat_meta_key =  $request->get('cat_meta_key');
        $category->cat_meta_discription = $request->get('cat_meta_discription');
        $category->cat_meta_title = $request->get('cat_meta_title');

        $category->cat_meta_url =  $request->get('cat_meta_url');
        
        if($request->hasFile('category_images')){
            $image = $request->file('category_images');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('category_images'), $new_name);
            $category->category_images = $new_name;
        }

       $check = $category->save();
        if($check){ 
        $data = array('msg' => 'Data update Successfully','data' => 1);
        //$arr = array('id' =>$id , 'status' => true);
        }

        return Response()->json($data);
    }

        //return redirect('/admin/category')->with('success', 'Category updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect('/admin/category')->with('success', 'Category deleted successfully');
    }
}