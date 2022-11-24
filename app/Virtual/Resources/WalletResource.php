<?php
/**
 * @OA\Schema(
 *     title="WalletResource",
 *     description="Wallet resource",
 *     @OA\Xml(
 *         name="WalletResource"
 *     )
 * )
 */
class WalletResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Wallet
     */
    private $data;
}
