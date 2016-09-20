<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesTransactionsFixture
 *
 */
class SalesTransactionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sales_outlet_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'staff_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'transaction_date_time' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'transaction_wholesale_price' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'transaction_retail_price' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'other_details' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'customer_id' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
            'sales_outlet_id' => ['type' => 'index', 'columns' => ['sales_outlet_id'], 'length' => []],
            'staff_id' => ['type' => 'index', 'columns' => ['staff_id'], 'length' => []],
            'customer_id_2' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
            'sales_outlet_id_2' => ['type' => 'index', 'columns' => ['sales_outlet_id'], 'length' => []],
            'staff_id_2' => ['type' => 'index', 'columns' => ['staff_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_customerId' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_salesOutletId' => ['type' => 'foreign', 'columns' => ['sales_outlet_id'], 'references' => ['sales_outlets', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_staffId' => ['type' => 'foreign', 'columns' => ['staff_id'], 'references' => ['staffs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'customer_id' => 1,
            'sales_outlet_id' => 1,
            'staff_id' => 1,
            'transaction_date_time' => '2016-09-20 18:40:42',
            'transaction_wholesale_price' => 1.5,
            'transaction_retail_price' => 1.5,
            'other_details' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
