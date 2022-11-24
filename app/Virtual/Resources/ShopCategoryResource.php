<?php
/**
 * @OA\Schema(
 *     title="ShopCategoryResource",
 *     description="ShopCategory resource",
 *     @OA\Xml(
 *         name="ShopCategoryResource"
 *     )
 * )
 */
class ShopCategoryResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\ShopCategory
     */
    private $data;
}
