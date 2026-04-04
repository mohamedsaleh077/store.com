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
use Interfaces\iSession;
use Interfaces\iMiddleware;

/**
 * Description of Middleware
 *
 * @author mohamed
 */
class Middleware 
implements iMiddleware
{
    public function __construct(private iSession $sessionManager) {
    }
    
    public function login(): bool {
        return $this->sessionManager->get("login") === true;
    }

    public function admin(): bool {
        return $this->sessionManager->get("role") === "admin";
    }

    public function customer(): bool {
        return $this->sessionManager->get("role") === "customer";
    }

    public function delivery(): bool {
        return $this->sessionManager->get("role") === "delivery";
    }

    public function owner(): bool {
        return $this->sessionManager->get("role") === "admin";
    }
}
