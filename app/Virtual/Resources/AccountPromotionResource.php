<?php
/**
 * @OA\Schema(
 *     title="AccountPromotionResource",
 *     description="AccountPromotion resource",
 *     @OA\Xml(
 *         name="AccountPromotionResource"
 *     )
 * )
 */
class AccountPromotionResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\AccountPromotion
     */
    private $data;
}
