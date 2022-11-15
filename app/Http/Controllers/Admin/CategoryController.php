<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\CategoryService;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;


class CategoryController extends Controller
{
    protected  $categoryservice;

    public function __construct(CategoryService $categoryservice)
    {
        $this->categoryservice = $categoryservice;
    }
    # 1 Hiển thị danh sách Category
    public function CategoryList()
    {

        return view('Admin.pages.category.Category_list',[
            'title' => 'Danh sach moi',
            'category' => $this->categoryservice->getAll(),
            'product'=> $this->categoryservice->getOrderProduct(),
        ]);
    }
    # 2 Hiện thị bảng tạo thông tin
    public function CategoryCreate()
    {
        return view('Admin.pages.category.Category_create');
    }
    # 3 Thực hiện lệnh thêm dữ liệu
    public function CategoryCreateProcess(CreateFormRequest $request)
    {
        #3.1 Kiểm tra lỗi

        $this->categoryservice->create($request);
        return redirect()->route('categorylist');

        // return redirect()->route('categorylist');
    }
    # 4 Truy vấn lấy dữ liệu từ DB vào form và hiển thị bảng update
    public function CategoryUpdate(ProductCategory $menu)
    {   
        return view('Admin.pages.category.Category_update', [
            'title' => "Category name:  " . $menu->CategoryName,
            'menu' => $menu
        ]);
    }
    # 5 Thực hiện lệnh chỉnh sữa dữ liệu
    public function CategoryUpdateProcess(ProductCategory $menu, CreateFormRequest $request)
    {
        
        $this->categoryservice->update($request, $menu);
        return redirect()->route('categorylist');

    }
    # 6 Thực hiện lệnh delete
    public function CategoryDelete($id)
    {
        ProductCategory::where('id',$id)->delete();
        return redirect()->route('categorylist');
    }

}
