<?php

namespace DBlackborough\Quill\Delta;

use DBlackborough\Quill\Interfaces\DeltaInterface;

/**
 * Base delta class for all Delta objects
 *
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/php-quill-renderer/blob/master/LICENSE
 */
abstract class Delta implements DeltaInterface
{
    /**
     * @var array The attributes array
     */
    protected $attributes;

    /**
     * @var string The insert string
     */
    protected $insert;

    /**
     * @var boolean $is_first_child Is the delta the first child?
     */
    protected $is_first_child = false;

    /**
     * @var boolean $is_last_child Id the delta the last child?
     */
    protected $is_last_child = false;

    /**
     * @var Delta[] $children Child delta objects
     */
    protected $children = [];

    /**
     * Add a child delta
     *
     * @param Delta $delta
     *
     * @return void
     */
    public function addChild(Delta $delta)
    {
        $this->children[] = $delta;
    }

    /**
     * Return the child deltas
     *
     * @return Delta[]
     */
    public function children()
    {
        return array_reverse($this->children);
    }

    /**
     * Does the delta have any children
     *
     * @return boolean
     */
    public function hasChildren()
    {
        if (count($this->children) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Does the delta have any attributes
     *
     * @return boolean
     */
    public function hasAttributes(): bool
    {
        if (count($this->attributes) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Is the delta a child?
     *
     * @return boolean
     */
    public function isChild()
    {
        return false;
    }

    /**
     * If the delta is a child, is it the first child?
     *
     * @return boolean
     */
    public function isFirstChild()
    {
        return $this->is_first_child;
    }

    /**
     * If the delta is a child, is it the last child?
     *
     * @return boolean
     */
    public function isLastChild()
    {
        return $this->is_last_child;
    }

    /**
     * Return the attributes for the delta
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Return the plain insert string prior to any parsing
     *
     * @return string
     */
    public function getInsert()
    {
        return $this->insert;
    }

    /**
     * Render and return the string for the insert ready for the relevant
     * renderer
     *
     * @return string
     */
    public abstract function render();

    /**
     * Set the current delta to be the first child, alternatively,
     * set to false by passing false and clear the value
     *
     * @var boolean $value Set the value of $this->is_first_child, defaults to true
     *
     * @return Delta
     */
    public function setFirstChild($value = true)
    {
        $this->is_first_child = $value;

        return $this;
    }

    /**
     * Set the current delta to be the last child, alternatively,
     * set to false by passing false and clear the value
     *
     * @var boolean $value Set the value of $this->is_last_child, defaults to true
     *
     * @return Delta
     */
    public function setLastChild($value = true)
    {
        $this->is_last_child = $value;

        return $this;
    }

    /**
     * Set the insert string
     *
     * @param string $insert
     */
    public function setInsert(string $insert)
    {
        $this->insert = $insert;
    }

    /**
     * Escape the given insert string
     *
     * @param string $insert Insert string to escape
     *
     * @return string
     */
    protected abstract function escape($insert);
}
