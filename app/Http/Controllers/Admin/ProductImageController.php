<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\imageRequest;
use App\Http\Services\Menu\imagePdService;
use App\Models\product_image;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    protected $imagepdservice;

    public function __construct(imagePdService $imagePdService)
    {
        $this->imagepdservice = $imagePdService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('Admin.pages.product_images.Image_list',[

            'items' => $this->imagepdservice->getAll(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.product_images.Image_create', [
            'productname' => $this->imagepdservice->getProductid(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(imageRequest $request)
    {

        $this->imagepdservice->insert($request);
        return redirect()->route('listimage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product_image $data)
    {
        // dd($data);
        //
        return view('Admin.pages.product_images.Image_update',[
            
            'title'=>'Update furniture images',
            'productname' => $this->imagepdservice->getProductid(),
            'getAllImage' => $this->imagepdservice->getAll(),
            'productImage' => $data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product_image $data, imageRequest $request)
    {
        //
        $this->imagepdservice->edit($request, $data);
        return redirect()->route('listimage');
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
        product_image::where('id', $id)->delete();
        return redirect()->route('listimage');
    }
}
