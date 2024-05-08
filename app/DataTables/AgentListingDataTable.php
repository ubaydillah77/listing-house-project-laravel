<?php

namespace App\DataTables;

use App\Models\AgentListing;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AgentListingDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.listing.edit', $query->id) . '" class="btn btn-sm btn-primary ml-2">
                    <i class="fas fa-edit"></i>
                </a>';
                $delete = '<a href="' . route('admin.listing.destroy', $query->id) . '" class="btn btn-sm btn-danger delete-item ml-2">
                    <i class="fas fa-trash"></i>
                </a>';
                $more = '<div class="btn-group dropleft">
                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu dropleft">
                                <a class="dropdown-item" href="' . route('admin.listing-image-gallery.index', ['id' => $query->id]) . '"> Image Gallery</a>
                                <a class="dropdown-item" href="' . route('admin.listing-video-gallery.index', ['id' => $query->id]) . '"> Video Gallery</a>
                                <a class="dropdown-item" href="' . route('admin.listing-schedule.index',  $query->id) . '"> Schedule</a>

                            </div>
                        </div>';
                return '<div class="d-flex justify-content-end">
                    ' . $edit . '
                    ' . $delete . '
                    ' . $more . '

                </div>';
            })
            ->addColumn('category', function ($query) {
                return $query->category->name;
            })
            ->addColumn('location', function ($query) {
                return $query->location->name;
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" width="60" alt="thumbnail" />';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $status =  '<span class="badge bg-primary">Active</span>';
                } else {
                    $status =  '';
                }

                if ($query->is_featured == 1) {
                    $is_featured = '<span class="badge bg-success">Featured</span>';
                } else {
                    $is_featured = '';
                }

                if ($query->is_verified == 1) {
                    $is_verified = '<span class="badge bg-info">Verified</span>';
                } else {
                    $is_verified = '';
                }

                if ($query->is_approved == 1) {
                    $is_verified = '<span class="badge bg-success">Approved</span>';
                } else {
                    $is_verified = '<span class="badge bg-danger">Not Approved</span>';
                }

                return $status . $is_featured . $is_verified;
            })


            ->rawColumns([
                'action', 'status',
                'image', 'by'
            ])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Listing $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('agentlisting-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
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
            Column::make('image'),
            Column::make('title'),
            Column::make('category'),
            Column::make('location'),
            Column::make('status'),


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
        return 'AgentListing_' . date('YmdHis');
    }
}
