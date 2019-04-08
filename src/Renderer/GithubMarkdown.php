<?php

namespace DBlackborough\Quill\Renderer;

/**
 * Quill renderer, iterates over the Delta[] array to create the required Markdown
 *
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/php-quill-renderer/blob/master/LICENSE
 */
class GithubMarkdown extends Markdown
{
    /**
     * GithubMarkdown constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
