@extends('layouts.app')

@section('page_title', 'Shipping Policy')

@section('content')
    <h1 class="title">Shipping policy for Fauxtion</h1>
    <p class="body-text">Fauxtion is the operator of https://www.fauxtion.com. By placing an order through this website
        you will be agreeing to the terms below. These are provided to ensure both parties are aware of and agree upon
        this arrangement to mutually protect and set expectations on our service.</p>
    <h2 class="title">1. General</h2>
    <p class="body-text">Subject to stock availability. We try to maintain accurate stock counts on our website but from
        time-to-time there may be a stock discrepancy and we will not be able to fulfill all your items at time of
        purchase. In this instance, we will fulfill the available products to you, and contact you about whether you
        would prefer to await restocking of the backordered item or if you would prefer for us to process a refund.</p>
    <h2 class="title">2. Shipping Costs</h2>
    <p class="body-text">Shipping costs are calculated during checkout based on weight, dimensions and destination of
        the items in the order. Payment for shipping will be collected with the purchase.
        <br>
        This price will be the final price for shipping cost to the customer.</p>
    <h2 class="title">3. Returns</h2>
    <h3 class="title">3.1 Return Due To Change Of Mind</h3>
    <p class="body-text">Fauxtion will happily accept returns due to change of mind as long as a request to return is
        received by us within 7 days of receipt of item and are returned to us in original packaging, unused and in
        resellable condition.
        <br>
        Return shipping will be paid at the customers expense and will be required to arrange their own shipping.
        Once returns are received and accepted, refunds will be processed to store credit for a future purchase. We will
        notify you once this has been completed through email.
        Fauxtion will refund the value of the goods returned but will NOT refund the value of any shipping paid.</p>
    <h3 class="title">3.2 Warranty Returns</h3>
    <p class="body-text">Fauxtion will happily honor any valid warranty claims, provided a claim is submitted within 90
        days of receipt of items.
        <br>
        Customers will be required to pre-pay the return shipping, however we will reimburse you upon successful
        warranty claim.
        <br>
        Upon return receipt of items for warranty claim, you can expect Fauxtion to process your warranty claim within 7
        days.
        <br>
        Once warranty claim is confirmed, you will receive the choice of:
    </p>

    <ul class="body-text">
        <li>(a) refund to your payment method</li>
        <li>(b) a refund in store credit</li>
        <li>(c) a replacement item sent to you (if stock is available)</li>
    </ul>
    <h2 class="title">4. Delivery Terms</h2>
    <h3 class="title">4.1 Transit Time Domestically</h3>
    <p class="body-text">In general, domestic shipments are in transit for 2 - 7 days</p>
    <h3 class="title">4.2 Transit time Internationally</h3>
    <p class="body-text">Generally, orders shipped internationally are in transit for 4 - 22 days. This varies greatly
        depending on the courier you have selected. We are able to offer a more specific estimate when you are choosing
        your courier at checkout.</p>
    <h3 class="title">4.3 Dispatch Time</h3>
    <p class="body-text">Orders are usually dispatched within 2 business days of payment of order
        <br>
        Our warehouse operates on Monday - Friday during standard business hours, except on national holidays at which
        time the warehouse will be closed. In these instances, we take steps to ensure shipment delays will be kept to a
        minimum.</p>
    <h3 class="title">4.4 Change Of Delivery Address</h3>
    <p class="body-text">For change of delivery address requests, we are able to change the address at any time before
        the order has been dispatched.</p>
    <h3 class="title">4.5 P.O. Box Shipping</h3>
    <p class="body-text">Fauxtion will ship to P.O. box addresses using postal services only. We are unable to offer
        couriers services to these locations.</p>
    <h3 class="title">4.6 Military Address Shipping</h3>
    <p class="body-text">We are able to ship to military addresses using USPS. We are unable to offer this service using
        courier services.</p>
    <h3 class="title">4.7 Items Out Of Stock</h3>
    <p class="body-text">If an item is out of stock, we will cancel and refund the out-of-stock items and dispatch the
        rest of the order.</p>
    <h3 class="title">4.8 Delivery Time Exceeded</h3>
    <p class="body-text">If delivery time has exceeded the forecasted time, please contact us so that we can conduct an
        investigation</p>
    <h2 class="title">5. Tracking Notifications</h2>
    <p class="body-text">Upon dispatch, customers will receive a tracking link from which they will be able to follow
        the progress of their shipment based on the latest updates made available by the shipping provider.</p>
    <h2 class="title">6. Parcels Damaged In Transit</h2>
    <p class="body-text">If you find a parcel is damaged in-transit, if possible, please reject the parcel from the
        courier and get in touch with our customer service. If the parcel has been delivered without you being present,
        please contact customer service with next steps.</p>
    <h2 class="title">7. Duties & Taxes</h2>
    <h3 class="title">7.1 Sales Tax</h3>
    <p class="body-text">Sales tax has already been applied to the price of the goods as displayed on the website</p>
    <h3 class="title">7.2 Import Duties & Taxes</h3>
    <p class="body-text">For international shipments, import duties & taxes may be required to be paid. Fauxtion
        pre-calculate these costs and display them at checkout and give customers the choice of pre-paying these duties
        and taxes, or choosing to pay them seperately upon arrival in your destination country. Fauxtion encourage
        customers to pre-pay duties and taxes as pre-paying these will facilitate a faster delivery time as they will be
        less likely to be subject to delays at customs at their destination country.
        <br>
        If you refuse to to pay duties and taxes upon arrival at your destination country, the goods will be returned to
        Fauxtion at the customers expense, and the customer will receive a refund for the value of goods paid, minus the
        cost of the return shipping. The cost of the initial shipping will not be refunded.</p>
    <h2 class="title">8. Cancellations</h2>
    <p class="body-text">If you change your mind before you have received your order, we are able to accept cancellations at any time before the order has been dispatched. If an order has already been dispatched, please refer to our refund policy.</p>
    <h2 class="title">9. Insurance</h2>
    <p class="body-text">Parcels are insured for loss and damage up to the value as stated by the courier.</p>
    <h3 class="title">9.1 Process for parcel damaged in-transit</h3>
    <p class="body-text">We will process a refund or replacement as soon as the courier has completed their investigation into the claim.</p>
    <h3 class="title">9.2 Process for parcel lost in-transit</h3>
    <p class="body-text">We will process a refund or replacement as soon as the courier has conducted an investigation and deemed the parcel lost.</p>
    <h2 class="title">10. Customer service</h2>
    <p class="body-text">For all customer service enquiries, please email us at <a href="mailto:shipping@fauxtion.com">shipping@fauxtion.com</a></p>
@endsection
