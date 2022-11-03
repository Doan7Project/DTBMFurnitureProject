<?php


namespace App\Http\Services\Menu;

use App\Models\ProductCategory;
use Exception;
use Illuminate\Contracts\Session\Session;

class CategoryService
{

    public function getAll(){

       return ProductCategory::all();

    }

    public function create($request)
    {
        try {
            ProductCategory::create([
                'CategoryName' => (string) $request->input('txtCategoryName'),
                'Description' => (string) $request->input('txtDescription'),
                'Detail' => (string) $request->input('txtDetail'),
            ]);
            session()->flash('success', 'Create category is successfully: '.$request->input('txtCategoryName'));
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        };
        return true;
    }

    public function update($request, $menu) :bool
    {

        // $menu->fill($request->input());
        // $menu->CategoryCode =(string) $request->input('txtCategoryCode');
        $menu->CategoryName =(string) $request->input('txtCategoryName');
        $menu->Description = (string) $request->input('txtDescription');
        $menu->Detail = (string) $request->input('txtDetail');
        $menu->save();
        session()->flash('success', 'Updated successfully!');
        return true;
        // ProductCategory::with('id', $id)

        //     ->update([
        //         'CategoryName' => $categoryname,
        //         'Description' => $descriptions,
        //         'Detail' => $detail
        //     ]);
    }
}
