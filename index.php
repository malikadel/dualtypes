<?php 
include("init.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Stripe Barry Onetime</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/kro1eqd.css">
    <style type="text/css">
      *{font-family: rift, sans-serif;}
      .color{color:tomato;}
      .btn-custom{background-color: tomato;font-weight: bold;}
      .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 2px solid tomato;
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
      #error-stripe{color:green;font-weight:bold;}
    </style>
  </head>
  <body>

    <div class="container">
      <br><br><br>
        <div class="form-group">
          <label for="usr">Card Holder Name:</label>
          <input required id="cardholder-name" class="form-control" type="text" value="">
          <div id="error-card-name" class="color"></div>
        </div>
        <div class="form-group">
          <label for="usr">Email</label>
          <input required id="email" class="form-control" type="text" value="">
        </div>
        <div class="form-group">
          <label for="line1">Address 1:</label>
          <input type="text" class="form-control" required id="line1">
        </div> 
         <div class="form-group">
          <label for="line2">Address 2:</label>
          <input id="line2" class="form-control" type="text">
        </div>
        <div class="form-group">
          <label for="zipcode">ZIP/Postal Code:</label>
          <input type="text" class="form-control" required id="zipcode">
        </div> 
        <div class="form-group">
          <label for="city">City:</label>
          <input type="text" class="form-control" required id="city">
        </div>
         <div class="form-group">
          <label for="state">State:</label>
          <input required id="state" min="1" max="5000" class="form-control" type="number" value="">
          <div id="error-state" class="color"></div>
        </div> 
        <div class="form-group">
          <label for="country">Country:</label>
            <select id="country" name="country" class="form-control">
                <option value="AF">Afghanistan</option>
                <option value="AX">Åland Islands</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia, Plurinational State of</option>
                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                <option value="BA">Bosnia and Herzegovina</option>
                <option value="BW">Botswana</option>
                <option value="BV">Bouvet Island</option>
                <option value="BR">Brazil</option>
                <option value="IO">British Indian Ocean Territory</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CX">Christmas Island</option>
                <option value="CC">Cocos (Keeling) Islands</option>
                <option value="CO">Colombia</option>
                <option value="KM">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CD">Congo, the Democratic Republic of the</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">Côte d'Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CW">Curaçao</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FK">Falkland Islands (Malvinas)</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="TF">French Southern Territories</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GG">Guernsey</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HM">Heard Island and McDonald Islands</option>
                <option value="VA">Holy See (Vatican City State)</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran, Islamic Republic of</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Ireland</option>
                <option value="IM">Isle of Man</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JE">Jersey</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KP">Korea, Democratic People's Republic of</option>
                <option value="KR">Korea, Republic of</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Lao People's Democratic Republic</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao</option>
                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="FM">Micronesia, Federated States of</option>
                <option value="MD">Moldova, Republic of</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="ME">Montenegro</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NR">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PS">Palestinian Territory, Occupied</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcairn</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RE">Réunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russian Federation</option>
                <option value="RW">Rwanda</option>
                <option value="BL">Saint Barthélemy</option>
                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint Lucia</option>
                <option value="MF">Saint Martin (French part)</option>
                <option value="PM">Saint Pierre and Miquelon</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome and Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SX">Sint Maarten (Dutch part)</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="GS">South Georgia and the South Sandwich Islands</option>
                <option value="SS">South Sudan</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard and Jan Mayen</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syrian Arab Republic</option>
                <option value="TW">Taiwan, Province of China</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania, United Republic of</option>
                <option value="TH">Thailand</option>
                <option value="TL">Timor-Leste</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="TC">Turks and Caicos Islands</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB" selected="selected">United Kingdom</option>
                <option value="US">United States</option>
                <option value="UM">United States Minor Outlying Islands</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela, Bolivarian Republic of</option>
                <option value="VN">Viet Nam</option>
                <option value="VG">Virgin Islands, British</option>
                <option value="VI">Virgin Islands, U.S.</option>
                <option value="WF">Wallis and Futuna</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
            </select>
        </div> 
         <div class="form-group">
          <label for="amount">Amount:</label>
          <input required id="amount" min="1" max="5000" class="form-control" type="number" value="">
          <div id="error-amount" class="color"></div>
        </div>
        <div class="form-group">
            <label for="country">Payment Type:</label>
            <select id="type" name="type" class="form-control">
                <option value="onetime">One Time</option>
                <option value="recurring">Recurring</option>
            </select>
         <div class="form-group">
          <div id="card-element"></div>
          <div id="error-stripe"></div>
        </div>
        <div class="form-group">
          <button id="card-button"  class="btn btn-primary">Submit Payment</button> 
        </div> 
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
      window.addEventListener("load",function(){document.querySelector('body').classList.add('loaded');});

        var stripe = Stripe("<?php echo $stripe_pk; ?>");
        var elements = stripe.elements();

        var cardElement = elements.create('card',{ hidePostalCode: true});
        cardElement.mount('#card-element');
        var cardholderName = document.getElementById('name');
        var cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click',function(ev){
          $(this).prop('disabled', true);
            $('#card-button').prop('disabled', true);
            
            var allAreFilled = true;
            document.getElementById("payment-form").querySelectorAll("[required]").forEach(function(i) {
            if (!allAreFilled) return;
            if (!i.value) allAreFilled = false;
            });
            if (!allAreFilled) 
            {
                $('#card-button').prop('disabled', false);

                
                $('.error-stripe').css('color','tomato');
                $('.error-stripe').html('All fields are Required.');
                return false;
            }
          var validator =true;
          if($("#name").val() == '')
          {
            validator = false;
            $("#error-stripe").html('Name is Required Field');
          }
          if(!validator){$(this).prop('disabled', false);return;}

      stripe.createPaymentMethod({
          type: 'card',
          card: cardElement,
          billing_details: {
              name: cardholderName.value,
              email:$("#email").val(),
              address: {city:$("#city").val(),country:$('#country').find(":selected").val(),line1:$("#line1").val(),line2:$("#line2").val(),postal_code:$("#zip").val(),state:$("#state").val()}
          }
      })
      .then(function(result) {

          if(result.error){
              jQuery('.error-stripe').css('color','tomato');
              jQuery('.error-stripe').html(result.error);
              jQuery("#card-button").prop('disabled', false);
          }
          else if(result.paymentMethod)
          {
              var pm = result.paymentMethod.id;
              
              var type = $('#type').find(":selected").val();
              if(type == 'onetime')
              {

                    var data = JSON.stringify({ 
                      payment_method: result.paymentMethod.id,
                      name:cardholderName.value, 
                      email:$("#email").val()
                    });
                  $.ajax({
                      url: 'confirm_onetime_payment.php',
                      type : "POST",
                      dataType : 'json',
                      data : data,
                      success : function(result) {
                          if(result.status == 'active')
                          {
                              jQuery('.error-stripe').css('color','green');
                              jQuery('.error-stripe').html('Payment is successful.');
                             //window.location.href = '../payment_process.html'; // NEW
                              jQuery("#card-button").prop('disabled', false);
                          }
                          else
                          {
                              stripe.confirmCardPayment(result.client_secret, {
                                  payment_method: result.pm
                                })
                                .then(function(result) {
                                      if(result.error){
                                  jQuery('.error-stripe').css('color','tomato');
                                  jQuery('.error-stripe').html(result.error);
                                  jQuery("#card-button").prop('disabled', false);
                                }
                                else
                                {
                                  console.log(result);
                                  jQuery('.error-stripe').css('color','green');
                                  jQuery('.error-stripe').html('Payment is successful.');
                                  //window.location.href = '../payment_process.html';
                                }
                    });
                          }
                      },
                      error: function(xhr, resp, text) {
                          jQuery('.error-stripe').css('color','tomato');
                                  jQuery('.error-stripe').html(text);
                                  jQuery("#card-button").prop('disabled', false);
                  }});


              }
              else
              {
                var data = JSON.stringify({ 
                  payment_method: result.paymentMethod.id,
                  name:cardholderName.value,
                  plan_id : $("#plan_id").val(), 
                  email:$("#email").val()
                });
                  $.ajax({
                      url: 'confirm_payment.php',
                      type : "POST",
                      dataType : 'json',
                      data : data,
                      success : function(result) {
                          
                          if(result.status == 'active')
                          {
                              jQuery('.error-stripe').css('color','green');
                              jQuery('.error-stripe').html('Payment is successful.');
                             //window.location.href = '../payment_process.html'; // NEW
                              jQuery("#card-button").prop('disabled', false);
                          }
                          else
                          {
                              stripe.confirmCardPayment(result.client_secret, {
                                  payment_method: result.pm
                                })
                                .then(function(result) {
                                      if(result.error){
                                  jQuery('.error-stripe').css('color','tomato');
                                  jQuery('.error-stripe').html(result.error);
                                  jQuery("#card-button").prop('disabled', false);
                                }
                                else
                                {
                                  console.log(result);
                                  jQuery('.error-stripe').css('color','green');
                                  jQuery('.error-stripe').html('Payment is successful.');
                                  //window.location.href = '../payment_process.html';
                                }
                    });
                          }
                      },
                      error: function(xhr, resp, text) {
                          jQuery('.error-stripe').css('color','tomato');
                                  jQuery('.error-stripe').html(text);
                                  jQuery("#card-button").prop('disabled', false);
                  }});
              }

          }
          else
          {
              jQuery('.error-stripe').css('color','tomato');
                    jQuery('.error-stripe').html('Something went wrong.');
                    jQuery("#card-button").prop('disabled', false);
          }
      });

        });    
    </script>
  </body>
</html>