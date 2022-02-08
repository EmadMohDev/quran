<?php

namespace App\DataTables;

use App\Models\EditionLang;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EditionLanguagesDataTable extends DataTable
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
            ->addColumn('check', function (EditionLang $edition_lang) {
                return '<input type="checkbox" class="check-box-id" value="'.$edition_lang->id.'">';
            })
            ->addColumn('action', 'edition-languages.action')
            ->rawColumns(['action', 'check']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EditionType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EditionLang $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('edition-languages-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->setTableAttribute('class', 'table table-bordered table-striped table-sm w-100 dataTable')
                    ->dom('Blfrtip')
                    ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
                    ->pageLength(10)
                    ->orderBy(1)
                    ->buttons([
                        Button::make()->text('<i class="fa fa-plus"></i>')->addClass('btn btn-info '.(false ? 'd-none' : ''))->action("window.location.href = " . '"' . url('edition-languages/create') . '"')->titleAttr('Create New Edition Language (c)')->key((false ? '' : 'c')),
                        Button::make()->text('<i class="fa fa-trash"></i>')->addClass('btn btn-danger multi-delete '.(false ? 'd-none' : ''))->titleAttr('Delete (d)')->key((false ? '' : 'd')),
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
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width('2%')->addClass('text-center'),
            Column::make('id')->title('ID')->width('3%'),
            Column::make('name')->title('Name')->width(10),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width('5%')
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
        return 'EditionLanguages_' . date('YmdHis');
    }
}
