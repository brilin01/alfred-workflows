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

  if (count($args) > 1) {
    $error = 'You entered too many arguments.';
    $w->result('error',
               'error',
               $error,
               'Enter a resolution.',
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

  $output = 'http://placehold.it/' . $args[0];
  $title = $output;
  $subtitle = (strpos($args[0], 'x') === false ? 'Resolution: ' . $args[0] . 'x' . $args[0] : 'Resolution: ' . $args[0]);

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
