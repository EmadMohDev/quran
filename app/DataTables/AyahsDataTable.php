<?php

namespace App\DataTables;

use App\Models\Ayah;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AyahsDataTable extends DataTable
{

    // 'B' => To display all buttons on table header [export, print, etc...]
    // 'l' => To display select pagination length
    // 'f' => To display input search
    // 'r' => To display process element
    // 'i' => To display the count of rows in table with the count of pagination
    // 'p' => To display the paginate design
    // 't' => To display the 'i' and 'p' on the footer table [ without it will display on header ]

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
            ->addColumn('check', function (Ayah $ayah) {
                return '<input type="checkbox" class="check-box-id" value="'.$ayah->id.'">';
            })
            ->addColumn('audio', function (Ayah $ayah) {
                if ($ayah->audios_count > 0) {
                    return '<button class="btn btn-sm show-tooltip btn-primary play-audio" style="position: relative;" data-href="'.url($ayah->audioSrc()).'" title="Play Audio"><i class="fa fa-play-circle"></i></button>';
                }
                return '<button class="btn btn-sm show-tooltip btn-info" disabled title="Play Audio"><i class="fa fa-play-circle"></i></button>';
            })
            ->editColumn('is_sajda', function (Ayah $ayah) {
                return $ayah->is_sajda ? 'True' : 'False';
            })
            ->filterColumn('is_sajda', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if (preg_match('/' . $keywords . '/',  'true')) {
                    $query->where('is_sajda', 1);
                } else if (preg_match('/' . $keywords . '/',  'false')) {
                    $query->where('is_sajda', 0);
                }
            })
            ->addColumn('action', function (Ayah $ayah) {
                return view('ayahs.action', compact('ayah'));
            })
            ->rawColumns(['action', 'check', 'audio']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ayah $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ayah $model)
    {
        return $model->newQuery()->when(request()->surah, function ($query) {
            return $query->where('surah_id', request()->surah);
        })->when(request()->edition, function ($query) {
            return $query->where('edition_id', request()->edition);
        })->with(['surah', 'edition', 'edition.provider'])->withCount('audios');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('ayahs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->setTableAttribute('class', 'table table-bordered table-striped table-sm w-100 dataTable')
                    ->dom('Blfrtip')
                    ->orderBy(1, 'asc')
                    ->lengthMenu([[15, 200, 300, 400], [15, 200, 300, 400]])
                    ->pageLength(15)
                    ->responsive(true)
                    ->buttons([
                        Button::make()->text('<i class="fa fa-plus"></i>')->addClass('btn btn-info '.(false ? 'd-none' : ''))->action("window.location.href = " . '"' . url('ayahs/create') . '"')->titleAttr('Create New Ayah (r)')->key((false ? '' : '')),
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
            Column::make('number')->title('Full Order'),
            Column::make('text')->title('Text'),
            Column::make('audio')->title('Audio')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('surah.name')->title('Surah'),
            Column::make('edition.identifier')->title('Edition'),
            Column::make('edition.provider.name')->title('Provider'),
            Column::make('order_in_surah')->title('Order in Surah'),
            Column::make('juz')->title('Juz'),
            Column::make('page')->title('Page'),
            Column::make('hizb_quarter')->title('Hizb Quarter'),
            Column::make('ruku')->title('Ruku'),
            Column::make('manzil')->title('Manzil'),
            Column::make('is_sajda')->title('Sajda'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width('13%')
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
        return 'Ayahs_' . date('YmdHis');
    }
}
