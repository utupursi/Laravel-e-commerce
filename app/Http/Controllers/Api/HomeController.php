<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;

class HomeController extends Controller
{
    protected $productInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->productInterface->getAllProducts();
    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \App\Http\Requests\UserRequest  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(UserRequest $request)
//    {
//        return $this->productInteface->requestUser($request);
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->productInterface->getProductById($id);
    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \App\Http\Requests\UserRequest  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(UserRequest $request, $id)
//    {
//        return $this->userInterface->requestUser($request, $id);
//    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        return $this->userInterface->deleteUser($id);
//    }
}
