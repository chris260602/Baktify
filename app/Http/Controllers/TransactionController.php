<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactionData = [];
        $user_id = auth()->user()->id;
        $transactions = Transaction::where("user_id", $user_id)->get();
        for ($i = 0; $i < count($transactions); $i++) {
            $transactionDetails = TransactionDetail::with("product")->where('transaction_id', '=', $transactions[$i]->id)->get();
            $tempData = [];
            $totalPrice = 0;
            for ($j = 0; $j < count($transactionDetails); $j++) {
                array_push($tempData, $transactionDetails[$j]);
                $totalPrice += $transactionDetails[$j]->qty * $transactionDetails[$j]->product->price;
            }

            array_push($transactionData, ["transactionDate" => $transactions[$i]->created_at->toDateTimeString(), "totalPrice" => $totalPrice, $tempData]);
        }
        // dd($transactionData[0][0][0]->product->name);
        return view("pages.transaction")->with("transactions", $transactionData);
    }
}
