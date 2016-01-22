<div class="modal fade" id="pay" tabindex="-1" role="dialog"
     aria-labelledby="paymodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Become Premium
                </h4>
            </div>
            <div class="modal-body">
                <p>Being Premium Member you will be able to download any project founded in portLAB.</p>
                <table>
                    <tr>
                        <td>Duration</td>
                        <td>Lifetime</td>
                    </tr>
                    <tr>
                        <td>Fee</td>
                        <td>10$</td>
                    </tr>
                </table>
                <p>By pressing Pay with Payapl you will be redirected to paypal website to continuing the payment. </p>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="business" value="festimpeposhi95-facilitator@gmail.com">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="item_number_1" value="1">
                    <input type="hidden" name="item_name_1" value="Premium Account portLAB">
                    <input type="hidden" name="amount_1" value="10">
                    <input type="hidden" name="quantity_1" value="1">
                    <input type="hidden" name="return" value="http://localhost:8000/home/premium/success?i=1">
                    <input type="hidden" name="cancle_return" value="http://localhost:8000/home/premium/error">

                {{--<form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">--}}
                    {{--<input type="hidden" name="cmd" value="_xclick" />--}}
                    {{--<input type="hidden" name="no_note" value="1" />--}}
                    {{--<input type="hidden" name="lc" value="UK" />--}}
                    {{--<input type="hidden" name="currency_code" value="GBP" />--}}
                    {{--<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />--}}
                    {{--<input type="hidden" name="first_name" value="Customer's First Name" />--}}
                    {{--<input type="hidden" name="last_name" value="Customer's Last Name" />--}}
                    {{--<input type="hidden" name="payer_email" value="customer@example.com" />--}}
                    {{--<input type="hidden" name="item_number" value="123456" />--}}
                    <div class="modal-footer">
                        <button type="submit" id="send" class="btn btn-primary" >
                            Pay with paypal
                        </button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>


