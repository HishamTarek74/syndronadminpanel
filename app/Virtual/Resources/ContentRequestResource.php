<?php
/**
 * @OA\Schema(
 *     title="ContentRequestResource",
 *     description="ContentRequest resource",
 *     @OA\Xml(
 *         name="ContentRequestResource"
 *     )
 * )
 */
class ContentRequestResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\ContentRequest
     */
    private $data;
}
