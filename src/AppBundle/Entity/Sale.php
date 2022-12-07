<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sale")
 */
class Sale
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $date_add;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_order_detail;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_order;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string")
     */
    private $status;

    public function getId()
    {
        return $this->id;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function setDateAdd(\DateTime $date_add = null)
    {
        $this->date_add = $date_add;
    }

    public function getIdOrderDetail()
    {
        return $this->id_order_detail;
    }

    public function setIdOrderDetail($id_order_detail)
    {
        $this->id_order_detail = $id_order_detail;
    }

    public function getIdOrder()
    {
        return $this->id_order;
    }

    public function setIdOrder($id_order)
    {
        $this->id_order = $id_order;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function getProductQuantity()
    {
        return $this->product_quantity;
    }

    public function setProductQuantity($product_quantity)
    {
        $this->product_quantity = $product_quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}