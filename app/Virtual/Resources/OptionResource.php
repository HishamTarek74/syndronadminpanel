<?php
/**
 * @OA\Schema(
 *     title="OptionResource",
 *     description="Option resource",
 *     @OA\Xml(
 *         name="OptionResource"
 *     )
 * )
 */
class OptionResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Option
     */
    private $data;
}
