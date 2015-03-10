<?php

namespace Hospity\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Red
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Red
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="vendedor_id", type="integer")
     */
    private $vendedorId;

    /**
     * @var integer
     *
     * @ORM\Column(name="comprador_id", type="integer")
     */
    private $compradorId;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_venta", type="string", length=255)
     */
    private $tipoVenta;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set vendedorId
     *
     * @param integer $vendedorId
     * @return Red
     */
    public function setVendedorId($vendedorId)
    {
        $this->vendedorId = $vendedorId;

        return $this;
    }

    /**
     * Get vendedorId
     *
     * @return integer 
     */
    public function getVendedorId()
    {
        return $this->vendedorId;
    }

    /**
     * Set compradorId
     *
     * @param integer $compradorId
     * @return Red
     */
    public function setCompradorId($compradorId)
    {
        $this->compradorId = $compradorId;

        return $this;
    }

    /**
     * Get compradorId
     *
     * @return integer 
     */
    public function getCompradorId()
    {
        return $this->compradorId;
    }

    /**
     * Set tipoVenta
     *
     * @param string $tipoVenta
     * @return Red
     */
    public function setTipoVenta($tipoVenta)
    {
        $this->tipoVenta = $tipoVenta;

        return $this;
    }

    /**
     * Get tipoVenta
     *
     * @return string 
     */
    public function getTipoVenta()
    {
        return $this->tipoVenta;
    }
}
