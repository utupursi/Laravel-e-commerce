<?php


namespace App\Interfaces;


interface ProductInterface
{
    /**
     * Get all users
     *
     * @method  GET api/products
     * @access  public
     */
    public function getAllProducts();

    /**
     * Get User By ID
     *
     * @param integer $id
     *
     * @method  GET api/products/{
    id
    }
     * @access  public
     */
    public function getProductById($id);
//
//    /**
//     * Create | Update user
//     *
//     * @param \App\Http\Requests\UserRequest $request
//     * @param integer $id
//     *
//     * @method  POST    api/users       For Create
//     * @method  PUT     api/users/{
//    id
//    }  For Update
//     * @access  public
//     */
//    public function requestUser(UserRequest $request, $id = null);

//    /**
//     * Delete user
//     *
//     * @param integer $id
//     *
//     * @method  DELETE  api/users/{
//    id
//    }
//     * @access  public
//     */
//    public function deleteUser($id);
}
