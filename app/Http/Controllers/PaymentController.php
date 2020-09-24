<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Payment $payment)
    {
        return $payment->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_to_insert = [
            'customer_id' => $request->input('customer_id'),
            'product_id' => $request->input('product_id'),
            'pay_date' => $request->input('pay_date'),
            'exp_date' => $request->input('exp_date'),
            'amount' => $request->input('amount'),
        ];

        Payment::create($data_to_insert);

        return [
            'hasError' => false,
            'message' => 'Created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return $payment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return $payment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $data_to_update = [
            'customer_id' => $request->input('customer_id'),
            'product_id' => $request->input('product_id'),
            'pay_date' => $request->input('pay_date'),
            'exp_date' => $request->input('exp_date'),
            'amount' => $request->input('amount'),
        ];

        $payment->update($data_to_update);

        return [
            'hasError' => false,
            'message' => 'Updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Payment::whereIn('id', explode(',', $ids))->delete();

        return [
            'hasError' => false,
            'message' => 'Deleted'
        ];
    }
}
