<?php

/**
 * @file
 * Interface describing the individual form elements.
 *
 * @author Matt Farina <matt@mattfarina.com>
 * @license http://opensource.org/licenses/lgpl-2.1.php The GNU Lesser GPL (LGPL) or an MIT-like license.
 */

interface LooElementInterface {

  /**
   * Set a parent group object (implementing LooGroupInterface) to be used by
   * addElement.
   *
   * @param LooGroupInterface $parent
   *   An object implementing LooGroupInterface.
   *
   * @return LooElementInterface
   *   $this on the current object.
   */
  public function setParent($parent);

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
  public function addElement($element);

  /**
   * Render the form element to html.
   */
  public function render();

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
  public function prefix($prefix = NULL);

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
  public function suffix($suffix = NULL);

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
  public function defaultValue($default = NULL);

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
  public function label($label = NULL);

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
  public function attribute($name = NULL, $value = NULL);

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
  public function labelAttribute($name = NULL, $value = NULL);

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
  public function disabled($disabled = NULL);
}