<?php

namespace ACFGravityformsField;

use acf_field;
use GFAPI;

class FieldForV4 extends acf_field
{
    /**
     * will hold info such as dir / path
     *
     * @var $settings
     */
    public $settings;

    /**
     * will hold default field options
     *
     * @var array
     */
    public $defaults;

    /**
     * Make sure we can easily access our notices
     *
     * @var Notices
     */
    public $notices;

    /**
     * Get our forms
     *
     * @var array
     */
    public $forms;

    public function __construct()
    {
        $this->name = 'form';
        $this->label = __('Forms', 'gravityforms');
        $this->category = __('Relational', 'acf'); // Basic, Content, Choice, etc
        $this->defaults = [
            'return_format' => 'form_object',
            'multiple'      => 0,
            'allow_null'    => 0
        ];

        // Get our notices up and running
        $this->notices = new Notices();

        if (class_exists('GFAPI')) {
            $this->forms = GFAPI::get_forms();
        }

        // Execute the parent constructor as well
        parent::__construct();
    }

    /**
     * Create extra settings for our gravityforms field. These are visible when editing a field.
     *
     * @param $field
     */
    public function create_options($field)
    {
        // defaults?
        $field = array_merge($this->defaults, $field);

        // key is needed in the field names to correctly save the data
        $key = $field['name'];

        // Create Field Options HTML
        ?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php echo __('Allow Null?', 'acf'); ?></label>
            </td>
            <td>
                <?php
                do_action('acf/create_field', [
                    'type'    => 'radio',
                    'name'    => 'fields[' . $key . '][allow_null]',
                    'value'   => $field['allow_null'],
                    'choices' => [
                        1 => __('Yes', 'acf'),
                        0 => __('No', 'acf'),
                    ],
                    'layout'  => 'horizontal',
                ]); ?>
            </td>
        </tr>

        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php echo __('Select multiple values?', 'acf'); ?></label>
            </td>
            <td>
                <?php
                do_action('acf/create_field', [
                    'type'    => 'radio',
                    'name'    => 'fields[' . $key . '][multiple]',
                    'value'   => $field['multiple'],
                    'choices' => [
                        1 => __('Yes', 'acf'),
                        0 => __('No', 'acf'),
                    ],
                    'layout'  => 'horizontal',
                ]); ?>
            </td>
        </tr>
        <?php

    }

    /**
     * Render our Gravity Form field with all the forms as options
     *
     * @param $field
     * @return bool
     */
    public function create_field($field)
    {
        // Set our defaults
        $field = array_merge($this->defaults, $field);
        $choices = [];

        // Stop if Gravityforms is not active
        if (!class_exists('GFAPI')) {
            $this->notices->isGravityformsActive(true, true);

            return false;
        }
        // Check if there are forms and set our choices
        if (!$this->forms) {
            $this->notices->hasActiveGravityForms(true, true);

            return false;
        }

        foreach ($this->forms as $form) {
            $choices[$form['id']] = $form['title'];
        }

        // Override field settings and start rendering
        $field['choices'] = $choices;
        $field['type'] = 'select';
    }


    /**
     * Return a form object when not empty
     *
     * @param $value
     * @param $post_id
     * @param $field
     * @return array|bool
     */
    public function format_value_for_api($value)
    {
        //If there are multiple forms, construct and return an array of form objects
        if (!empty($value) && is_array($value)) {
            $formObjects = [];
            foreach ($value as $key => $formId) {
                $form = GFAPI::get_form($formId);

                if (!is_wp_error($form)) { // Add it if it's not an error object
                    $formObjects[$key] = $form;
                }
            }

            if (!empty($formObjects)) { //Return false if the array is empty
                return $formObjects;
            }
        } elseif (!empty($value)) {  // If not an array return single form object

            $form = GFAPI::get_form($value);
            if (!is_wp_error($form)) { // Return the form object if it's not an error object. Otherwise return false.
                return $form;
            }
        }

        // Return false if value is empty
        return false;
    }
}
