<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveIssue extends Model
{
    protected $fillable = [
        'date',
        'smrn',
        'psku',
        'pupc',
        'pname',
        'pcategory',
        'department',
        'sname',
        'quantity',
        'purchase_cost',
        'selling_cost',
        'expiry_date',
        'notes',
        'issuesmrn',
    ];

    public function generateStockMovementReferenceNo()
    {
        $currentYear = date('Y');

        $lastGeneratedCode = self::orderBy('smrn', 'desc')->first();
        if ($lastGeneratedCode === null || $lastGeneratedCode->smrn === '0') {
            $incrementedNumber = 1;
        } else {
            $codePartsString = strval($lastGeneratedCode->schedcode);
            preg_match_all('!\d+!', $codePartsString, $matches);
            $year = end($matches[0]);

            if ($year == $currentYear) {
                $lastGeneratedCodeParts = explode($currentYear, $lastGeneratedCode->smrn);
                $incrementedNumber = intval($lastGeneratedCodeParts[1]) + 1;
            } else {
                $incrementedNumber = substr($lastGeneratedCode->smrn, -4);
                $incrementedNumber++;
            }
        }

        $paddedIncrementedNumber = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
        $newRefNo = $currentYear . $paddedIncrementedNumber;

        return $newRefNo;
    }
}
