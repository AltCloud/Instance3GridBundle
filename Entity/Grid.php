<?php

namespace AltCloud\Instance3GridBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AltCloud\Instance3GridBundle\Entity\Grid
 */
class Grid
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $dir
     */
    private $dir;

    /**
     * @var string $style_props
     */
    private $style_props;

    /**
     * @var string $class_props
     */
    private $class_props;

    /**
     * @var string $target_controller
     */
    private $target_controller;

    /**
     * @var array $target_params
     */
    private $target_params;

    /**
     * @var AltCloud\Instance3GridBundle\Entity\Grid
     */
    private $children;

    /**
     * @var AltCloud\Instance3GridBundle\Entity\Grid
     */
    private $parent;

    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set dir
     *
     * @param string $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * Get dir
     *
     * @return string 
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Set style_props
     *
     * @param string $styleProps
     */
    public function setStyleProps($styleProps)
    {
        $this->style_props = $styleProps;
    }

    /**
     * Get style_props
     *
     * @return string 
     */
    public function getStyleProps()
    {
        return $this->style_props;
    }

    /**
     * Set class_props
     *
     * @param string $classProps
     */
    public function setClassProps($classProps)
    {
        $this->class_props = $classProps;
    }

    /**
     * Get class_props
     *
     * @return string 
     */
    public function getClassProps()
    {
        return $this->class_props;
    }

    /**
     * Set target_controller
     *
     * @param string $targetController
     */
    public function setTargetController($targetController)
    {
        $this->target_controller = $targetController;
    }

    /**
     * Get target_controller
     *
     * @return string 
     */
    public function getTargetController()
    {
        return $this->target_controller;
    }

    /**
     * Set target_params
     *
     * @param array $targetParams
     */
    public function setTargetParams($targetParams)
    {
        $this->target_params = $targetParams;
    }

    /**
     * Get target_params
     *
     * @return array 
     */
    public function getTargetParams()
    {
        return $this->target_params;
    }

    /**
     * Add children
     *
     * @param AltCloud\Instance3GridBundle\Entity\Grid $children
     */
    public function addGrid(\AltCloud\Instance3GridBundle\Entity\Grid $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param AltCloud\Instance3GridBundle\Entity\Grid $parent
     */
    public function setParent(\AltCloud\Instance3GridBundle\Entity\Grid $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return AltCloud\Instance3GridBundle\Entity\Grid 
     */
    public function getParent()
    {
        return $this->parent;
    }
}