<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function generateNoPendaftar()
    {
        $count = Form::whereYear('created_at', date('Y'))->select('id')->count();
        $number = $count + 1;
        $length = strlen($number);
        $day = date('d');
        $month = date('m');

        switch ($length) {
            case 1:
                $code = "$month$day" . "0000$number";
                break;
            case 2:
                $code = "$month$day" . "000$number";
                break;
            case 3:
                $code = "$month$day" . "00$number";
                break;
            case 4:
                $code = "$month$day" . "0$number";
                break;
        }
        return $code;
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
