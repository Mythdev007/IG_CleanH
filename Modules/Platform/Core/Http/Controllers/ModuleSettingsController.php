<?php


namespace Modules\Platform\Core\Http\Controllers;


use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Krucas\Settings\Facades\Settings;
use Modules\Platform\Core\Helper\CompanySettings;

class ModuleSettingsController extends AppBaseController
{

    use FormBuilderTrait;


    /**
     * Additional JavaScript Files to include
     * @var array
     */
    protected $jsFiles = [];

    protected $settingsMode = false;

    protected $globalMode = false;

    /**
     * Additioanl CSS Files to include
     * @var array
     */
    protected $cssFiles = [];

    /**
     * Module name - same as module folder
     * Example
     * - User Module = "expenses"
     * @var
     */
    protected $moduleName;

    /**
     * Path to language files
     * @var
     */
    protected $languageFile;

    /**
     * Settings Update Request
     * @var
     */
    protected $updateRequest;

    /**
     * Default Crud view
     * @var array
     */
    protected $views = [
        'show' => 'core::crud.module.settings.show',
    ];

    protected $routes = [

    ];

    /**
     * Show fields in show view and create/edit view
     *
     * Example @UserController
     *
     * @var array
     */
    protected $showFields = [

    ];

    protected $fieldsName = [

    ];

    /**
     * Link for back button from settings to main module
     * @var string
     */
    protected $settingsBackRoute = '';


    protected $formClass = null;

    protected $includeViews = [];

    public function __construct()
    {
        parent::__construct();

        \View::share('moduleName', $this->moduleName);
        \View::share('language_file', $this->languageFile);
        \View::share('includeViews', $this->includeViews);
        \View::share('settingsMode', $this->settingsMode);
        \View::share('jsFiles', $this->jsFiles);
        \View::share('cssFiles', $this->cssFiles);
        \View::share('settingsBackRoute', $this->settingsBackRoute);

    }

    public function show()
    {
        $view = view($this->views['show']);
        $view->with('form_request', $this->updateRequest);

        $view->with('show_fields', $this->showFields);
        $view->with('show_fileds_count', count($this->showFields));

        $form = $this->form($this->formClass, [
            'method' => 'POST',
            'url' => route($this->routes['save']),
            'id' => 'settingsForm',
            'model' => $this->getModelValues($this->fieldsName)
        ]);

        $view->with('modal_form', false);
        $view->with('form', $form);
        $view->with('settingsMode',$this->settingsMode);

        $this->attachToView($view);

        return $view;
    }

    public function attachToView(&$view){


    }

    private function getModelValues($fieldNames)
    {

        if (!$this->globalMode) {
            return CompanySettings::getMany($fieldNames);
        }

        $result = [];
        foreach ($fieldNames as $key) {
            $result[$key] = Settings::get($key);
        }

        return $result;

    }

    public function update()
    {

        if (config('vaance.demo')) {
            flash(trans('core::core.you_cant_do_that_its_demo'))->error();
            return redirect()->back();
        }

        $request = \App::make($this->updateRequest ?? Request::class);

        $form = $this->form($this->formClass);

        foreach ($form->getFieldValues(true) as $key => $value) {
            if ($this->globalMode) {
                Settings::set($key, $value);
            } else {
                CompanySettings::set($key, $value);
            }

        }

        flash(trans('core::core.entity.updated'))->success();

        return redirect(route($this->routes['show']));
    }


}
