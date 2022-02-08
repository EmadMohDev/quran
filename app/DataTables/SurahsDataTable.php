<?php

namespace App\DataTables;

use App\Models\Surah;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SurahsDataTable extends DataTable
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
            ->editColumn('surah_type', function ($surah) {
                return $surah->surah_type ? 'Meccan' : 'Medinan';
            })
            ->filterColumn('surah_type', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if (preg_match('/' . $keywords . '/',  'meccan')) {
                    $query->where('surah_type', 1);
                } else if (preg_match('/' . $keywords . '/',  'medinan')) {
                    $query->where('surah_type', 0);
                }
            })
            ->addColumn('check', function (Surah $surah) {
                return '<input type="checkbox" class="check-box-id" value="'.$surah->id.'">';
            })
            ->addColumn('action', 'surahs.action')
            ->rawColumns(['action', 'check']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Surah $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Surah $model)
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
                    ->setTableId('surahs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->setTableAttribute('class', 'table table-bordered table-striped table-sm w-100 dataTable')
                    ->dom('Blfrtip')
                    ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
                    ->pageLength(10)
                    ->orderBy(0)
                    ->buttons([
                        Button::make()->text('<i class="fa fa-plus"></i>')->addClass('btn btn-info '.(false ? 'd-none' : ''))->action("window.location.href = " . '"' . url('surahs/create') . '"')->titleAttr('Create New Surah (c)')->key((false ? '' : '')),
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
            Column::make('id')->hidden(),
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width('2%')->addClass('text-center'),
            Column::make('number')->title('Number')->width('8%'),
            Column::make('name')->title('Name')->width(10),
            Column::make('name_en')->title('Name en')->width(10),
            Column::make('surah_type')->title('Surah Type')->width(10),
            Column::make('count_of_ayahs')->title('Count of Ayahs')->width(1),
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
        return 'Surahs_' . date('YmdHis');
    }
}
