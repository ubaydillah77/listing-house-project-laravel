<?php

namespace App\DataTables;

use App\Models\Location;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LocationDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.location.edit', $query->id) . '" class="btn btn-sm btn-primary ml-2">
                        <i class="fas fa-edit"></i>
                    </a>';
                $delete = '<a href="' . route('admin.location.destroy', $query->id) . '" class="btn btn-sm btn-danger delete-item ml-2">
                        <i class="fas fa-trash"></i>
                    </a>';
                return '<div class="d-flex justify-content-end">
                        ' . $edit . '
                        ' . $delete . '
                    </div>';
            })
            ->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home == 1) {
                    return '<span class="badge badge-primary">Yes</span>';
                } else {
                    return '<span class="badge badge-danger">No</span>';
                }
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    return '<span class="badge badge-primary">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->rawColumns(['action', 'show_at_home', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Location $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('location-table')
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

            Column::make('id')->width(50),
            Column::make('name')->width(150),
            Column::make('show_at_home')->width(80),
            Column::make('status')->width(50),
            Column::computed('action')
                ->exportable(true)
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
        return 'Location_' . date('YmdHis');
    }
}
