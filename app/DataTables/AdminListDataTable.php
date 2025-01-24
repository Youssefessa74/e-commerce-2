<?php

namespace App\DataTables;

use App\Models\AdminList;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminListDataTable extends DataTable
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
                if ($query->id == 1) {
                    return 'you unauthorized';
                } else {
                    $edit = "<a href='" . route('admin.admin-list.edit', $query->id) . "' class='btn btn-inverse-primary m-2'><i class='fa-solid fa-pen'></i></a>";
                    $delete = "<a href='" . route('admin.admin-list.delete', $query->id) . "'
                    id='delete'
                    class='btn btn-inverse-danger m-2'
                    onclick=\"return confirm('Are you sure you want to delete this item?');\">
                    <i class='fa-solid fa-trash'></i>
                    </a>";
                    return $edit . $delete;
                }
            })
            ->addColumn('role', function ($query) {
                if ($query->id == 1) {
                    return 'Super Admin';
                } else {
                    return 'Admin';
                }
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('adminlist-table')
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
            Column::make('name'),
            Column::make('email'),
            Column::make('role'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),


        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AdminList_' . date('YmdHis');
    }
}
