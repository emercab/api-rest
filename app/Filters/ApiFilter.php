<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {

  protected $safeParams = [];
  protected $columnMap = [];
  protected $operatorMap = [];

  public function transform (Request $request) {
    $eloQuery = [];

    foreach ($this->safeParams as $param => $operators) {

      // Check if the param exists in the request
      $query = $request->query($param);
      if (!isset($query)) {
        continue;
      }

      // Check if the param has a custom column name
      $column = $this->columnMap[$param] ?? $param;

      // Check if the param has a custom operator
      foreach ($operators as $operator) {
        if (isset($query[$operator])) {
          $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        }
      }
    }
    return $eloQuery;
  }
  

}