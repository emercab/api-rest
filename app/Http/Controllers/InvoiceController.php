<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

use App\Models\Invoice;
use App\Http\Resources\InvoiceCollection;
use App\Filters\InvoiceFilters;

class InvoiceController extends Controller
{
  /**
   * Display a lCustomeristing of the resource.
   */
  public function index(Request $request)
  {
    // Get the query items
    $filter = new InvoiceFilters();
    $queryItems = $filter->transform($request);

    // Get all invoices
    if (count($queryItems) == 0) {
      return new InvoiceCollection( Invoice::paginate() );
    }
    else {
      $invoices = Invoice::where($queryItems)->paginate();
      return new InvoiceCollection( $invoices->appends( $request->query() ) );
    }

  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreInvoiceRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Invoice $invoice)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Invoice $invoice)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateInvoiceRequest $request, Invoice $invoice)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Invoice $invoice)
  {
    //
  }
}
