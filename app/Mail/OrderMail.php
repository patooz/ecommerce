<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data,$data1;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$data1)
    {
        $this->data=$data;
        $this->data1=$data1;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order=$this->data;
        $order1=$this->data1;
        $carts=Cart::content();


        return $this->from('support@ndonyoshop.co.ke')->view('mail.order_mail',compact('order','order1','carts'))->subject('Order Email From Ndonyo Online Shop');
    }




}
