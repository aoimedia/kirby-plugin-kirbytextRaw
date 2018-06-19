<?php
/*
 * Kirby 2 plugin - kirbytextRaw
 * Parse Markdown-formatted text as kirbytext without enclosing <p> tags
 *
 * Copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
 * License: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License
 * v1.0.3 (2018-06-03)
 *
 * Sample usage:
 * <?php echo $page->text()->kirbytextRaw() ?>
 */

function kirbytextRaw($content) {
  $text = kirbytext($content);
  return preg_replace('/(.*)<\/p>/', '$1', preg_replace('/<p>(.*)/', '$1', $text));
}
field::$methods['kirbytextRaw'] = field::$methods['ktr'] = function($field) {
  return kirbytextRaw($field->value);
};
