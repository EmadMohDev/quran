<?php

namespace App\DataTables;

use App\Models\Post;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Constants\ActiveStatus;

class PostsDataTable extends DataTable
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
            ->addColumn('index', function(Post $post) {
                return '<input type="checkbox" name="selected_rows[]" value="'.$post->id.'" class="roles select_all_template">';
            })
            ->addColumn('check', function (Post $post) {
                return '<input type="checkbox" class="check-box-id" value="'.$post->id.'">';
            })
            ->addColumn('url', function(Post $post) {
                return view('post.post_link', compact('post'))->render();
            })
            ->addColumn('status', function(Post $post) {
                return ActiveStatus::getLabel($post->active);
            })
            ->addColumn('action', 'post.action')
            ->rawColumns(['action', 'check', 'url']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
        return $model->newQuery()->with(['ayah', 'operator', 'user'])->when(request()->ayah, function ($query) {
            return $query->where('ayah_id', request()->ayah);
        })->groupBy('published_date', 'operator_id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('posts-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->setTableAttribute('class', 'table table-bordered table-striped table-sm w-100 dataTable')
                    ->dom('Blfrtip')
                    ->orderBy(1, 'asc')
                    ->lengthMenu([[100, 200, 300, 400], [100, 200, 300, 400]])
                    ->pageLength(100)
                    ->responsive(true)
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
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('id')->title('ID'),
            Column::make('ayah.text')->title('Ayah'),
            Column::make('operator.name')->title('Operator'),
            Column::make('user.name')->title('User'),
            Column::make('url'),
            Column::make('published_date'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
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
        return 'Posts_' . date('YmdHis');
    }
}
