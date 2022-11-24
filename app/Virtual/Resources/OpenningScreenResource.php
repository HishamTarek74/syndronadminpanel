<?php
/**
 * @OA\Schema(
 *     title="OpenningScreenResource",
 *     description="OpenningScreen resource",
 *     @OA\Xml(
 *         name="OpenningScreenResource"
 *     )
 * )
 */
class OpenningScreenResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\OpenningScreen
     */
    private $data;
}
