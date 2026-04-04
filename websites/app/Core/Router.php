<?php
declare(strict_types=1);

namespace Core;
use Interfaces\iView;

use function count;
use function http_response_code;

/**
 * Description of Router
 * Dummy Router
 * [
 *      GET => [
 *                  "/test" => [
 *                                  "target" => "namespace\Controller@Method",
 *                                  "rules" => ["rule1", "rule2", "rule3"], 
 *                                  "neededParams" => 4
 *                              ],
 *                  "home" => ["#landing/index", []]
 *          ]
 * ]
 * @author mohamed
 */
class Router {
    private static array $routes = []; 
    
    public function __construct(private iView $Viewer, private iMiddleware $middleware) {  
    }
    
    private function MiddlewareCheck($rules): bool
    {
        foreach($rules as $rule){
            if($this->middleware->$rule === false){
                return false;
            }
        }
    }
    
    public function Add(string $method, string $route, string $target, array $rules = [], int $allowedParams = 0): void
    {
        self::$routes[$method][ $route] = ["target" => $target ,"rules" => $rules, "neededParams" => $allowedParams];
    }
    
    // URI: /unit/subunit/param1/param2 and who hand this is the App class.
    public function GoTo(string $method, string $path, array $params): void
    {
        if(!isset(self::$routes[$method])){
            http_response_code(405);
            die();
        }
        
        if(!isset(self::$routes[$method][$path])){
            http_response_code(404);
            die();
        }
        
        $route = self::$routes[$method][$path];
        
        if(count($params) !== $route["neededParams"]){
            http_response_code(400);
            die();
        }
                
        if(str_starts_with($route["target"], "#")){
           $unhashed = substr($route["target"], 1);
           $this->Viewer::HTML($unhashed);
        }else{
            $targetArr = explode("@", $route["target"]);
            call_user_func_array([(new $targetArr[0]), $targetArr[1]], $params);
        }
    }
}
