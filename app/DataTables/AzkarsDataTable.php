<?php

namespace App\DataTables;

use App\Models\Azkar;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AzkarsDataTable extends DataTable
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
            ->addColumn('check', function (Azkar $azkar) {
                return '<input type="checkbox" class="check-box-id" value="'.$azkar->id.'">';
            })
            ->addColumn('category.title', function (Azkar $azkar) {
                return '<a href="'.url('categories/'. $azkar->category_id .'/edit').'">'. $azkar->category->title .'</a>';
            })
            ->addColumn('action', function (Azkar $azkar) {
                return view('azkars.action', compact('azkar'));
            })
            ->rawColumns(['action', 'check', 'category.title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Azkar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Azkar $model)
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('azkars-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->setTableAttribute('class', 'table table-bordered table-striped table-sm w-100 dataTable')
                    ->dom('Blfrtip')
                    ->orderBy(1, 'asc')
                    ->lengthMenu([[15, 25, 50, 100], [15, 25, 50, 100]])
                    ->pageLength(15)
                    ->responsive(true)
                    ->buttons([
                        Button::make()->text('<i class="fa fa-plus"></i>')->addClass('btn btn-info '.(false ? 'd-none' : ''))->action("window.location.href = " . '"' . url('azkars/create') . '"')->titleAttr('Create New Zekr (r)')->key((false ? '' : '')),
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
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('id')->title('ID'),
            Column::make('category.title')->title('Category'),
            Column::make('zekr')->title('Zekr'),
            Column::make('count')->title('Count'),
            Column::make('reference')->title('Reference'),
            Column::make('description')->title('Description'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width('7%')
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
        return 'Azkars_' . date('YmdHis');
    }
}
