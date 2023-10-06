<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'company', 'location', 'email', 'website', 'tags', 'description', 'logo'];

    public function scopeFilter($query, array $filters): void
    {
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }
        if($filters['search'] ?? false){
            $columns = Listing::getConnection()->getSchemaBuilder()->getColumnListing(Listing::getTable());
            foreach ($columns as $column){
                $query->orWhere($column, 'like', '%' . $filters['search'] . '%');
            }
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
