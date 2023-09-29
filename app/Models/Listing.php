<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// to create a new model use php artisan make:model Listing
class Listing extends Model
{
    use HasFactory;
    // because it is an Eloquent model we declare scopeFunctionName instead of just normal functionName
    // but when we invoiced that function we just say ::filter without scope word
    // $query is instance of builder object - Illuminate\Database\Eloquent\Builder
    // with this query we can make query to our DB
    public function scopeFilter($query, array $filters): void {
        // ?? - isset(), it will return first operand if it exists and is not NULL,
        // otherwise it will return second operand
        // it this case it will work like if we have $filters['tag'] - do something with this tag, if we don't have, just ignore
        if($filters['tag'] ?? false){
            // SQL like query
            // get all objects if in column tags they have 'whatever (%) value of $filters['tag'] whatever (%)'
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }
        if($filters['search'] ?? false){
            // get every column from table listing
            $columns = Listing::getConnection()->getSchemaBuilder()->getColumnListing(Listing::getTable());
            foreach ($columns as $column){
                // check in every column for this data
                $query->orWhere($column, 'like', '%' . $filters['search'] . '%');
            }
        }
    }
}
