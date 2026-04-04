<?php
declare(strict_types=1);
/*
 * Copyright (C) 2026 mohamed
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Core;

/**
 * Description of Container
 *
 * @author mohamed
 */
class Container {
    private array $dependancies = [];
    
    public function Add(string $class, callable $create): void
    {
        $this->dependancies[$class] = $create;
    }
    
    public function Make(string $class){
        if(isset($this->dependancies[$class])){
            $this->dependancies[$class]($this);
        }
        
        return new $class;
    }
}
