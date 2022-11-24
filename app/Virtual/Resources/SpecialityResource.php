<?php
/**
 * @OA\Schema(
 *     title="SpecialityResource",
 *     description="Speciality resource",
 *     @OA\Xml(
 *         name="SpecialityResource"
 *     )
 * )
 */
class SpecialityResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Speciality
     */
    private $data;
}
