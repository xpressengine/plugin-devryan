<?php
/**
 * DevryanTheme.php
 *
 * PHP version 7
 *
 * @category    DevryanTheme
 * @package     Xpressengine\Plugins\DevryanTheme
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Plugins\Devryan\Components\Themes\Devryan;

use Xpressengine\Theme\GenericTheme;

/**
 * Class DevryanTheme
 *
 * php artisan plugin:private_install devryan
 *
 * @category    DevryanTheme
 * @package     Xpressengine\Plugins\DevryanTheme
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */
class DevryanTheme extends GenericTheme
{
    protected static $path = 'devryan/Components/Themes/Devryan';


    public $familySites = [];

    public function __construct()
    {
    }

    public function render()
    {
        $familySites = [];
        $config = $this->setting();
        if ($config->get('familySites', '') != '') {
            $lines = preg_split('/(\r\n|\n|\r)/', $config->get('familySites'));
            foreach ($lines as $familySiteInfo) {
                list($siteName, $siteUrl) = explode(',', $familySiteInfo);
                array_push($familySites, ['name' => $siteName, 'url' => $siteUrl]);
            }
        }
        $this->data['familySites'] = $familySites;

        $currentSubHeaderImage = '';
        $currentSubHeaderDescription = '';
        if ($config->get('useSubHeader') == 'Y') {
            $currentMenu = current_menu();
            $menuImage = null;
            if (is_null($currentMenu) == false) {
                $menuImage = $currentMenu->menuImage;
            }

            if (is_null($menuImage) == false) {
                $currentSubHeaderImage = $menuImage->url();
            } else {
                $currentSubHeaderImage = $config->get('subHeaderImage.path', '');
            }

            if (is_null($currentMenu) == false && $currentMenu->description != null) {
                $currentSubHeaderDescription = $currentMenu->description;
            } else {
                $currentSubHeaderDescription = xe_trans($config->get('subHeaderDescription', ''));
            }
        }
        $this->data['currentSubHeaderImage'] = $currentSubHeaderImage;
        $this->data['currentSubHeaderDescription'] = $currentSubHeaderDescription;

        return parent::render();
    }
}
