<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;


class CategoryController extends Controller
{
  protected  $menuservice;

  public function __construct(MenuService $menuService)
  {
    $this->menuservice = $menuService;
  }
    # 1 Hiển thị danh sách Category
    public function CategoryList()
    {
        return view('Admin.pages.category.Category_list');
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
       
            $result = $this->menuservice->create($request);
            return redirect()->back();

        // return redirect()->route('categorylist');
    }
    # 4 Truy vấn lấy dữ liệu từ DB vào form và hiển thị bảng update
    public function CategoryUpdate()
    {
        return view('Admin.pages.category.Category_update');
    }
    # 5 Thực hiện lệnh chỉnh sữa dữ liệu
    public function CategoryUpdateProcess()
    {
    }
    # 6 Thực hiện lệnh delete
    public function CategoryDelete()
    {
    }

    public function store(CreateFormRequest $request)
    {
    //     $validate = Validator::make(
    //         $request->all(),
    //         [
    //             'txtCategoryCode' => 'required|min:5',
    //             'txtCategory' => 'required|max:20'
    //         ],
    //         [
    //             'txtCategoryCode.required' => 'Category Code is required',
    //             'txtCategoryCode.min' => 'Category must have 5 charater',
    //             'txtCategory.required' => 'Category is required',
    //             'txtCategory.max' => 'Category is not greater than 20 charater',
    //         ]
    //     );

    //     if ($validate->fails()) {
    //         return back()->withErrors($validate->errors())->withInput();
    //     }

    //     dd($request->all());
    // }
}
}