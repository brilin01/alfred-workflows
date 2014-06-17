<?php
  /**
  * Image Placeholder Alfred workflow
  *
  * This PHP script generates a placehold.it image placeholder url and HTML code for Alfred.
  *
  * Version:  1.0.0
  * Revised:  6/16/14
  * Author:   Brian Lin
  * Website:  https://github.com/brilin01/alfred-workflows
  */

  error_reporting(0);

  require_once('workflows.php');
  $w = new Workflows();

  $query = preg_replace('/\s+/S', ' ', strtolower(trim($argv[1])));
  $args = explode(' ', $query);
  $icon = 'icon.png';
  $size = count($args);

  if ($size > 3) {
    $error = 'You entered too many arguments.';
    $w->result('error',
               'error',
               $error,
               'Enter a resolution and an optional background and font color.',
               $icon,
               'no');
    echo $w->toxml();
    die();
  }

  if (!preg_match('/^[1-9][0-9]*(?:x[1-9][0-9]*)?$/i', $args[0])) {
    $error = 'The entered resolution is invalid.';
    $w->result('error',
               'error',
               $error,
               'Enter width and height (ex. 50x50 or just 50 if width and height are both the same).',
               $icon,
               'no');
    echo $w->toxml();
    die();
  }

  if ($size > 1) {
    for ($i = 1; $i < $size; $i++) {
      if (!preg_match('/^([a-f0-9]{6}|[a-f0-9]{3})$/i', $args[$i])) {
        $error = 'The entered hex color is invalid.';
        $w->result('error',
                   'error',
                   $error,
                   'Enter hex color. Both 6 hex color and 3 hex color codes are accepted (ex. fff or ffffff).',
                   $icon,
                   'no');
        echo $w->toxml();
        die();
      }
    }
  }

  // If there are any missing values, they are given a default value of empty string.
  list($res, $bg_color, $font_color) = array_pad(explode(' ', $query), 3, '');

  $res = (strpos($res, 'x') === false ? 'Resolution: ' . $res . 'x' . $res : 'Resolution: ' . $res);
  $bg_color = (!empty($bg_color) ? ' Background: ' . $bg_color : '');
  $font_color = (!empty($font_color) ? ' Font: ' . $font_color : '');

  $output = 'http://placehold.it/' . str_replace(' ', '/', $query);
  $title = $output;
  $subtitle = $res . $bg_color . $font_color;

  // Prepare results for display.
  $w->result('result',
             $output,
             $title,
             $subtitle,
             $icon,
             'yes');

  // Return results to Alfred as XML.
  echo $w->toxml();
?>
