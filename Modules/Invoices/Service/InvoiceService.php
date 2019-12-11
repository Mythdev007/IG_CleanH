<?php

namespace Modules\Invoices\Service;

use HipsterJazzbo\Landlord\Facades\Landlord;
use Modules\Invoices\Entities\Invoice;
use Modules\Invoices\Entities\InvoiceRow;
use Modules\Platform\Core\Helper\CompanySettings;

/**
 * Class InvoiceService
 * @package Modules\Invoices\Service
 */
class InvoiceService
{

    public function generateInvoiceNumber()
    {

        $number = $this->getInvoicePrefix();
        if ($this->isEnabledIncrement()) {
            $number .= str_pad($this->nextInvoiceNumber(), 6, "0", STR_PAD_LEFT);
        }
        return $number;
    }

    public function getDefaultDueDays(){
        return CompanySettings::get('s_invoice_due_days',7);
    }

    public function isEnabledIncrement()
    {
        return CompanySettings::get('s_invoice_use_increment');
    }

    public function getInvoicePrefix()
    {
        return CompanySettings::get('s_invoice_prefix');
    }

    public function nextInvoiceNumber()
    {
        if ($this->isEnabledIncrement()) {
            return CompanySettings::get('s_invoice_increment');
        }
    }

    public function updateInvoiceIterator()
    {
        $number = (int)$this->nextInvoiceNumber();

        $number = $number + 1;

        return CompanySettings::set('s_invoice_increment', $number);
    }

    /**
     * Count by status
     *
     * @param $status
     * @return mixed
     */
    public function countByStatus($status)
    {

        $invoices = Invoice::query()
            ->select('invoices.*')
            ->leftJoin('invoices_dict_status', 'invoices.invoice_status_id', '=', 'invoices_dict_status.id')
            ->where('invoices_dict_status.system_name', $status)->whereNull('invoices.deleted_at');

        if (Landlord::hasTenant('company_id')) {
            $invoices->where('invoices.company_id', Landlord::getTenantId('company_id'));
        }

        return $invoices->count();

    }


    /**
     * Create, Update, Remove Invoice Rows
     *
     * @param $entity
     * @param $rows
     */
    public function saveRows($entity, $rows)
    {
        $ids = [];;

        foreach ($rows as $row) {
            $row['invoice_id'] = $entity->id;

            if ($row['price_list_id'] == '') {
                $row['price_list_id'] = null;
            }

            if ($row['id'] > 0) { // Find and update

                $record = $entity->rows()->find($row['id']);
                $record->fill($row);
                $record->save();
            } else { // Create new record
                $record = new InvoiceRow();
                $record->fill($row);
                $record->save();
            }

            $ids[] = $record->id;
        }

        foreach ($entity->rows as $row) {
            if (!in_array($row->id, $ids)) { // Record is not in array of post ids - record was removed
                $row->delete();
            }
        }
    }
}
