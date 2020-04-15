@extends('layouts.frontend')
@section('css')
    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@stop
@section('front')
    <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Checkout</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">checkout</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <div class="checkout-page-area mb-130">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="lezada-form">
                        <!-- Checkout Form s-->
{{--                        <form action="" method="post" class="checkout-form">--}}
{{--                            @csrf--}}

                        @include('layouts.error')
                        <form action="{{route('stripe.pay')}}" method="post" id="payment-form" class="checkout-form">
                            @csrf
                            <div class="row row-40">

                                <div class="col-lg-7 mb-20">

                                    <!-- Billing Address -->
                                    <div id="billing-form" class="mb-40">
                                        <h4 class="checkout-title">Billing Address</h4>

                                        <div class="row">

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>First Name*</label>
                                                <input type="text" placeholder="First Name" name="first_name" readonly value="{{$user->first_name}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Last Name*</label>
                                                <input type="text" placeholder="Last Name" name="last_name" readonly value="{{$user->last_name}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Email Address*</label>
                                                <input type="email" placeholder="Email Address" name="email" readonly value="{{$user->email}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Phone no*</label>
                                                <input type="text" placeholder="Phone number" name="phone" readonly value="{{$user->phone}}">
                                            </div>


                                            <div class="col-12 mb-20">
                                                <label>Address*</label>
                                                <input type="text" class="address" placeholder="Address line 1" name="address" value="{{$user->address}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Country*</label>
                                                <select class="nice-select"  style="display: none;" name="country">
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Åland Islands">Åland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern Territories</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Helena">Saint Helena</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-leste">Timor-leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet Nam">Viet Nam</option>
                                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Town/City*</label>
                                                <input type="text" class="towncity"  placeholder="Town/City" name="town_city" value="{{$user->town_city}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>State*</label>
                                                <input type="text" class="state" placeholder="State" name="state" value="{{$user->state}}">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Zip Code*</label>
                                                <input type="text" class="zipcode" placeholder="Zip Code" name="zip_code" value="{{$user->zip_code}}">
                                            </div>

                                            {{--                                            <div class="col-12 mb-20">--}}
                                            {{--                                                <div class="check-box">--}}
                                            {{--                                                    <input type="checkbox" id="create_account">--}}
                                            {{--                                                    <label for="create_account">Create an Acount?</label>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div class="check-box">--}}
                                            {{--                                                    <input type="checkbox" id="shiping_address" data-shipping="">--}}
                                            {{--                                                    <label for="shiping_address">Ship to Different Address</label>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                        </div>

                                    </div>

                                    <!-- Shipping Address -->


                                </div>

                                <div class="col-lg-5">
                                    <div class="row">

                                        <!-- Cart Total -->
                                        <div class="col-12 mb-60">

                                            <h4 class="checkout-title">Cart Total</h4>

                                            <div class="checkout-cart-total">

                                                <h4>Product <span>Total</span></h4>
                                                <?php
                                                $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                                ?>
                                                <ul>
                                                    @if(count($carts) > 0)
                                                        @foreach($carts as $pro)

                                                            <li>
                                                                {{$pro->name}} X {{$pro->qty}} <span>${{$pro->price}}</span>
                                                                <br>
                                                                Option <span>ss</span>
                                                                @if ($pro->options->blinds1 != "")
                                                                    <br>
                                                                    Square or Louvolite fascia <span>${{$pro->options->blinds1}}</span>
                                                                @endif
                                                                @if ($pro->options->blinds2  != "")
                                                                <br>
                                                                Decor Cassette <span>${{$pro->options->blinds2}}</span>
                                                                @endif
                                                                @if ($pro->options->blinds3 != 0)
                                                                <br>

                                                                Valance <span>${{$pro->options->blinds3}}</span>
                                                                <hr>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li><span>No Product</span></li>
                                                    @endif
                                                </ul>

                                                <?php
                                                $total_cart = \Gloudemans\Shoppingcart\Facades\Cart::subTotal();
                                                ?>

                                                <p>Sub Total <span>${{$total_cart}}</span></p>
                                                <p>Shipping Fee <span>$00.00</span></p>

                                                <h4>Grand Total <span>${{$total_cart}}</span></h4>

                                            </div>

                                        </div>

                                        <!-- Payment Method -->
                                        <div class="col-12">

                                            <div class="checkout-payment-method">

                                                <div class="single-method">
                                                    <div class="col-md-12">
                                                        <script src="https://js.stripe.com/v3/"></script>

{{--                                                        <form action="/charge" method="post" id="payment-form">--}}
                                                            <div class="form-row">
                                                                <label for="card-element">
                                                                    Credit or debit card
                                                                </label>
                                                                <div id="card-element" class="col-md-12">
                                                                    <!-- A Stripe Element will be inserted here. -->
                                                                </div>
                                                                <button>Pay By Card</button>
                                                                <!-- Used to display form errors. -->
                                                                <div id="card-errors" role="alert"></div>
                                                            </div>


{{--                                                        </form>--}}
                                                    </div>

                                                    <br>
                                                    <div class="col-md-12">
{{--                                                        <div class="form">--}}
{{--                                                            <label for="card ">--}}
{{--                                                                Pay by Paypal--}}
{{--                                                            </label>--}}
{{--                                                            <br>--}}
{{--                                                            <div id="paypal-button"></div>--}}
{{--                                                        </div>--}}
                                                        <div id="paypal-button"></div>
                                                    </div>
                                                    <input type="text" class="tprice"  name="total_price" value="{{$total_cart}}">
                                                    <input type="radio" id="payment_check" name="payment-method" value="check">
                                                </div>

{{--                                                <div class="single-method">--}}
{{--                                                    <input type="checkbox" id="accept_terms">--}}
{{--                                                    <label for="accept_terms">I’ve read and accept the terms &amp; conditions</label>--}}
{{--                                                </div>--}}

                                            </div>

                                            <button class="lezada-button lezada-button--medium mt-30">Place order</button>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <script>
        $(document).ready(function () {
            var price = $('.tprice').val();
            console.log(price)
            var a = parseInt(price);
            console.log(a)
        })
    </script>
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_ceyoY7uA4tKyBOj065u9H4YN00Emw5XrJ1');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>




    <script>
        $(document).ready(function () {
            // var amout = $('.amount').val();
            var amout = $('.tprice').val();
            var address = $('.address').val();
            var twon = $('.towncity').val();
            var sate = $('.State').val();
            var zip = $('.zipcode').val();
            var total = $('.tprice').val();


            paypal.Button.render({


                // Configure environment
                env: 'sandbox',
                client: {
                    sandbox: 'AUa2NUNkcWmnd0bhp_Q9jhHHPp7yuhnx68CkFeRBmEwwfZDmplBR4579BS7yLOeWeB8juhh6QzJ1L3H_',
                    production: 'demo_production_client_id'
                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                    size: 'small',
                    color: 'gold',
                    shape: 'pill',
                },

                // Enable Pay Now checkout flow (optional)
                commit: true,

                // Set up a payment
                payment: function(data, actions) {

                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                total: amout,
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment
                onAuthorize: function(data, actions) {

                    return actions.payment.execute().then(function() {
                        // Show a confirmation message to the buyer

                        $.ajax({
                            type : "POST",
                            url: "{{route('user.paypal.save')}}",
                            data : {
                                '_token' : "{{csrf_token()}}",
                                'amout':amout,
                            },
                            success:function(data){
                                if (data == 'success'){

                                }
                            }
                        });
                    });
                }
            }, '#paypal-button');


        })


    </script>
@stop
