<?php

namespace App\DataTables;

use App\Models\Provider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProvidersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('check', function (Provider $provider) {
                return '<input type="checkbox" class="check-box-id" value="'.$provider->id.'">';
            })
            ->addColumn('is_active', function (Provider $provider) {
                if ($provider->is_active)
                    return '<span class="badge badge-success">Active</span>' . $this->checks ($provider->id, 'is_active', $provider->is_active ? 'checked' : '');;
                return '<span class="badge badge-danger">Disable</span> ' . $this->checks ($provider->id, 'is_active', $provider->is_active ? 'checked' : '');;
            })
            ->addColumn('feature', function (Provider $provider) {
                return $this->checks ($provider->id, 'feature', $provider->feature ? 'checked' : '');
            })
            ->addColumn('home_provider_section', function (Provider $provider) {
                return $this->checks ($provider->id, 'home_provider_section', $provider->home_provider_section ? 'checked' : '');
            })
            ->addColumn('home_edition_section', function (Provider $provider) {
                return $this->checks ($provider->id, 'home_edition_section', $provider->home_edition_section ? 'checked' : '');
            })
            ->filterColumn('is_active', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if (preg_match('/' . $keywords . '/',  'active')) {
                    $query->where('is_active', 1);
                } else if (preg_match('/' . $keywords . '/',  'disable')) {
                    $query->where('is_active', 0);
                }
            })
            ->addColumn('action', 'provider.action')
            ->rawColumns(['action', 'check', 'is_active', 'feature', 'home_provider_section', 'home_edition_section']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Provider $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Provider $model)
    {
        return $model->newQuery()->whenFeature();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('providers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->setTableAttribute('class', 'table table-bordered table-striped table-sm w-100 dataTable')
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
                    ->pageLength(10)
                    ->buttons([
                        Button::make()->text('<i class="fa fa-plus"></i>')->addClass('btn btn-info '.(get_action_icons('provider/create', 'get') ? '' : 'd-none'))->action("window.location.href = " . '"' . url('provider/create') . '"')->titleAttr('Create New Provider (c)')->key((get_action_icons('provider/create', 'get') ? '' : '')),
                        Button::make()->text('<i class="fa fa-trash"></i>')->addClass('btn btn-danger multi-delete '.(true ? '' : 'd-none'))->titleAttr('Delete (d)')->key((true ? 'd' : '')),
                        Button::make('print')->text('<i class="fa fa-print"></i>')->addClass('btn btn-success')->titleAttr('Print (p)')->key('p')->title($this->filename()),
                        Button::make('excel')->text('<i class="fa fa-file-excel-o"></i>')->addClass('btn btn-info')->titleAttr('Excel (e)')->key('e')->title($this->filename()),
                        Button::make('csv')->text('<i class="fa fa-file"></i>')->addClass('btn btn-primary')->titleAttr('CSV (s)')->key('s')->title($this->filename()),
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('id'),
            Column::make('name')->title('Name'),
            Column::make('name_en')->title('Name EN'),
            Column::make('is_active')->title('Is Active')->width('7%')->addClass('text-center'),
            Column::make('feature')->title('Slider Section')->width('7%')->addClass('text-center'),
            Column::make('home_provider_section')->title('Provider Section')->width('7%')->addClass('text-center'),
            Column::make('home_edition_section')->title('Edition Section')->width('7%')->addClass('text-center'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width('10%')
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Providers_' . date('YmdHis');
    }

    protected function checks ($id, $field, $check = '')
    {
        return '<label class="switch" for="'.$field.'_'.$id.'"><input id="'.$field.'_'.$id.'" type="checkbox" '.$check.' class="check-toggle" name="'.$field.'"><span class="slider round"></span></label>';
    }
}
