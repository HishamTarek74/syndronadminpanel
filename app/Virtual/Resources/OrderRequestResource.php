<?php
/**
 * @OA\Schema(
 *     title="OrderRequestResource",
 *     description="OrderRequest resource",
 *     @OA\Xml(
 *         name="OrderRequestResource"
 *     )
 * )
 */
class OrderRequestResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\OrderRequest
     */
    private $data;
}
