<?php

namespace App\DataTables;

use App\Models\Audio;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AudiosDataTable extends DataTable
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
            ->addColumn('check', function (Audio $audio) {
                return '<input type="checkbox" class="check-box-id" value="'.$audio->id.'">';
            })
            ->editColumn('default_audio', function (Audio $audio) {
                return $audio->default_audio ? 'True' : 'False';
            })
            ->editColumn('src', function (Audio $audio) {
                if (file_exists($audio->src))
                    return '<button class="btn btn-sm show-tooltip btn-primary play-audio" style="position: relative;" data-href="'.url($audio->src).'" title="Play Audio"><i class="fa fa-play-circle"></i></button>';
                return '<button class="btn btn-sm show-tooltip btn-info" disabled title="Play Audio"><i class="fa fa-play-circle"></i></button>';
            })
            ->filterColumn('default_audio', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if (preg_match('/' . $keywords . '/',  'true')) {
                    $query->where('default_audio', 1);
                } else if (preg_match('/' . $keywords . '/',  'false')) {
                    $query->where('default_audio', 0);
                }
            })
            ->addColumn('action', 'audios.action')
            ->rawColumns(['action', 'check', 'src']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Audio $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Audio $model)
    {
        return $model->newQuery()->with('ayah')->when(request()->ayah, function ($query) {
            return $query->where('ayah_id', request()->ayah);
        });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('audios-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->setTableAttribute('class', 'table table-bordered table-striped table-sm w-100 dataTable')
                    ->dom('Blfrtip')
                    ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
                    ->pageLength(10)
                    ->orderBy(1)
                    ->buttons([
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
            Column::make('id')->title('ID')->width('5%'),
            Column::make('ayah.text')->title('Ayah'),
            Column::make('src')->title('Audio')->orderable(false)->searchable(false)->width('5%'),
            Column::make('quality')->title('Quality'),
            Column::make('default_audio')->title('Default'),
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
        return 'Audios_' . date('YmdHis');
    }
}
