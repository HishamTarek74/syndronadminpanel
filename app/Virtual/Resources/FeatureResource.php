<?php
/**
 * @OA\Schema(
 *     title="FeatureResource",
 *     description="Feature resource",
 *     @OA\Xml(
 *         name="FeatureResource"
 *     )
 * )
 */
class FeatureResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Feature
     */
    private $data;
}
