<?php
/**
 * @OA\Schema(
 *     title="AdResource",
 *     description="Ad resource",
 *     @OA\Xml(
 *         name="AdResource"
 *     )
 * )
 */
class AdResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Ad
     */
    private $data;
}
