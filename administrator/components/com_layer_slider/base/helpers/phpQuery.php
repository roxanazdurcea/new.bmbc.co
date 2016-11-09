<?php
/*-------------------------------------------------------------------------
# com_layer_slider - com_layer_slider
# -------------------------------------------------------------------------
# @ author    John Gera, George Krupa, Janos Biro
# @ copyright Copyright (C) 2014 Offlajn.com  All Rights Reserved.
# @ license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# @ website   http://www.offlajn.com
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');
?><?php

class phpQueryDOMDocument extends DOMDocument {
  protected $node;
  protected $html = null;

  public function children() {
    $this->node = $this->documentElement->lastChild->firstChild;
    return $this;
  }
  public function addClass($add) {
    $class = $this->node->getAttribute('class');
    $this->node->setAttribute('class', $class? "$class $add" : $add);
  }
  public function attr($attr, $value = null) {
    if ($value === null) return $this->node->getAttribute($attr);
    $this->node->setAttribute($attr, $value);
  }
  public function val($value = null) {
    return $this->attr('value', $value);
  }
  public function html($html) {
    $this->html = $html;
    $this->node->appendChild($this->createTextNode('__HTML__'));
  }
  public function append($html) {
    if ($this->html === null) $this->html($html);
    else $this->html .= $html;
  }
  public function __toString() {
    preg_match('/<body>(.*)<\/body>/', $this->saveHTML(), $match);
    return str_replace('__HTML__', $this->html, $match[1]);
  }
}

class phpQuery {
  static function newDocument($html) {
    $doc = new phpQueryDOMDocument();
    $doc->loadHTML($html);
    return $doc;
  }
}