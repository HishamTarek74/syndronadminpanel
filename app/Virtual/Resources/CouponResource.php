<?php
/**
 * @OA\Schema(
 *     title="CouponResource",
 *     description="Coupon resource",
 *     @OA\Xml(
 *         name="CouponResource"
 *     )
 * )
 */
class CouponResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Coupon
     */
    private $data;
}
