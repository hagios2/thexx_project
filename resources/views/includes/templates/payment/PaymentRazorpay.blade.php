<main id="design-theme" class="theme-accounts">
  <header id="theme-accounts">
      <header style="display: flex;">
          <h5 style="color: white;">
            Razorpay Payment Gateway
          </h5>
          <img class="razorpay_logo" src="{{ url('images/layout/razorpay.png') }}" alt="Payment Method Razorpay">
      </header>
  </header>
  @php
    $Amount_pay = number_format($amount, 2);
    $AmountConvertCent = $Amount_pay * 100;
    $text = 'Pay $' . $Amount_pay . ' USD';
  @endphp

  <div>
    <form action="{{ route('Payment') }}" method="POST">
      @csrf
      <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{ Config::get('env_variables.razor_pay_key') }}"
        data-amount="{{ $AmountConvertCent }}"
        data-currency="USD"
        data-buttontext="{{ $text }}"
        data-name="THE XXX CLUB"
        data-description="Buy Tokes"
        data-image="{{ asset('/images/layout/logo-thexxxclub-default.svg') }}"
        data-prefill.name=""
        data-prefill.email=""
        data-theme.color="#000">
      </script>
    </form>
  </div>
</main>
