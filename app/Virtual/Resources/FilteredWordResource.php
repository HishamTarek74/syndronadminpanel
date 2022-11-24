<?php
/**
 * @OA\Schema(
 *     title="FilteredWordResource",
 *     description="FilteredWord resource",
 *     @OA\Xml(
 *         name="FilteredWordResource"
 *     )
 * )
 */
class FilteredWordResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\FilteredWord
     */
    private $data;
}
