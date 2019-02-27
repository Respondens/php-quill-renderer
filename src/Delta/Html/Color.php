<?php

namespace DBlackborough\Quill\Delta\Html;

/**
 * Default delta class for inserts with the 'color' attribute
 */
class Color extends Delta
{
    /**
     * Set the initial properties for the delta
     *
     * @param string $insert
     * @param array $attributes
     */
    public function __construct($insert, array $attributes = [])
    {
        $this->insert = $insert;
        $this->attributes = $attributes;
        $this->tag = 'span';
    }

    /**
     * Render the HTML for the specific Delta type
     *
     * @return string
     */
    public function render()
    {
        return "<{$this->tag} style=\"color: {$this->attributes['color']};\">{$this->escape($this->insert)}</{$this->tag}>";
    }
}
