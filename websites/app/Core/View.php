<?php
declare(strict_types=1);

namespace Core;
use Interfaces\iView;

/**
 * Description of View
 *
 * @author mohamed
 */
class View
implements iView
{
    public static function HTML($page, $data = []){
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/View/" . $page . ".php";
    }
}
