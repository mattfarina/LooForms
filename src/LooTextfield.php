<?php

/**
 * @file
 * A Form Element.
 *
 * @author Matt Farina <matt@mattfarina.com>
 * @license http://opensource.org/licenses/lgpl-2.1.php The GNU Lesser GPL (LGPL) or an MIT-like license.
 */

class LooTextfield extends LooElement {
  public function html() {
    return '<input type="text"' . $this->renderAttributes($this->attributes). ' />';
  }
}