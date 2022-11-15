<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\UpdateProductRequest;
use App\Http\Requests\Menu\CreateFormProductRequest;
use App\Http\Services\Menu\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{

    protected $productservice;


    public function __construct(ProductService $productService)
    {
        $this->productservice = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {

        return view('Admin.pages.product.Product_list', [
            'title' => "Product List",
            'items' => $this->productservice->getAll(),   
            'orderDetail' => $this->productservice->getOrderDetailInfo()    
        ]);
        
    }
    // public function search(Request $request)
    // {
    //     $output = "";
    //     $product = Product::where('product_name', 'LIKE', '%' . $request->search . '%')
    //         ->orWhere('product_code', 'LIKE', '%' . $request->search . '%')
    //         ->orWhere('status', 'LIKE', '%' . $request->search . '%')
    //         ->orWhere('models', 'LIKE', '%' . $request->search . '%')
    //         ->orWhere('made_in', 'LIKE', '%' . $request->search . '%')->get();
    //     foreach ($product as $key => $data) {
    //         $output .=
    //             '<tr>
    //             <td VALIGN=Middle Align=Middle>' . $key + 1 . '</td>
    //             <td VALIGN=Middle Align=Left>' . $data->product_code . '</td>
    //             <td VALIGN=Middle Align=Left>' . $data->product_name . '</td>
    //             <td VALIGN=Middle Align=Left>' . $data->price . '</td>
    //             <td VALIGN=Middle Align=Left>' . $data->unit . '</td>
    //             <td VALIGN=Middle Align=Middle>' . $data->quantity . '</td>
    //             <td VALIGN=Middle Align=Middle>' . $data->discount . '</td>
    //             <td VALIGN=Middle Align=Left><div class="text-center">' . $data->status . '</div></td>
    //             <td VALIGN=Middle Align=Left>' . $data->models . '</td>
    //             <td VALIGN=Middle Align=Left>' . $data->made_in . '</td>
    //             <td VALIGN=Middle Align=Middle>' . $data->category_id . '</td>
    //             <td VALIGN=Middle Align=Left>' . '<img src="' . $data->image . '" style="width: 100%;" alt="">' . '</td>
    //             <td VALIGN=Middle Align=Middle>' . '<a class="btn btn-primary" href="show/' . $data->id . '"><i class="bi bi-pencil-square text-white pe-2"></i>' . 'Edit ' . '</a></td>
    //             <td VALIGN=Middle Align=Middle>' . '<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square text-white pe-2"></i>' . 'Delete</a>' . '</td>
    //            </tr>';
    //     }
    //     return response($output);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        return view('Admin.pages.product.Product_create', [
            'title' => 'Category Name',
            'category' => $this->productservice->getCategoryName(),
     
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormProductRequest $request)
    
    
    {
        // dd($request->input());
        $this->productservice->insert($request);
        return redirect()->route('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $data)
    {
        //
        return view('Admin.pages.product.product_update', [
            'title' => 'Product Update',
            'Menus' => $this->productservice->getCategoryName(),
            'menu' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $data, UpdateProductRequest $request)
    {
        $this->productservice->edit($request, $data);
        return redirect()->route('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::where('id', $id)->delete();
        return redirect()->route('list');
    }

}
