<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $sales_outlet_id
 * @property int $staff_id
 * @property \Cake\I18n\Time $transaction_date_time
 * @property float $transaction_retail_price
 * @property string $other_details
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\SalesOutlet $sales_outlet
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Product[] $products
 */
class Transaction extends Entity
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
        'id' => false
    ];
}
