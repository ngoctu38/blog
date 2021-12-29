<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDetail;
use App\ProductTypeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class ProductTypeController extends Controller
{
    public function index()
    {
        $product_type = ProductTypeDetail::orderBy('id', 'DESC')->paginate(10);
        return view('product-type.index',compact('product_type'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            $type = ProductTypeDetail::all();
            return view('admin/product-type/index',compact('type'));
        } else {
                $rules =[
                    'id_type_detail'=>'required',
                    'name'=>'required',
                ];
                $message=[
                    'name.required'=>'name not null',
                    'id_type_detail.required'=>'type not null',
                ];
                $validator = Validator::make($request->all(),$rules,$message);
                $request->flash();
                    if ($validator->fails()){
                     response()->json([
                        'fail'=>true,
                        'errors'=>$validator->errors()
                     ]);
                        session()->flash('error','Lưu thất bại !');
                     return redirect('admin/product-type/index')->withErrors($validator->errors());
                    }
                    DB::beginTransaction();
                    $product = new ProductTypeDetail();
                    try {
                        $product->id_type_detail = $request->id_type_detail;
                        $product->name = $request->name;
                        $product->save();
                        DB::commit();
                        session()->flash('success','Lưu thành công !');
                        return redirect('admin/product-type/index');

                    }catch (Exception $exception){
                        DB::rollBack();
                        return redirect('admin/product-type/index');

                    };
                }
        }

        public function delete($id){
        ProductTypeDetail::where('id',$id)->delete();
            session()->flash('success','Xóa thành công !');
            return redirect('admin/product-type/index');
        }



}
