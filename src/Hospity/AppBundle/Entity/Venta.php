<?php

namespace Hospity\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table()
 * @ORM\Entity
 */

///TODO: Make a repository to get all the data.
class Venta
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
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Producto")
     */
    private $producto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_venta", type="datetime")
     */
    private $fechaVenta;

    /**
     * @var string
     *
     * @ORM\Column(name="ganancia_vendedor", type="decimal")
     */
    private $gananciaVendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="ganancia_admin", type="decimal")
     */
    private $gananciaAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=15)
     */
    private $status;

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
     * Set producto
     *
     * @param string $producto
     * @return Venta
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return string 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set fechaVenta
     *
     * @param \DateTime $fechaVenta
     * @return Venta
     */
    public function setFechaVenta($fechaVenta)
    {
        $this->fechaVenta = $fechaVenta;

        return $this;
    }

    /**
     * Get fechaVenta
     *
     * @return \DateTime 
     */
    public function getFechaVenta()
    {
        return $this->fechaVenta;
    }

    /**
     * Set gananciaVendedor
     *
     * @param string $gananciaVendedor
     * @return Venta
     */
    public function setGananciaVendedor($gananciaVendedor)
    {
        $this->gananciaVendedor = $gananciaVendedor;

        return $this;
    }

    /**
     * Get gananciaVendedor
     *
     * @return string 
     */
    public function getGananciaVendedor()
    {
        return $this->gananciaVendedor;
    }

    /**
     * Set gananciaAdmin
     *
     * @param string $gananciaAdmin
     * @return Venta
     */
    public function setGananciaAdmin($gananciaAdmin)
    {
        $this->gananciaAdmin = $gananciaAdmin;

        return $this;
    }

    /**
     * Get gananciaAdmin
     *
     * @return string 
     */
    public function getGananciaAdmin()
    {
        return $this->gananciaAdmin;
    }
}
