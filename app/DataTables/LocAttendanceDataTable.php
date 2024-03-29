<?php

namespace App\DataTables;

use App\Models\LocAttendance;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LocAttendanceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $dataTable->editColumn('created_at', function ($query) {
            return \Carbon\Carbon::parse($query->created_at)->format('d/m/Y H:i:s');
        });

        return $dataTable->addColumn('action', 'loc_attendances.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LocAttendance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LocAttendance $model)
    {
        return $model->with('user:id,name')
            ->when(!auth()->user()->can('isAdmin'), function($query) {
                $query->where('user_id', auth()->user()->id);
            })    
            ->addSelect('loc_attendances.*')
            ->orderBy('created_at')
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'asc'],[3,'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            'user.name',
            'latitude',
            'longitude',
            'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'loc_attendancesdatatable_' . time();
    }
}
