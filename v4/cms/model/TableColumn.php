<?php

/*
  Concerto Platform - Online Adaptive Testing Platform
  Copyright (C) 2011-2012, The Psychometrics Centre, Cambridge University

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; version 2
  of the License, and not any of the later versions.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

class TableColumn {

    public $name = "";
    public $type = "";
    public $null = false;
    public $default = null;
    public $extra = "";
    public $key = "";

    public static function from_mysql_result($r) {
        $obj = new TableColumn();
        $obj->name = $r['Field'];
        $obj->type = $r['Type'];
        $obj->null = $r['Null'];
        $obj->default = $r['Default'];
        $obj->extra = $r['Extra'];
        $obj->key = $r['Key'];
        return $obj;
    }

    public function get_type() {
        $type = explode("(", $this->type);
        return $type[0];
    }

    public function get_length() {
        $first = strpos($this->type, "(");
        if ($first === false) {
            return "";
        }
        $result = substr($this->type, $first + 1);
        $last = strrpos($result, ")");
        $result = substr($result, 0, $last);
        return $result;
    }

    public function is_id() {
        if ($this->name == "id" && $this->key == "PRI" && $this->extra == "auto_increment")
            return true;
        else
            return false;
    }

}

?>