<?php
/**
 * GallerySkin.php
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

namespace Xpressengine\Plugins\Devryan\Components\Skins\Banner\Gallery;

use Xpressengine\Skin\GenericSkin;
use View;
use Carbon\Carbon;
use Xpressengine\Plugins\Banner\BannerWidgetSkin;

/**
 * Class GallerySkin
 *
 * @category    Devryan
 * @package     Xpressengine\Plugins\Devryan
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */
class GallerySkin extends BannerWidgetSkin
{
    /**
     * @var string
     */
    protected static $path = 'devryan/Components/Skins/Banner/Gallery';

    public static function getBannerInfo($key = null)
    {
        if ($key) {
            $key = '.'.$key;
        }
        return static::info('banner'.$key);
    }

    /**
     * 블레이드 템플릿을 사용하여 스킨을 출력한다.
     *
     * @param null|string $view view name
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|null
     */
    protected function renderBlade($view = null)
    {

        return parent::renderBlade($view);
    }

    public function renderBannerSetting($items = null)
    {
        if (is_array($items) == false) {
            $items = [];
        }

        return $view = View::make(sprintf('%s/views/setting', static::$path), [ 'item' => $items ]);
    }
}
