<?php
/**
 * CardSkin
 *
 * PHP version 7
 *
 * @category    Devryan
 * @package     Xpressengine\Plugins\Devryan
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Plugins\Devryan\Components\Skins\Board\Card;

use Xpressengine\Plugins\Board\Components\Skins\Board\Gallery\GallerySkin;

/**
 * CardSkin
 *
 * @category    Devryan
 * @package     Xpressengine\Plugins\Devryan
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */
class CardSkin extends GallerySkin
{
    protected static $path = 'devryan/Components/Skins/Board/Card';

    public function render()
    {
        if (in_array($this->view, ['index', 'show'])) {
            \Illuminate\Pagination\Paginator::defaultView(self::$path.'_pagination');
        }

        return parent::render();
    }
}
