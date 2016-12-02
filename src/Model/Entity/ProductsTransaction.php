<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsTransaction Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $transaction_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Transaction $transaction
 */
class ProductsTransaction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'product_id' => false,
        'transaction_id' => false
    ];
}
