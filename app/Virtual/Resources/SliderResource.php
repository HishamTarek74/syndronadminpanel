<?php
/**
 * @OA\Schema(
 *     title="SliderResource",
 *     description="Slider resource",
 *     @OA\Xml(
 *         name="SliderResource"
 *     )
 * )
 */
class SliderResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Slider
     */
    private $data;
}
