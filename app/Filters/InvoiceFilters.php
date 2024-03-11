<?php

namespace App\Filters;

class InvoiceFilters extends ApiFilter {

  protected $safeParams = [
    'customerId' => ['eq', 'like'],
    'amount' => ['eq', 'ne', 'gt', 'gte', 'lt', 'lte'],
    'status' => ['eq', 'ne'],
    'billedDate' => ['eq', 'ne', 'gt', 'gte', 'lt', 'lte'],
    'paidDate' => ['eq', 'ne', 'gt', 'gte', 'lt', 'lte'],
  ];

  protected $columnMap = [
    'customerId' => 'customer_id',
    'billedDate' => 'billed_date',
    'paidDate' => 'paid_date',
  ];

  protected $operatorMap = [
    'eq' => '=',
    'ne' => '!=',
    'gt' => '>',
    'gte' => '>=',
    'lt' => '<',
    'lte' => '<=',
    'like' => 'like',
  ];

}