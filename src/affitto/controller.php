<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace affitto;

use Response;
use strings;

class controller extends \Controller {
  protected $viewPath = __DIR__ . '/views/';

  protected function _hasImage($img = '') {
    if (file_exists($__f = $this->viewPath . $img)) {
      return $__f;
    }

    return false;
  }

  protected function _index($view = '') {
    if (preg_match('@\.(png|jpg|svg)$@', $view) && $_img = $this->_hasImage($view)) {
      \sys::serve($_img);
      return;
    }

    $this->render([
      'title' => $this->title = config::label,
      'primary' => 'blank',
      'secondary' => 'aside'

    ]);
  }

  protected function page($params) {

    if (!isset($params['latescripts'])) $params['latescripts'] = [];
    $params['css'][] = sprintf(
      '<link type="text/css" rel="stylesheet" media="all" href="%s" />',
      strings::url($this->route . '/css')

    );

    return parent::page($params);
  }

  protected function render($params) {
    $defaults = [
      'navbar' => config::navbar,
    ];

    $options = array_merge($defaults, $params);
    return parent::render($options);
  }

  public function about() {
    $this->load('about');
  }

  public function aside() {
    $this->load('aside');
  }

  public function css($lib = '') {
    $fit = new \FilesystemIterator(__DIR__ . '/css/');
    $css = [];
    foreach ($fit as $file) {
      // \sys::logger(sprintf('<%s> %s', $file->getRealPath(), __METHOD__));
      $css[] = \file_get_contents($file->getRealPath());
    }

    Response::css_headers();
    print implode(PHP_EOL, $css);
  }

  public function index($view = '') {
    $this->isPost() ?
      $this->postHandler() :
      $this->_index($view);
  }
}
