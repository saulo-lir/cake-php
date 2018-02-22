<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property float $value
 * @property int $type_id
 * @property int $district_id
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\District $district
 */
class Property extends Entity
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
        'title' => true,
        'description' => true,
        'value' => true,
        'type_id' => true,
        'district_id' => true,
        'type' => true,
        'district' => true
    ];
}
