<?php
/**
 * @OA\Schema(
 *     title="SellerResource",
 *     description="Seller resource",
 *     @OA\Xml(
 *         name="SellerResource"
 *     )
 * )
 */
class SellerResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Provider
     */
    private $data;
}
