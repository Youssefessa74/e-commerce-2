<?php

namespace App\DataTables;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {

                $edit = "<a href='" . route('admin.sub-category.edit', $query->id) . "' class='btn btn-inverse-primary m-2'><i class='fa-solid fa-pen'></i></a>";
                $delete = "<a href='" . route('admin.sub-category.delete', $query->id) . "'
                id='delete'
                class='btn btn-inverse-danger m-2'
                onclick=\"return confirm('Are you sure you want to delete this item?');\">
                <i class='fa-solid fa-trash'></i>
                </a>";
                return $edit . $delete;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    return "<span class='badge badge-success'>Active</span>";
                } else {
                    return "<span class='badge badge-danger'>In Active</span>";
                }
            })
            ->addColumn('created_by', function ($query) {
                return $query->user->name;
            })
            ->addColumn('category', function ($query) {
                return $query->category->name;
            })
            ->rawColumns(['status','action','created_by','category'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SubCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('subcategory-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('category'),
            Column::make('name'),
            Column::make('slug'),
            Column::make('created_by'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),


        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SubCategory_' . date('YmdHis');
    }
}
