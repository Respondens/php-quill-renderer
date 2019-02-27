<?php

namespace DBlackborough\Quill;

/**
 * Options for Quill
 *
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/php-quill-renderer/blob/master/LICENSE
 */
class Options
{
    const FORMAT_HTML = 'HTML';

    const FORMAT_MARKDOWN = 'Markdown';

    const FORMAT_GITHUB_MARKDOWN = 'GithubMarkdown';

    // Github flavoured markdown
    const GITHUB_MARKDOWN_TOKEN_STRIKE = '~~';

    const HTML_TAG_BOLD = 'strong';

    const HTML_TAG_HEADER = 'h';

    const HTML_TAG_ITALIC = 'em';

    const HTML_TAG_LIST_ITEM = 'li';

    const HTML_TAG_STRIKE = 's';

    const HTML_TAG_SUB_SCRIPT = 'sub';

    const HTML_TAG_SUPER_SCRIPT = 'sup';

    const HTML_TAG_UNDERLINE = 'u';

    const MARKDOWN_TOKEN_BOLD = '**';

    const MARKDOWN_TOKEN_HEADER = '#';

    const MARKDOWN_TOKEN_ITALIC = '*';

    const MARKDOWN_TOKEN_LIST_ITEM_UNORDERED = '* ';

    const HTML_TAG_LIST_ORDERED = 'ol';

    const HTML_TAG_LIST_UNORDERED = 'ul';

    const ATTRIBUTE_BOLD = 'bold';

    const ATTRIBUTE_COLOR = 'color';

    const ATTRIBUTE_HEADER = 'header';

    const ATTRIBUTE_ITALIC = 'italic';

    const ATTRIBUTE_LINK = 'link';

    const ATTRIBUTE_LIST = 'list';

    const ATTRIBUTE_LIST_ORDERED = 'ordered';

    const ATTRIBUTE_LIST_BULLET = 'bullet';

    const ATTRIBUTE_SCRIPT = 'script';

    const ATTRIBUTE_SCRIPT_SUB = 'sub';

    const ATTRIBUTE_SCRIPT_SUPER = 'super';

    const ATTRIBUTE_STRIKE = 'strike';

    const ATTRIBUTE_UNDERLINE = 'underline';
}
