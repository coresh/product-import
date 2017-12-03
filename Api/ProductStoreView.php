<?php

namespace BigBridge\ProductImport\Api;

use BigBridge\ProductImport\Model\Resource\Reference\GeneratedUrlKey;
use BigBridge\ProductImport\Model\Resource\Reference\Reference;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Catalog\Model\Product\Visibility;

/**
 * @author Patrick van Bergen
 */
class ProductStoreView
{
    // a collection of some commonly used constants

    const STATUS_ENABLED = Status::STATUS_ENABLED;
    const STATUS_DISABLED = Status::STATUS_DISABLED;

    const VISIBILITY_NOT_VISIBLE = Visibility::VISIBILITY_NOT_VISIBLE;
    const VISIBILITY_IN_CATALOG = Visibility::VISIBILITY_IN_CATALOG;
    const VISIBILITY_IN_SEARCH = Visibility::VISIBILITY_IN_SEARCH;
    const VISIBILITY_BOTH = Visibility::VISIBILITY_BOTH;
    const ATTR_VISIBILITY = 'visibility';
    const ATTR_URL_KEY = 'url_key';
    const ATTR_TAX_CLASS_ID = 'tax_class_id';
    const ATTR_PRICE = 'price';
    const ATTR_STATUS = 'status';
    const ATTR_DESCRIPTION = 'description';
    const ATTR_SHORT_DESCRIPTION = 'short_description';
    const ATTR_NAME = 'name';
    const ATTR_WEIGHT = 'weight';
    const ATTR_SPECIAL_PRICE = 'special_price';
    const ATTR_SPECIAL_FROM_DATE = 'special_from_date';
    const ATTR_SPECIAL_TO_DATE = 'special_to_date';

    /**
     * For internal use only; not for application use
     * @var  Product
     */
    public $parent;

    /** @var  int */
    protected $store_view_id;

    /** @var array  */
    protected $attributes = [];

    public function setName(string $name)
    {
        $this->attributes[self::ATTR_NAME] = trim($name);
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return array_key_exists(self::ATTR_NAME, $this->attributes) ? $this->attributes[self::ATTR_NAME] : null;
    }

    public function setStoreViewId(int $storeViewId)
    {
        $this->store_view_id = $storeViewId;
    }

    public function getStoreViewId(): int
    {
        return $this->store_view_id;
    }

    public function removeStoreViewId()
    {
        $this->store_view_id = null;
    }

    public function setStatus(int $status)
    {
        $this->attributes[self::ATTR_STATUS] = $status;
    }

    public function setDescription(string $description)
    {
        $this->attributes[self::ATTR_DESCRIPTION] = trim($description);
    }

    public function setShortDescription(string $shortDescription)
    {
        $this->attributes[self::ATTR_SHORT_DESCRIPTION] = trim($shortDescription);
    }

    /**
     * @param string $price A 12.4 decimal field
     */
    public function setPrice(string $price)
    {
        $this->attributes[self::ATTR_PRICE] = trim($price);
    }

    public function setVisibility(int $visibility)
    {
        $this->attributes[self::ATTR_VISIBILITY] = $visibility;
    }

    public function setTaxClassId(int $taxClassId)
    {
        $this->attributes[self::ATTR_TAX_CLASS_ID] = $taxClassId;
    }

    public function setTaxClassName(string $taxClassName)
    {
        $this->attributes[self::ATTR_TAX_CLASS_ID] = new Reference(trim($taxClassName));
    }

    public function setUrlKey(string $urlKey)
    {
        $this->attributes[self::ATTR_URL_KEY] = trim($urlKey);
    }

    /**
     * @return string|GeneratedUrlKey|null
     */
    public function getUrlKey()
    {
        return array_key_exists(self::ATTR_URL_KEY, $this->attributes) ? $this->attributes[self::ATTR_URL_KEY] : null;
    }

    public function generateUrlKey()
    {
        $this->attributes[self::ATTR_URL_KEY] = new GeneratedUrlKey();
    }

    /**
     * @param string $price A 12.4 decimal field
     */
    public function setWeight(string $weight)
    {
        $this->attributes[self::ATTR_WEIGHT] = trim($weight);
    }

    /**
     * @param string $specialPrice A 12.4 decimal field
     */
    public function setSpecialPrice(string $specialPrice)
    {
        $this->attributes[self::ATTR_SPECIAL_PRICE] = trim($specialPrice);
    }

    /**
     * @param string $specialPriceFromDate A y-m-d MySql date
     */
    public function setSpecialFromDate(string $specialPriceFromDate)
    {
        $this->attributes[self::ATTR_SPECIAL_FROM_DATE] = trim($specialPriceFromDate);
    }

    /**
     * @param string $specialPriceToDate A y-m-d MySql date
     */
    public function setSpecialToDate(string $specialPriceToDate)
    {
        $this->attributes[self::ATTR_SPECIAL_TO_DATE] = trim($specialPriceToDate);
    }

    /**
     * Set the value of a user defined attribute.
     *
     * @param string $name
     * @param string $value
     */
    public function setCustomAttribute(string $name, string $value)
    {
        $this->attributes[trim($name)] = trim($value);
    }

    /**
     * @param $attributeCode
     * @return mixed|null|
     */
    public function getAttribute($attributeCode)
    {
        return array_key_exists($attributeCode, $this->attributes) ? $this->attributes[$attributeCode] : null;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Removes an attribute
     */
    public function removeAttribute(string $name)
    {
        unset($this->attributes[$name]);
    }
}