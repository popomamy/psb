<?php

namespace App\DataTables;

use App\Models\Form;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendaftarDatatable extends DataTable
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
            ->addIndexColumn()
            ->addColumn('action', function (Form $form) {
                $action = view('components.action')->with([
                    'id' => $form->id
                ]);

                return $action;
            })
            ->addColumn('total', function (Form $form) {
                return $form->nilai_indo + $form->nilai_ing + $form->nilai_ipa + $form->nilai_mtk;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Form $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Form $model)
    {
        return $model->newQuery()->with('user');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('pendaftar-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(6)
            ->parameters([
                'autowidth' => false
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
            Column::make('user.name')->title('Nama'),
            Column::make('nilai_mtk')->title('Matematika'),
            Column::make('nilai_indo')->title('B. Indonesia'),
            Column::make('nilai_ing')->title('B. Inggris'),
            Column::make('nilai_ipa')->title('IPA'),
            Column::make('total')->title('Total Nilai'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Pendaftar_' . date('YmdHis');
    }
}
