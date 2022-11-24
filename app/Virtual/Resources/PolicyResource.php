<?php
/**
 * @OA\Schema(
 *     title="PolicyResource",
 *     description="Policy resource",
 *     @OA\Xml(
 *         name="PolicyResource"
 *     )
 * )
 */
class PolicyResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Policy
     */
    private $data;
}
