<?php

namespace Modules\Accounts\Datatables;

use Modules\Accounts\Entities\Account;
use Modules\Accounts\Entities\AccountIndustry;
use Modules\Accounts\Entities\AccountPaymentCondition;
use Modules\Accounts\Entities\AccountRating;
use Modules\Accounts\Entities\AccountType;
use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Core\QueryBuilderParser\QueryBuilderParser;
use Modules\Platform\Settings\Entities\Country;
use Modules\Platform\Settings\Entities\Currency;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;

/**
 * Class AccountDataTable - Index dataTable of Account module
 *
 * @category Datatable
 * @package  Modules\Accounts\Datatables
 * @author   Laravel-BAP <hello@laravel.vaance.com>
 * @license  Standard  http://laravel-vaance.com/license
 * @link     http://laravel-vaance.com
 */
class AccountDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'accounts.accounts.show';

    protected $editRoute = 'accounts.accounts.edit';

    public static function availableQueryFilters()
    {
        return [
            [
                'id' => 'accounts.name',
                'label' => trans('accounts::accounts.form.name'),
                'type' => 'string',
            ],
            [
                'id' => 'accounts.website',
                'label' => trans('accounts::accounts.form.website'),
                'type' => 'string',
            ]
            ,
            [
                'id' => 'accounts.account_number',
                'label' => trans('accounts::accounts.form.account_number'),
                'type' => 'string',
            ],
            [
                'id' => 'accounts.employees',
                'label' => trans('accounts::accounts.form.employees'),
                'type' => 'integer',
            ],
            [
                'id' => 'accounts.extra_id',
                'label' => trans('accounts::accounts.form.extra_id'),
                'type' => 'string',
            ],
            [
                'id' => 'accounts.account_type_id',
                'label' => trans('accounts::accounts.form.account_type_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => AccountType::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'accounts.payment_condition_id',
                'label' => trans('accounts::accounts.form.payment_condition_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => AccountPaymentCondition::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'accounts.payment_currency_id',
                'label' => trans('accounts::accounts.form.payment_currency_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => Currency::pluck('code', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'accounts.account_industry_id',
                'label' => trans('accounts::accounts.form.account_industry_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => AccountIndustry::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'accounts.account_rating_id',
                'label' => trans('accounts::accounts.form.account_rating_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => AccountRating::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'accounts.phone',
                'label' => trans('accounts::accounts.form.phone'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.email',
                'label' => trans('accounts::accounts.form.email'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.secondary_email',
                'label' => trans('accounts::accounts.form.secondary_email'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.fax',
                'label' => trans('accounts::accounts.form.fax'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.skype_id',
                'label' => trans('accounts::accounts.form.skype_id'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.street',
                'label' => trans('accounts::accounts.form.street'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.annual_revenue',
                'label' => trans('accounts::accounts.form.annual_revenue'),
                'type' => 'double'
            ],
            [
                'id' => 'accounts.state',
                'label' => trans('accounts::accounts.form.state'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.country_id',
                'label' => trans('accounts::accounts.form.country_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => Country::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'vaance_country.continent',
                'label' => trans('accounts::accounts.form.continent'),
                'type' => 'string',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => Country::pluck('continent', 'continent'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'accounts.zip_code',
                'label' => trans('accounts::accounts.form.zip_code'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.notes',
                'label' => trans('accounts::accounts.form.notes'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.tax_number',
                'label' => trans('accounts::accounts.form.tax_number'),
                'type' => 'string'
            ],
            [
                'id' => 'accounts.created_at',
                'label' => trans('core::core.table.created_at'),
                'type' => 'date',
                'input_event' => 'dp.change',
                'plugin' => 'datetimepicker',
                'plugin_config' => [
                    'locale' => app()->getLocale(),
                    'calendarWeeks' => true,
                    'showClear' => true,
                    'showTodayButton' => true,
                    'showClose' => true,
                    'format' => \Modules\Platform\Core\Helper\UserHelper::userJsDateFormat()
                ]
            ],

            [
                'id' => 'accounts.updated_at',
                'label' => trans('core::core.table.updated_at'),
                'type' => 'date',
                'input_event' => 'dp.change',
                'plugin' => 'datetimepicker',
                'plugin_config' => [
                    'locale' => app()->getLocale(),
                    'calendarWeeks' => true,
                    'showClear' => true,
                    'showTodayButton' => true,
                    'showClose' => true,
                    'format' => \Modules\Platform\Core\Helper\UserHelper::userJsDateFormat()
                ]
            ],
        ];
    }

    public static function availableColumns()
    {
        return
            [
                'name' => [
                    'data' => 'name',
                    'title' => trans('accounts::accounts.form.name'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'website' => [
                    'data' => 'website',
                    'title' => trans('accounts::accounts.form.website'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],

                'type' => [
                    'name' => 'accounts_dict_type.name',
                    'data' => 'type',
                    'title' => trans('accounts::accounts.form.account_type_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'payment_condition' => [
                    'name' => 'accounts_dict_payment_condition.name',
                    'data' => 'payment_condition',
                    'title' => trans('accounts::accounts.form.payment_condition_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'payment_currency' => [
                    'name' => 'vaance_currency.code',
                    'data' => 'payment_currency',
                    'title' => trans('accounts::accounts.form.payment_currency_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'industry' => [
                    'name' => 'accounts_dict_industry.name',
                    'data' => 'industry',
                    'title' => trans('accounts::accounts.form.account_industry_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'rating' => [
                    'name' => 'accounts_dict_rating.name',
                    'data' => 'rating',
                    'title' => trans('accounts::accounts.form.account_rating_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],

                'account_number' => [
                    'data' => 'account_number',
                    'title' => trans('accounts::accounts.form.account_number'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'annual_revenue' => [
                    'data' => 'annual_revenue',
                    'title' => trans('accounts::accounts.form.annual_revenue'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'employees' => [
                    'data' => 'employees',
                    'title' => trans('accounts::accounts.form.employees'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'phone' => [
                    'data' => 'phone',
                    'title' => trans('accounts::accounts.form.phone'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'email' => [
                    'data' => 'email',
                    'title' => trans('accounts::accounts.form.email'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'secondary_email' => [
                    'data' => 'secondary_email',
                    'title' => trans('accounts::accounts.form.secondary_email'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'fax' => [
                    'data' => 'fax',
                    'title' => trans('accounts::accounts.form.fax'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'skype_id' => [
                    'data' => 'skype_id',
                    'title' => trans('accounts::accounts.form.skype_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'street' => [
                    'data' => 'street',
                    'title' => trans('accounts::accounts.form.street'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'city' => [
                    'data' => 'city',
                    'title' => trans('accounts::accounts.form.city'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'state' => [
                    'data' => 'state',
                    'title' => trans('accounts::accounts.form.state'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'country' => [
                    'data' => 'country',
                    'name' => 'vaance_country.name',
                    'title' => trans('accounts::accounts.form.country_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'zip_code' => [
                    'data' => 'zip_code',
                    'title' => trans('accounts::accounts.form.zip_code'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'tax_number' => [
                    'data' => 'tax_number',
                    'title' => trans('accounts::accounts.form.tax_number'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'created_at' => [
                    'data' => 'created_at',
                    'title' => trans('core::core.table.created_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ],
                'updated_at' => [
                    'data' => 'updated_at',
                    'title' => trans('core::core.table.updated_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ],
                'owner' => [
                    'data' => 'owner',
                    'title' => trans('core::core.table.assigned_to'),
                    'data_type' => 'assigned_to',
                    'orderable' => false,
                    'column_name' => 'assigned_to',
                    'filter_type' => 'select',
                    'select_type' => 'select2',
                    'select_type_options' => [
                        'theme' => "bootstrap",
                        'width' => '100%'
                    ],
                    'filter_data' => DataTableHelper::filterOwnerDropdown()
                ]
            ];
    }

    protected function setFilterDefinition()
    {
        $this->filterDefinition = self::availableQueryFilters();
    }

    /**
     * DataTable definition
     *
     * @param Object $query Query object
     *
     * @return EloquentDataTable
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);


        $this->applyLinks($dataTable, self::SHOW_URL_ROUTE);

        $dataTable->filterColumn('owner', function ($query, $keyword) {
            DataTableHelper::queryOwner($query, $keyword,'accounts');
        });

        $dataTable->filterColumn('created_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('accounts.created_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('accounts.updated_at', array($dates[0], $dates[1]));
            }
        });


        return $dataTable;
    }

    /**
     * @param Account $model
     *
     * @return $this
     */
    public function query(Account $model)
    {

        $query = $model->newQuery()
            ->with('owner')
            ->leftJoin('accounts_dict_industry','accounts.account_industry_id','=','accounts_dict_industry.id')
            ->leftJoin('accounts_dict_rating','accounts.account_rating_id','=','accounts_dict_rating.id')
            ->leftJoin('accounts_dict_type','accounts.account_type_id','=','accounts_dict_type.id')
            ->leftJoin('vaance_country', 'accounts.country_id', '=', 'vaance_country.id')
            ->leftJoin('vaance_currency', 'accounts.payment_currency_id', '=', 'vaance_currency.id')
            ->leftJoin('accounts_dict_payment_condition', 'accounts.payment_condition_id', '=', 'accounts_dict_payment_condition.id')
            ->select(
                'accounts.*',
                'vaance_country.name as country',
                'accounts_dict_industry.name as industry',
                'accounts_dict_rating.name as rating',
                'accounts_dict_payment_condition.name as payment_condition',
                'vaance_currency.code as payment_currency'
            );

        if (!empty($this->filterRules)) {
            $queryBuilderParser = new  QueryBuilderParser();
            $queryBuilder = $queryBuilderParser->parse($this->filterRules, $query);

            return $queryBuilder;
        }

        return $query;
    }

    /**
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->setTableAttribute('class', 'table table-hover')
            ->parameters([
                'dom' => 'lBfrtip',
                'responsive' => false,
                'stateSave' => false,
                'filterDefinitions' => $this->getFilterDefinition(),
                'filterRules' => $this->filterRules,
                'headerFilters' => true,
                'buttons' => DataTableHelper::buttons(),
                'regexp' => true

            ]);
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        if (!empty($this->advancedView)) {
            $result = [];
            if ($this->allowSelect) {
                $result = $this->btnCheck_selection;
            }
            return $result + $this->advancedView;
        }

        $columns =  self::availableColumns();


        $result = [];

        if ($this->allowSelect) {
            $result =  $this->btnCheck_selection;
        }
        if ($this->allowUnlink) {
            $result =  $this->btnUnlink ;
        }
        if ($this->allowQuickEdit) {
            $result =  $result + $this->btnQuick_edit; ;
        }

        $result = $result + $columns;

        return $result;
    }
}
