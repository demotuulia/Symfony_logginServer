<?php
/**
 *  A service class to manage table app_users
 *
 */
namespace AppBundle\Manager\Manager\Entity;
 
use AppBundle\Manager\Manager\EntityManager;
use Doctrine\ORM\Query;
use AppBundle\Manager\Manager\Entity\Logs;
 
final class MailAlertFilter extends EntityManager{


    /**
     * filterOptions  cache
     *
     * @var array
     */
    private $filterOptions= [];


    /**
     * Get filter types
     *
     * @return array    'filterField'           Short name for the filter fields this value is used in the
     *                                          table 'mail_alert_filer' to make it readable
     *                  'filterFieldDatabase'   Database field, used by AppBundle.LogsManager to find
     *                                          logs
     *                  'operator'              Operator field, used by AppBundle.LogsManager to find
     *                                          logs
     *                  'value'                 Value field, used by AppBundle.LogsManager to find
     *                                          logs
     */             
    public  function getFilterTypes() {
        return [
            'system' => [
                'filterField' => 'system',
                'filterFieldDatabase' => logs::$SYSTEM_FILTER_FIELD,
                'operator' => '=',
                'value' => ''
            ],
            'type' => [
                'filterField' => 'type',
                'filterFieldDatabase' => logs::$TYPE_FILTER_FIELD,
                'operator' => '=',
                'value' => ''
            ],
            'level' => [
                'filterField' => 'level',
                'filterFieldDatabase' => logs::$LEVEL_FILTER_FIELD,
                'operator' => '=',
                'value' => ''
            ]
        ];
    }


    /**
     * Get the filter database filed of the given type
     * 
     * @param $type         See ''filterField' in function getFilterTypes()
     * @return string       See  'filterFieldDatabase' in function getFilterTypes()
     */
    public function getFilterDatabaseField($type) {
        $types = $this->getFilterTypes();
        return $types[$type]['filterFieldDatabase'];
    }
    
    
    /**
     * getFilters
     * 
     * 
     * @param $mailAlertId
     * @return mixed
     */
    public function getFilters($mailAlertId) {
        $filters = $this->find($mailAlertId, 'mailAlertId');

        array_map(
            function (&$filter) {
                $value = $filter->get('value');
                $filterOptions = $this->getFilterOptions($filter->get('filterField'));
                $labels = array_column($filterOptions,'name', 'value' );
                $filter->valueLabbel = isset($labels[$value]) ? $labels[$value] : '' ;
            },
            $filters
        );

       return $filters;
    }


    /**
     * Get filter options for the given type
     * @param string $type
     * @return array
     */
    public function getFilterOptions($type) {

        if (!isset($this->filterOptions[$type])) {
            switch ($type) {
                case 'level':
                    $manager = 'AppBundle.LogsLevelsManager';
                    break;
                case 'type':
                    $manager = 'AppBundle.LogsTypesManager';
                    break;
                case 'system' :
                    $manager = 'AppBundle.ClientSystemsManager';
                    break;
            }

            $this->filterOptions[$type] = $this->getContainer()->get($manager)->getMenu();
        }

        return $this->filterOptions[$type];
    }
 
 
 
}