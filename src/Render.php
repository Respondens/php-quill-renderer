<?php

namespace DBlackborough\Quill;

/**
 * Parse Quill generated deltas into the requested format
 *
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/php-quill-renderer/blob/master/LICENSE
 */
class Render
{
    /**
     * @var \DBlackborough\Quill\Parser\Parse
     */
    private $parser;

    /**
     * @var string
     */
    private $format;

    /**
     * Renderer constructor, pass in the $quill_json string and set the requested output format
     *
     * @param string $quill_json
     * @param string $format           Requested output format
     * @param bool   $allow_soft_enter Optional, default true
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($quill_json, $format = Options::FORMAT_HTML, $allow_soft_enter = true)
    {
        switch ($format) {
            case Options::FORMAT_GITHUB_MARKDOWN:
                $this->parser = new Parser\GithubMarkdown();
                break;

            case Options::FORMAT_HTML:
                $this->parser = new Parser\Html($allow_soft_enter);
                break;

            case Options::FORMAT_MARKDOWN:
                $this->parser = new Parser\Markdown();
                break;

            default:
                throw new \InvalidArgumentException('Requested $format not supported, formats supported, ' . implode(', ', [Options::FORMAT_HTML, OPTIONS::FORMAT_MARKDOWN]));
                break;
        }
        $this->format = $format;
        try {
            $this->parser->load($quill_json);
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Pass the content array to the renderer and return the generated output
     *
     * @param boolean Optionally trim the output
     *
     * @return string
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function render($trim = false)
    {
        if ($this->parser->parse() === true) {
            switch ($this->format) {
                case Options::FORMAT_GITHUB_MARKDOWN:
                    $renderer = new Renderer\GithubMarkdown();
                    break;

                case Options::FORMAT_HTML:
                    $renderer = new Renderer\Html();
                    break;

                case Options::FORMAT_MARKDOWN:
                    $renderer = new Renderer\Markdown();
                    break;

                default:
                    // Shouldn't be possible to get here
                    throw new \InvalidArgumentException('Requested $format not supported, formats supported, ' . implode(', ', [Options::FORMAT_HTML, OPTIONS::FORMAT_MARKDOWN]));
                    break;
            }

            return $renderer->load($this->parser->deltas())->render($trim);
        } else {
            throw new \Exception('Failed to parse the supplied $quill_json array');
        }
    }
}
