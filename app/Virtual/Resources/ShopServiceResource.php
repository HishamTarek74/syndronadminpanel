<?php
/**
 * @OA\Schema(
 *     title="ShopServiceResource",
 *     description="ShopService resource",
 *     @OA\Xml(
 *         name="ShopServiceResource"
 *     )
 * )
 */
class ShopServiceResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\ShopService
     */
    private $data;
}
