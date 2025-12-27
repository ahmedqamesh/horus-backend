<?php
namespace App\Services\V1;
use Illuminate\Http\Request;

class CustomerQuery
{
    protected $safeParms = [
        'name' => ["eq"],
        'type' => ["eq"],
        'email' => ["eq"],  
        'address' => ["eq"],
        'city' => ["eq"],
        'state' => ["eq"],
        'posalcode' => ["eq", "gt", "lt"],
    ];

   protected $columnMap = [
        'name' => 'name',
        'type' => 'type',
        'email' => 'email',
        'address' => 'address',
        'city' => 'city',
        'state' => 'state',
        'postalcode' => 'postal_code',
    ];

    protected $operatorMap = [
        "eq" => "=",
        "lt" => "<",
        "lte" => "<=",
        "gt" => ">",
        "gte" => ">=",
    ];

    public function transform(Request $request){
         $eloQuery = [];
         //iterate over safe params and set of allpwed operators
         foreach ($this->safeParms as $parm => $operators){
            // get value from query string
            $query =$request->query($parm);
            // if value doesnt exists for param
            if (!isset($query)){
                continue;
            }
            // get the column name for that query param
            $column = $this->columnMap[$parm] ?? $parm;
            // iterate over allowed operators for param
            foreach ($operators as $operator){
                // check if operator value exists in query string
                if(isset($query[$operator])){
                    $eloQuery[] = [
                        $column,
                        $this->operatorMap[$operator],
                        $query[$operator]
                    ];
                }
            }
        }
         return $eloQuery;
    }
}