<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDetail;
use App\ProductTypeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Session;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->paginate(10);
        return view('products.index',compact('product'));
    }

    public function create(Request $request)
    {

        if ($request->isMethod('get')) {
            $type = ProductTypeDetail::all();
            return view('products.create',compact('type'));
        } else {
                $rules =[
                    'id_type_details'=>'required',
                    'name'=>'required',
                    'price'=>'required',
                    'sale'=>'required',
                    'note'=>'required',
                    'avatar'=>'required',
                ];
                $message=[
                    'name.required'=>'name not null',
                    'price.required'=>'price not null',
                    'note.required'=>'note not null',
                    'sale.required'=>'sale not null',
                    'avatar.required'=>'avatar not null',
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
                     return redirect('admin/product/create')->withErrors($validator->errors());
                    }
                    DB::beginTransaction();
                    $product = new Product();
                    try {
                        $product->id_type_details = $request->id_type_details;
                        $product->name = $request->name;
                        $product->sale = $request->sale;
                        $product->price = $request->price;
                        $product->note = $request->note;
                        if ($request->hasFile('avatar')){
                            $file = $request->file('avatar');
                            $exception  = $file->getClientOriginalExtension();
                            $fileName = time() . '.' . $exception;
                            $file->move('images/',$fileName);
                            $product->avatar = $fileName;
                        }
                        $product->save();
                        DB::commit();
                        session()->flash('success','Lưu thành công !');
                        return redirect('admin/product/update/'.$product->id);

                    }catch (Exception $exception){
                        DB::rollBack();
                        return redirect('products.create');

                    };
                }
        }

    public function update(Request $request,$id)
    {

        $detail = DB::table('tb_product_details')->where('id_product', $id)->get();
        if ($request->isMethod('get')) {
            return view('products.update', compact('id', 'detail'));
        } else {
            $rules = [
                'color' => 'required',
                'size' => 'required',
                'quantity' => 'required',
            ];
            $message = [
                'color.required' => 'name not null',
                'size.required' => 'size and color not null',
                'quantity.required' => 'price not null',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            $request->flash();
            if ($validator->fails()) {
                response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
                session()->flash('error', 'Lưu thất bại !');
                return redirect('admin/product/update/'.$id)->withErrors($validator->errors());
            }
            DB::beginTransaction();
            $detail = new ProductDetail();
            try {
                $detail->id_product = $request->id_product;
                $detail->color = $request->color;
                $detail->size = $request->size;
                $detail->quantity = $request->quantity;
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $exception = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $exception;
                    $file->move('images/details', $fileName);
                    $detail->image = $fileName;
                }
                $detail->save();
                DB::commit();
                session()->flash('success', 'Lưu thành công !');
                return redirect('admin/product/update/'.$id);
            } catch (Exception $exception) {
                DB::rollBack();
                return redirect('admin/product/update/'.$id);
            };
        }
    }
    public function delete($id){
        Product::where('id',$id)->delete();
        session()->flash('success', 'Xóa thành công !');
        return redirect('admin/product');
    }

}
