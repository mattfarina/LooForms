<?php

/**
 * @file
 * LooElement is an abstract class actual elements can use as a base. Yay for DRY.
 *
 * @author Matt Farina <matt@mattfarina.com>
 * @license http://opensource.org/licenses/lgpl-2.1.php The GNU Lesser GPL (LGPL) or an MIT-like license.
 */

abstract class LooElement implements LooElementInterface {

  /**
   * The elements prefix.
   */
  protected $prefix = NULL;

  /**
   * The elements suffix.
   */
  protected $suffix = NULL;

  /**
   * The elements default value.
   */
  protected $default = NULL;

  /**
   * The elements label.
   */
  protected $label = NULL;

  /**
   * The elements attributes.
   */
  protected $attributes = array();

  /**
   * The labels attributes.
   */
  protected $labelAttributes = array();

  /**
   * The parent group this element is attached to, if one exists.
   */
  protected $parent = NULL;

  public function setParent($parent) {
    $this->parent = $parent;
  }

  /**
   * Add an element to a parent form, fieldset, or other group.
   *
   * @param mixed $element
   *   A form element to add to the parent group.
   *
   * @return LooElementInterface
   *   A form element attached to the parent group.
   *
   * @see LooGroupInterface::addElement()
   */
  public function addElement($element) {
    if (isset($this->parent)) {
      $this->parent->addElement($element);
    }
    else {
      throw new Exception('No element parent group to add element to.');
    }
  }

  /**
   * Render the form element to html.
   */
  public function render() {
    $output = $this->prefix . "\n";
    if ($label = $this->label()) {
      // @todo We need a name on the label so when you click it the form element is selected
      $output .= '<label' . $this->renderAttributes($this->labelAttributes) . '>' . $label . '</label>';
    }
    $output .= $this->html() ."\n";
    $output .= $this->suffix . "\n";
    return $output;
  }

  /**
   * The html for the form element to render. This enables for a common render function.
   */
  abstract public function html();

  /**
   * Get/Set the elements prefix.
   *
   * @param string $prefix
   *   NULL to get the current value of the prefix or a string to set it.
   *
   * @return mixed
   *   If $prefix is NULL the value of the prefix is returned. If a string is
   *   passed in $this is returned.
   */
  public function prefix($prefix = NULL) {
    if (isset($prefix)) {
      $this->prefix = $prefix;
      return $this;
    }

    return $this->prefix;
  }

  /**
   * Get/Set the elements suffix.
   *
   * @param string $suffix
   *   NULL to get the current value of the suffix or a string to set it.
   *
   * @return mixed
   *   If $suffix is NULL the value of the suffix is returned. If a string is
   *   passed in $this is returned.
   */
  public function suffix($suffix = NULL) {
    if (isset($suffix)) {
      $this->suffix = $suffix;
      return $this;
    }

    return $this->suffix;
  }

  /**
   * Get/Set the elements default value.
   *
   * @param string $default
   *   NULL to get the current default value or a string to set it.
   *
   * @return mixed
   *   If $default is NULL the default value is returned. If a string is
   *   passed in $this is returned.
   */
  public function defaultValue($default = NULL) {
    if (isset($default)) {
      $this->default = $default;
      return $this;
    }

    return $this->default;
  }

  /**
   * Get/Set the elements label.
   *
   * @param string $label
   *   NULL to get the current label or a string to set it.
   *
   * @return mixed
   *   If $label is NULL the current label is returned. If a string is
   *   passed in $this is returned.
   */
  public function label($label = NULL) {
    if (isset($label)) {
      $this->label = $label;
      return $this;
    }

    return $this->label;
  }

  /**
   * Get/Set the elements attributes.
   *
   * If a name is passed in with no value the value of that attribute is
   * returned. If a name is passed in with a value that value is set for the
   * attribute. Instead of a name as the first argument and array of key value
   * pairs can be passed in with the key as the attribute name and the value
   * as the value for that attribute.
   *
   * @param mixed $name
   *   Either a string as the name of the attribute or an array of key value
   *   pairs where the key is the name of the attribute and the value is the
   *   value for that attribute.
   *
   * @param string $value
   *   If $name is a string and a non-NULL value is passed in as $value it is
   *   set as the value of the attribute name.
   *
   * @return mixed
   *   If no $value is passed in and a string is passed in for the $name the
   *   value of the attribute in $name is returned. Otherwise $this is returned.
   */
  public function attribute($name = NULL, $value = NULL) {
    if (isset($value)) {
      $this->attributes[$name] = $value;
      return $this;
    }
    else {
      return $this->attributes[$name] ? $this->attributes[$name] : NULL;
    }
  }

  /**
   * Get/Set the elements label attributes.
   *
   * If a name is passed in with no value the value of that attribute is
   * returned. If a name is passed in with a value that value is set for the
   * attribute. Instead of a name as the first argument and array of key value
   * pairs can be passed in with the key as the attribute name and the value
   * as the value for that attribute.
   *
   * @param mixed $name
   *   Either a string as the name of the attribute or an array of key value
   *   pairs where the key is the name of the attribute and the value is the
   *   value for that attribute.
   *
   * @param string $value
   *   If $name is a string and a non-NULL value is passed in as $value it is
   *   set as the value of the attribute name.
   *
   * @return mixed
   *   If no $value is passed in and a string is passed in for the $name the
   *   value of the attribute in $name is returned. Otherwise $this is returned.
   */
  public function labelAttribute($name = NULL, $value = NULL) {
    if (isset($value)) {
      $this->labelAttributes[$name] = $value;
      return $this;
    }
    else {
      return $this->labelAttributes[$name] ? $this->labelAttributes[$name] : NULL;
    }
  }

  /**
   * Get/Set if an element is disabled.
   *
   * @param mixed $disabled
   *   If a bool value is passed in it will set the disabled state. If no value
   *   is passed in the current state of disabled is returned.
   *
   * @return mixed
   *   If a bool value is passed into $disabled $this is returned. If no value
   *   passed into $disabled the current value of disabled is returned.
   */
  public function disabled($disabled = NULL) {
    if (isset($disabled)) {
      $this->disabled = $disabled;
      return $this;
    }

    return $this->disabled;
  }

  /**
   * Render an attributes array into html element attributes.
   *
   * @param array $attributes
   *   An array of attributes to convert to html attributes.
   *
   * @return string
   *   The array of attributes as a string for use in a html element.
   */
  protected function renderAttributes(array $attributes) {
    foreach ($attributes as $attribute => &$data) {
      $data = implode(' ', (array) $data);
      $data = $attribute . '="' . $data . '"';
    }

    return $attributes ? ' ' . implode(' ', $attributes) : '';
  }
}