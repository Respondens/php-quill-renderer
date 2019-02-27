<?php

namespace DBlackborough\Quill\Delta\Html;

/**
 * Default delta class for inserts with the 'link' attribute
 *
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/php-quill-renderer/blob/master/LICENSE
 */
class Link extends Delta
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
        $this->tag = 'a';
    }

    /**
     * Render the HTML for the specific Delta type
     *
     * @return string
     */
    public function render()
    {
        return "<{$this->tag} href=\"{$this->attributes['link']}\">{$this->escape($this->insert)}</{$this->tag}>";
    }
}
