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

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('products.index',compact('product'));
    }
//    public function ajax(Request $request){
//            $conn = ProductDetail::all();
//            $color = $_POST['color'];
//            $size = $_POST['size'];
//            $quantity = $_POST['quantity'];
//            $image = $_POST['image'];
//            $query = "INSERT INTO customer (color , size, quantity, image) VALUES ('$color' ,'$size', '$quantity', '$image')";
//            $result =  mysqli_query($conn, $query);
//            if ($result){
//                echo "1";
//            }else{
//                echo "0";
//            }
//    }
    public function create(Request $request)
    {
        //        $product = DB::table('tb_products')
//            ->leftJoin('tb_product_details', 'tb_product_details.id', '=', 'tb_products.id_details')
//            ->leftJoin('tb_product_type_details', 'tb_product_type_details.id', '=', 'tb_products.id_type_details')
//            ->select(
//                'tb_product_details.color as color',
//                'tb_product_details.size as size',
//                'tb_product_type_details.name as type',
//                'tb_product_details.id as id_details',
//                'tb_product_type_details.id as id_type_details'
//            )
//            ->get();
        if ($request->isMethod('get')) {
            $type = ProductTypeDetail::all();
            return view('products.create',compact('type'));
        } else {
                $rules =[
                    'name'=>'required',
                    'price'=>'required',
                    'quantity'=>'required',
                    'note'=>'required',
                    'avatar'=>'required',
                ];
                $message=[
                    'name.required'=>'name not null',
                    'id_details.required'=>'size and color not null',
                    'price.required'=>'price not null',
                    'quantity.required'=>'qty not null',
                    'note.required'=>'note not null',
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
                     return view('products.create')->withErrors($validator->errors());
                    }
                    dd('ssss');
                    DB::beginTransaction();
                    $product = new Product();
                    try {
                        $product->id_type_details = $request->id_type_details;
                        $product->id_details = $request->id_details;
                        $product->name = $request->name;
                        $product->price = $request->price;
                        $product->quantity = $request->quantity;
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
                        return view('products.create');
                    }catch (Exception $exception){
                        DB::rollBack();
                        return redirect('products.create');

                    };
                }
        }

    public function update(Request $request,$id){
      $detail = DB::table('tb_product_details')->where( 'id_product' ,   $id)->get();
      return view('products.update',compact('detail'));
        if ($request->isMethod('get')) {
            return view('products.create',compact('id','detail'));
        } else {
            dd($request);
            $rules =[
                'color'=>'required',
                'size'=>'required',
                'quantity'=>'required',
                'avatar'=>'required',
            ];
            $message=[
                'color.required'=>'name not null',
                'size.required'=>'size and color not null',
                'quantity.required'=>'price not null',
                'avatar.required'=>'qty not null',
            ];
            $validator = Validator::make($request->all(),$rules,$message);
            $request->flash();
            if ($validator->fails()){
                dd('dd');
                response()->json([
                    'fail'=>true,
                    'errors'=>$validator->errors()
                ]);
                session()->flash('error','Lưu thất bại !');
                return view('products.update')->withErrors($validator->errors());
            }
            DB::beginTransaction();
            $detail = new ProductDetail();
            try {
                $detail->id_product = $request->id_product;
                $detail->color = $request->color;
                $detail->size = $request->size;
                $detail->quantity = $request->quantity;
                $product->note = $request->note;
                if ($request->hasFile('image')){
                    $file = $request->file('image');
                    $exception  = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $exception;
                    $file->move('images/details',$fileName);
                    $product->image = $fileName;
                }
                $detail->save();
                DB::commit();
                session()->flash('success','Lưu thành công !');
                return view('products.update');
            }catch (Exception $exception){
                DB::rollBack();
                return redirect('products.update');

            };
        }
    }
}
