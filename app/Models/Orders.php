<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'tron',
        'ordate',
        'orsupname',
        'orsupnumber',
        'orsku',
        'orpname',
        'orpcat',
        'orpdept',
        'orpmins',
        'orpcurs',
        // 'orquan',
        // 'orpcost',
        // 'ortcost',
        'orstatus',
    ];

    public function generateTransNo()
    {
        // Retrieve the last transaction number from the database
        $lastTransaction = self::orderBy('tron', 'desc')->first();

        if (!$lastTransaction) {
            $newTransactionCode = '0001';
        } else {
            $lastTransactionParts = $lastTransaction->transNo;
            $incrementedNumber = intval($lastTransactionParts);
            $newTransactionCode = str_pad($incrementedNumber + 1, 4, '0', STR_PAD_LEFT);

            // Keep incrementing the incremented number until a unique schedcode is generated
            while (self::where('tron', $newTransactionCode)->exists()) {
                $incrementedNumber++;
                $newTransactionCode = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
            }
        }
        
        $this->attributes['tron'] = $newTransactionCode;
    }
}