<?php

/*
 * This file is part of the Yeriki Simple Shopping Cart package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yeriki\SimpleShoppingCartBundle\Model;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

use Money\Money,
    Money\Currency;

use Quantity\Amount,
    Quantity\Quantity,
    Quantity\Uom;

/**
 * Product
 *
 * Represents an item that can be purchased, i.e. added to a Shopping Cart
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.2.0
 */
class Product implements ProductInterface
{
    /**
     * sku
     *
     * @ORM\Column(
     *     type="string",
     *     nullable=true
     * )
     */
    protected $sku;

    /**
     * name
     *
     * @ORM\Column(
     *     type="string",
     *     nullable=true
     * )
     */
    protected $name;

    /**
     * price amount
     *
     * @ORM\Column(
     *     type="integer",
     *     name="price_amount",
     *     nullable=true
     * )
     */
    protected $priceAmount;

    /**
     * price currency
     *
     * @ORM\Column(
     *     type="string",
     *     name="price_currency",
     *     nullable=true
     * )
     */
    protected $priceCurrency;

    /**
     * quantity amount
     *
     * @ORM\Column(
     *     type="integer",
     *     name="quantity_amount",
     *     nullable=true
     * )
     */
    protected $quantityAmount;

    /**
     * quantity unit
     *
     * @ORM\Column(
     *     type="string",
     *     name="quantity_unit",
     *     nullable=true
     * )
     */
    protected $quantityUom;

    /**
     * createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * Set sku
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @param string $sku
     *
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @param Money $price
     *
     * @return Product
     */
    public function setPrice(Money $price)
    {
        $this->priceAmount = $price->getAmount();
        $this->priceCurrency = $price->getCurrency()->getName();

        return $this;
    }

    /**
     * Get price
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return Money
     */
    public function getPrice()
    {
        // If we have no currency, we create a Money object to return
        if (!$this->priceCurrency) {
            return null;
        }

        // If we have a currency but no amount, just return zero
        if (!$this->priceAmount) {
            return new Money(0, new Currency($this->priceCurrency));
        }

        return new Money(
            $this->priceAmount,
            new Currency($this->priceCurrency)
        );
    }

    /**
     * Set quantity
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @param Quantity $quantity
     *
     * @return Product
     */
    public function setQuantity(Quantity $quantity)
    {
        $this->quantityAmount = $quantity->getAmount();
        $this->quantityUom = $quantity->getUom()->getName();

        return $this;
    }

    /**
     * Get quantity
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return Quantity
     */
    public function getQuantity()
    {
        // If we have no Uom, we can't create a Quantity object to return
        if (!$this->quantityUom) {
            return null;
        }

        // If we have a Uom but no amount, just return zero
        if (!$this->quantityAmount) {
            return new Quantity(new Amount(1), new Uom($this->quantityUom));
        }

        return new Quantity(
            $this->quantityAmount,
            new Uom($this->quantityUom)
        );
    }

    /**
     * Set createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @param  \DateTime $createdAt
     *
     * @return Product
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @param \DateTime $updatedAt
     *
     * @return Product
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
