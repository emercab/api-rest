<?php

namespace App\Filters;

use Illuminate\Http\Request;

class CustomerFilters extends ApiFilter {

  protected $safeParams = [
    'name' => ['eq', 'like'],
    'type' => ['eq'],
    'email' => ['eq'],
    'phone' => ['eq', 'like'],
    'address' => ['eq', 'like'],
    'city' => ['eq', 'like'],
    'state' => ['eq', 'like'],
    'postalCode' => ['eq', 'gt', 'lt'],
  ];

  protected $columnMap = [
    'postalCode' => 'postal_code',
  ];

  protected $operatorMap = [
    'eq' => '=',
    'gt' => '>',
    'gte' => '>=',
    'lt' => '<',
    'lte' => '<=',
    'like' => 'like',
  ];

}