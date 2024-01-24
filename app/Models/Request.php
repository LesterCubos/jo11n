<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'request_date',
        'requester_name',
        'department',
        'requester_email',
        'product_sku',
        'product_category',
        'product_name',
        'requested_quantity',
        'request_purpose',
    ];

    public function generateReqNo()
    {
        // Retrieve the last Request number from the database
        $lastRequest = self::orderBy('reqNo', 'desc')->first();

        if (!$lastRequest) {
            $newRequestCode = '0001';
        } else {
            $lastRequestParts = $lastRequest->reqNo;
            $incrementedNumber = intval($lastRequestParts);
            $newRequestCode = str_pad($incrementedNumber + 1, 4, '0', STR_PAD_LEFT);

            // Keep incrementing the incremented number until a unique schedcode is generated
            while (self::where('reqNo', $newRequestCode)->exists()) {
                $incrementedNumber++;
                $newRequestCode = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
            }
        }
        
        $this->attributes['reqNo'] = $newRequestCode;
    }
}
