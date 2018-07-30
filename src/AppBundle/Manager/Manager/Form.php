<?php
/**
 * A generic class to create forms with Symfony classes
 * 
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\DependencyInjection\Tests\Compiler\C;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Forms;
use AppBundle\Manager\Manager\Bootstrap;
class Form extends Manager {
    
    /**
     * Text field
     *
     * @var Symfony\Component\Form\Extension\Core\Type\TextType
     */
    public static $TEXT;

    
    /**
     * Select field
     *
     * @var Symfony\Component\Form\Extension\Core\Type\ChoiceType
     */
    public static $SELECT;
    
     /**
     * Hidden field
     *
     * @var Symfony\Component\Form\Extension\Core\Type\HiddenType
     */
    public static $HIDDEN;

    /**
     * Password field
     *
     * @var Symfony\Component\Form\Extension\Core\Type\PasswordType
     */
    public static $PASSWORD;

    /**
     * Checkbox field
     *
     * @var Symfony\Component\Form\Extension\Core\Type\CheckboxType
     */
    public static $CHECKBOX;
    
    
    /**
     * Submit
     *
     * @var Symfony\Component\Form\Extension\Core\Type\HiddenType
     */
    public static $SUBMIT; 
 
 

    /**
     * __construct
     */
    public function __construct() {
      self::setFormTypes();
   }


   /**
    * setFormTypes
    * 
    */
   public static function setFormTypes() {
       self::$TEXT = TextType::class;
       self::$SELECT = ChoiceType::class;
       self::$HIDDEN = HiddenType::class;
       self::$PASSWORD = PasswordType::class;
       self::$CHECKBOX = CheckboxType::class;
       self::$SUBMIT = SubmitType::class;

   }

   
   /**
    *  Get form , get symofony form for given fiels
    * 
    * Example of param $fields:
    * 
    * [
    *   'startDate' => [
    *       'label' => 'Start Date',
    *       'key' => 'startDate',
    *       'type' => self::$TEXT,
    *       'value' => '2016-07-01',
    *   ],
    * 
    *   'systemId' => [
    *       'label' => 'System',
    *       'key' => 'systemId',
    *       'type' => self::$SELECT,
    *       'value' => '2',
    *       'options' => [
    *           0 => [
    *               'value' => 1,
    *               'name' => 'Test 1',
    *           ],
   *            1 => [
    *               'value' => 2,
    *               'name' => 'Test 2',
    *           ],
    *   ],
    * 
    *   'submit' => [
    *       'label' => 'Search',
    *       'key' => 'search',
    *       'default' => '0',
    *       'type' => self::$SUBMIT ,
    *       'value' => '',
    *   ],
    * 
    * ]
    * 
    * 
    * @param array $fields   See above
    * @param array $options  Options array
    *                           'formName'      Form name
    *                           'action'        Current page is default
    *                           'method'        GET or POST. GET is default
    *                           'entityType'    One of the databse entites
    *                                           Default is 'FormType::class'
    *                                           Which is not bound to any table
    *                           
    *
    *                       
    *
    */
    public function get($fields, $options = []) {
        
        //
        // Set options as user defined or by default values
        //
        $defaultOptions = [
            'formName' => '',
            'action' => $this->getBaseLink(),
            'method' => 'GET',
            'entityType' =>  FormType::class,
            'id' => false
        ];
        
        foreach ($defaultOptions  as $key =>$default) {
            $$key = isset($options[$key]) ? $options[$key] : $defaultOptions[$key];
        }

        $formOptions = [];

        // set id
        if ($id) {
            $formOptions['attr'] = ['id' => $id];
        }

        //Initialize form
        $form = $this->intializeForm($formName, $entityType, $fields, $action, $method, $formOptions);

        //
        // Set fields
        //
        foreach ($fields as $key => $field) {
            
            // Add standard input class for all fields
           $this->addStandardInputClassForField($field);

            $options =  $this->addFieldOptions($field);

           // Add select options
            if ($field['type'] == self::$SELECT) {
               $options['choices'] = $this->convertSelectOptions($field['options']);
            }
            
             // Add field
             $form->add($key, $field['type'], $options );
         };

        return  $form->getForm()->createView();
    }


    /**
     * intializeForm
     *
     *
     * @param string $formName
     * @param string $entityType
     * @param array $fields
     * @param string $action
     * @param string $method
     * @param array $formOptions
     * @return Symfony\Component\Form\FormBuilder
     */
   private function intializeForm($formName, $entityType, $fields, $action, $method, $formOptions) {

       $formValues = array_column($fields, 'value', 'key');
       $form = $this->getContainer()
           ->get('form.factory')
           ->createNamedBuilder($formName, $entityType, $formValues,
               $formOptions );

       // set action and method
       $form->setAction($action);
       $form->setMethod($method);

       return $form;
   }


    /**
     * convertSelectOptions
     *
     * Example of $optionsArr:
     *
     * [
     *      0 => [
     *              'name' => 'Test 1',
     *              'value' => 1,
     *          ],
     *      1 => [
     *              'name' => 'Test 2',
     *              'value' => 2,
     *          ],
     * ]
     *
     *
     * @param $optionsArr  array of select options in format above
     * 
     * @return array        Array of options in Symfony form format
     * 
     */
    private function convertSelectOptions($optionsArr) {

        $choices = array_column($optionsArr, 'value' ,'name' );
        $firstItem = ['Select' => 0  ];
        $choices = array_merge($firstItem, $choices);
        return $choices;
    }


    private function addFieldOptions($field) {

        $options = [];

        // set user defined options
        $optionOptions = ['label' , 'attr'];
        foreach ($optionOptions as $option) {
            if (isset($field[$option])) {
                $options[$option] =  $field[$option];
            }
        }

        // ignore HTML 5 required option
        $fieldTypesToIgnore = [self::$CHECKBOX, self::$TEXT, self::$PASSWORD];
        if (in_array($field['type'], $fieldTypesToIgnore )) {
            $options['required'] = false;

        }

        return $options;
    }


    /**
     * This function adds a the standard input classes for all input fields.
     *
     * The meaning is that there is an entity. All are similar.
     *
     * @param array $field
     */
    private function addStandardInputClassForField(&$field) {
        $field['attr']['class'] = isset($field['attr']['class'])
            ? $field['attr']['class'] . Bootstrap::$FORM_FIELD_STANDARD
            : Bootstrap::$FORM_FIELD_STANDARD;
    }

  
}