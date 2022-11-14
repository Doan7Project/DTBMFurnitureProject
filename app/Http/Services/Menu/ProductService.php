<?php


namespace App\Http\Services\Menu;

use App\Models\order_detail;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;

class ProductService
{

    //lấy order detail
    public function getOrderDetailInfo()
    {

        return order_detail::all();
    }
    
    public function getAll()
    {
        $products = Product::all();
        return $products;
    }

    public function getProduct()
    {

        $products = Product::where('status', '0');

        if (isset($_GET['sort']) && !empty($_GET['sort'])) :
            if ($_GET['sort'] == "product_latest") :
                return  $products->orderby('id', 'Desc')->paginate(100);
            elseif ($_GET['sort'] == "price_lowest") :
                return  $products->orderby('price', 'Asc')->paginate(100);
            elseif ($_GET['sort'] == "price_highest") :
                return  $products->orderby('price', 'Desc')->paginate(100);
            elseif ($_GET['sort'] == "name_a_z") :
                return  $products->orderby('product_name', 'Asc')->paginate(100);
            elseif ($_GET['sort'] == "name_a_z") :
                return  $products->orderby('product_name', 'Desc')->paginate(100);
            elseif ($_GET['sort'] == "product_featured") :
                return  $products->where('models', 'featured')->paginate(100);
            elseif ($_GET['sort'] == "product_new_arrival") :
                return  $products->where('models', 'New arrival')->paginate(100);
            elseif ($_GET['sort'] == "product_trending") :
                return  $products->where('models', 'Trending')->paginate(100);
            elseif ($_GET['sort'] == "product_top") :
                return  $products->where('models', 'top')->paginate(100);
            elseif ($_GET['price_sort'] == "price_a") :
                return  $products->where('models', 'top')->paginate(100);
            endif;
        endif;

        if (isset($_GET['price_sort']) && !empty($_GET['price_sort'])) :
            if ($_GET['price_sort'] == "price_a") :
                return  $products->whereBetween('price', [0, 300])->orderby('price', 'Asc')->paginate(100);
            elseif ($_GET['price_sort'] == "price_b") :
                return  $products->whereBetween('price', [300, 600])->orderby('price', 'Asc')->paginate(100);
            elseif ($_GET['price_sort'] == "price_c") :
                return  $products->whereBetween('price', [600, 900])->orderby('price', 'Asc')->paginate(100);
            elseif ($_GET['price_sort'] == "price_d") :
                return  $products->whereBetween('price', [900, 1200])->orderby('price', 'Asc')->paginate(100);
            elseif ($_GET['price_sort'] == "price_e") :
                return  $products->whereBetween('price', [1200, 1800])->orderby('price', 'Asc')->paginate(100);
            elseif ($_GET['price_sort'] == "price_f") :
                return  $products->where('price', '=>', 1800)->orderby('price', 'Asc')->paginate(100);
            endif;

        endif;
        return Product::all();
    }

    public function getCategoryName()
    {

        return ProductCategory::all();
    }

    public function insert($request)
    {

        $unique_id = 'FNI-' . floor(time() - 999999999);

        try {

            Product::create([
                'product_name' => $request->input('txtProductName'),
                'product_code' => $unique_id,
                'price' => $request->input('txtPrice'),
                'unit' => $request->input('txtUnit'),
                'quantity' =>  $request->input('txtQuantity'),
                'status' => $request->input('txtStatus'),
                'models' => $request->input('txtModel'),
                'made_in' => $request->input('txtMadein'),
                'category_id' => $request->input('txtCategoryID'),
                'images' => $request->input('txtImage'),
                'content' => $request->input('txtContent'),
                'description' => $request->input('txtDescription'),
            ]);
            session()->flash('success', 'Create product is successfully: ' . $request->input('txtProductName'));
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        };
        return true;
    }

    public function edit($request, $data): bool
    {
        $data->product_name = $request->input('txtProductName');
        $data->product_code = $request->input('txtProductCode');
        $data->price = $request->input('txtPrice');
        $data->unit = $request->input('txtUnit');
        $data->quantity = $request->input('txtQuantity');
        $data->status = $request->input('txtStatus');
        $data->models = $request->input('txtModel');
        $data->made_in = $request->input('txtMadein');
        $data->category_id = $request->input('txtCategoryID');
        $data->images = $request->input('txtImage');
        $data->content = $request->input('txtContent');
        $data->description = $request->input('txtDescription');
        $data->save();
        session()->flash('success', 'Updated successfully! ' . $data->product_name);
        return true;
    }
}
