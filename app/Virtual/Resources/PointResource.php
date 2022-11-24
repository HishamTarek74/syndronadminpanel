<?php
/**
 * @OA\Schema(
 *     title="PointResource",
 *     description="Point resource",
 *     @OA\Xml(
 *         name="PointResource"
 *     )
 * )
 */
class PointResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Point
     */
    private $data;
}
