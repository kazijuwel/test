<?php

namespace App\Models;

use App\BobStore;
use App\DeliveryMan;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\RefundRequest;
use App\Models\Seller;


/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $guest_id
 * @property string|null $shipping_address
 * @property string|null $payment_type
 * @property string|null $payment_status
 * @property string|null $payment_details
 * @property float|null $grand_total
 * @property float $coupon_discount
 * @property string|null $code
 * @property int $date
 * @property int $viewed
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCouponDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereGuestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereViewed($value)
 * @mixin \Eloquent
 */

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function orderDetailsStatus()
    {


        if ($this->orderDetails()->where('delivery_status', 'pending')) {
            return "Pending";
        } elseif ($this->orderDetails()->where('delivery_status', 'confirmed')) {
            return "Confirmed";
        } elseif ($this->orderDetails()->where('delivery_status', 'delivered')) {

            return "Delivered";
        } elseif ($this->orderDetails()->where('delivery_status', 'cancel')) {
            return "Cancel";
        } else {
            return "Pending";
        }
    }
    public function hasConfirmed()
    {
        return $this->orderDetails()->where('delivery_status', 'delivered');
    }
    public function hasnotdelivery()
    {
        return $this->orderDetails()->where('delivery_status', '<>', 'delivered');
    }

    public function refund_request()
    {
        return $this->hasMany(RefundRequest::class);
    }
    public function editedby()
    {
        return $this->belongsTo(User::class);
    }
    public function hasdelivery()
    {
        return $this->orderDetails()->where('delivery_status', 'delivered');
    }
    public function hasdeliveryandpaid()
    {
        return $this->orderDetails()->where('delivery_status', 'delivered')->where('payment_status', 'paid');
    }
    public function hasreceivable()
    {
        return $this->orderDetails()->where('payment_status', '<>', 'paid')->user;
    }
    public function hasPaid()
    {
        return $this->orderDetails()->where('payment_status', 'paid')->count();
    }
    public function hasunpaid()
    {
        return $this->orderDetails()->where('payment_status', 'unpaid')->count();
    }
    public function haspartialpaid()
    {
        return $this->orderDetails()->where('payment_status', 'paid');
    }
    public function hasPaidTk()
    {
        return $this->orderDetails()->where('payment_status', 'paid');
    }
    public function debitAmount()
    {
        return $this->hasPaidTk->sum('price') + $this->hasPaidTk->sum('tax') + $this->hasPaidTk->sum('shipping_cost') + $this->hasPaidTk->sum('commision');
    }
    public function creditAmount()
    {
        return $this->grand_total;
    }
    public function totalDebitAmount()
    {
        $tda = 0;
        $this->all()->each(function ($order) use (&$tda) {
            $tda = $tda + $order->debitAmount();
        });
        return $tda;
    }

    public function totalCreditAmount()
    {
        $tca = 0;
        $this->all()->each(function ($order) use (&$tca) {
            $tca = $tca + $order->creditAmount();
        });
        return $tca;
    }
    public function isBalanced()
    {
        return $this->debitAmount() == $this->creditAmount() ? true : false;
    }
    public function balancedDebits($day = null, $month = null, $year = null)
    {
        $bd = 0;
        $this->all()->each(function ($order) use (&$bd) {
            if ($order->isBalanced()) {
                $bd += $order->debitAmount();
            }
        });
        return $bd;
    }
    public function balancedCredits($day = null, $month = null, $year = null)
    {
        $bc = 0;
        $this->all()->each(function ($order) use (&$bc) {
            if ($order->isBalanced()) {
                $bc += $order->creditAmount();
            }
        });
        return $bc;
    }
    public function totalPurchases($day = null, $month = null, $year = null)
    {
        $tp = 0;
        $this->all()->each(function ($order) use (&$tp) {

            $tp += $order->orderDetails->sum('purchase_price');
        });
        return $tp;
    }
    public function totalSales($day = null, $month = null, $year = null)
    {
        $ts = 0;
        $this->all()->each(function ($order) use (&$ts) {

            $ts += $order->orderDetails->sum('price');
        });
        return $ts;
    }

    public function receivables($day = null, $month = null, $year = null)
    {

        $receivable = 0;
        $this->all()->each(function ($order) use (&$receivable) {

            $receivable += $order->orderDetails()->where('payment_status', '<>', 'paid')->sum('price');
        });
        return $receivable;
    }
    public function payables($day = null, $month = null, $year = null)
    {

        $payable = 0;
        $this->all()->each(function ($order) use (&$payable) {

            $payable += $order->orderDetails()->where('payment_status', '<>', 'paid')->sum('purchase_price');
        });
        return $payable;
    }
    public function receivableUsers()
    {
        return $this->with(['orderDetails' => function ($query) {
            $query->where('payment_status', '<>', 'paid')->get()->load('user');
        }]);
    }
    public function deliveryMan()
    {
        return $this->belongsTo(DeliveryMan::class, 'deliveryman_id', 'user_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(BobStore::class, 'warehouse_id');
    }


    public function orderStatusChange()
    {

        $status= [];
        if ($this->orderDetails()->where('delivery_status', 'delivered')) {
            $status['status'] = 'delivered';
            $status['delivered_at'] = now();
        }elseif ($this->orderDetails()->where('delivery_status', 'on_delivery')) {
            $status['status'] = 'on_delivery';
            $status['on_delivery_at'] = now();
        }
        elseif ($this->orderDetails()->where('delivery_status', 'confirmed')) {
            $status['status'] = 'confirmed';
            $status['confirmed_at'] = now();
        }
        elseif ($this->orderDetails()->where('delivery_status', 'pending')) {
            $status['status'] = 'pending';
            $status['pending_at'] = now();
        }else{
            $status['status'] = 'cancel';
            $status['cancel_at'] = now();
        }


    }



}
