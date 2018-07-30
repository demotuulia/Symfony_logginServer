<?php
/**
 * To contain classes for  Bootstrap
 *
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;


class Bootstrap extends Manager {

    /**
     * 
     * Table classes
     * 
     */

    /**
     * A basic table type
     * 
     * @var string
     */
    public static $TABLE_TYPE_BASIC = 'table  table-sm ';


    /**
     * A table type to render a table with each second row in diffrent color.
     * 
     * @var string
     */
    public static $TABLE_TYPE_STRIPED = 'table table-striped table-sm ';
    
    
    
    /**
     * Table row type danger. You can use this with table class '.table'
     * 
     * @var string
     */
    public static $TABLE_ROW_DANGER = 'table-danger';

    /**
     * Table row type warning. You can use this with table class '.table'
     *
     * @var string
     */
    public static $TABLE_ROW_WARNING = 'table-warning';


    /**
     * Table row type success. You can use this with table class '.table'
     *
     * @var string
     */
    public static $TABLE_ROW_SUCCESS = 'table-success';




    /**
     *
     * Form classes
     *
     */

    /**
     * Defult form
     * 
     * @var string
     */
    public static $FORM_DEFAULT = ' ';

    /**
     * Inline form 
     * 
     * @var string
     */
    public static $FORM_INLINE = 'form-inline';
    

    /**
     * Standard button a blue button to be used on this site.
     * 
     * @var string
     */
    public static $FORM_BUTTON_STANDARD = 'btn-primary btn-sm';


    /**
     * Standard class for all form fieds ot make the small
     * 
     * Note: there must be white space around the class name.
     * 
     * @var string
     */
    public static $FORM_FIELD_STANDARD = ' form-control-sm ';
    
       
}