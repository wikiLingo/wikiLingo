<?
namespace WYSIWYGWikiLingo;

use WikiLingo;
use WYSIWYGWikiLingo\Renderer;

class Render extends WikiLingo\Render
{
    public $syntaxRenderer;

    function __construct(&$parser)
    {
        parent::__construct($parser);
        $this->syntaxRenderer = new Renderer\Syntax();
    }

    public function render(Parsed &$parsed)
    {
        $this->syntaxRenderer->render($parsed);
        parent::render($parsed);
    }
}