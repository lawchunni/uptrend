<?php

namespace App\Helpers;

use Pacewdd\Bx\_5bx;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class Helper 
{

    /**
     * Process transaction using _5bx library
     *
     * @return object
     */
    static function processTransaction(array $card_info, mixed $order_total, int $order_id)
    {
        $transaction = new _5bx(env('BX_LOGIN'), env('BX_KEY'));

        $transaction->amount($order_total); // total sale
        $transaction->card_num($card_info['card_number']); // credit card number
        $transaction->exp_date($card_info['card_expiry']); // expiry date month and year (august 2022)
        $transaction->cvv($card_info['card_cvv']); // Card Verification Value (cvv) number
        $transaction->ref_num($order_id); // reference or invoice number
        $transaction->card_type($card_info['card_type']); // card type (visa, mastercard, amex)

        return $transaction->authorize_and_capture(); // JSON object
    }

    /**
     * Insert the transaction data into the transaction table
     *
     * @param Request $request
     * @param [type] $order_id
     * @param [type] $card_num
     * @param [type] $response
     * @return void
     */
    static function storeTransaction(Request $request, $order_id, $card_num, $response) {

        if( $response->transaction_response->response_code == 1) {
            // successfully connected to payment gateway and transaction done
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->response = $response->transaction_response->response_code;
            $transaction->status = "200";
            $transaction->credit_card_info = substr((string) $card_num, -4);

            if($transaction->save()) {

                // update order status in order table
                $order_update = Order::find($order_id);
                $order_update->order_status = 'confirmed';
                $order_update->save();

                // clear session
                $request->session()->forget('cart');
                $request->session()->forget('shipping_addr_id');
                $request->session()->forget('summary');

                return true;
            }
            
        } else {
            // failed <- response_code == 2
            $request->session()->put('latest_order_id', $order_id);

            return false;
        }
    }

}