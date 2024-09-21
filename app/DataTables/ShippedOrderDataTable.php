<?php

namespace App\DataTables;

use App\Models\Order;
use App\Models\ShippedOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippedOrderDataTable extends DataTable
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
                $showButton = "<a href='" . route('admin.order.show', $query->id) . "' class='btn btn-primary'><i class='far fa-eye'></i></a>";
                $deleteButton = "<a href='" . route('admin.order.destroy', $query->id) . "' class='btn btn-danger ml-2  mr-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                return $showButton . $deleteButton;
            })
            ->addColumn('customer', function ($query) {
                return $query->user->name;
            })
            ->addColumn('date', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('payment_status', function ($query) {
                if($query->payment_status == 1){
                    return "<span class='badge bg-success'>completed</span>";
                }else{
                    return "<span class='badge bg-warning'>pending</span>";
                }
            })
            ->addColumn('order_status', function ($query) {
                switch ($query->order_status){
                    case 'pending':
                        return "<span class='badge bg-warning'>Pending</span>";
                        break;
                    case 'processd_and_ready_to_ship':
                        return "<span class='badge bg-info'>Processed</span>";
                        break;
                    case 'dropped_off':
                        return "<span class='badge bg-info'>Dropped off</span>";
                        break;
                    case 'shipped':
                        return "<span class='badge bg-primary'>Shipped</span>";
                        break;
                    case 'out_for_delivery':
                        return "<span class='badge bg-primary'>Out for delivery</span>";
                        break;
                    case 'deliverd':
                        return "<span class='badge bg-success'>Deliverd</span>";
                        break;
                    case 'canceld':
                        return "<span class='badge bg-danger'>Canceld</span>";
                        break;
                    default:
                    break;
                }
                return ;
            })
            ->rawColumns(['customer', 'date', 'order_status', 'action', 'payment_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->where('order_status','shipped')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('shippedorder-table')
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
            Column::make('invoice_id'),
            Column::make('customer'),
            Column::make('date'),
            Column::make('product_quantity'),
            Column::make('amount'),
            Column::make('order_status'),
            Column::make('payment_status'),
            Column::make('payment_method'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(180)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ShippedOrder_' . date('YmdHis');
    }
}
