<?php
namespace App\Filters;
use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParms = [];

   protected $columnMap = [];

    protected $operatorMap = [];

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