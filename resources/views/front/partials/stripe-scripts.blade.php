@if($type == 'artist')
    <script src="https://js.stripe.com/v3/"></script>
    <script>

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                color: '#323230',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#dc3545',
                iconColor: '#dc3545'
            }
        };

        var stripeKey = '{{ config("services.stripe.key") }}';
        var modelButton = document.querySelector('#card-modal-button');
        // Create a Stripe client.
        var modelStripe = Stripe(stripeKey);

        // Create an instance of Elements.
        var modelElements = modelStripe.elements();

        // Create an instance of the card Element.
        var modelCard = modelElements.create('card', {style: style, 'hidePostalCode': true});

        // Add an instance of the card Element into the `card-element` <div>.
        modelCard.mount('#card-modal-element');

        // Handle real-time validation errors from the card Element.
        modelCard.addEventListener('change', function (event) {
            let displayError = document.getElementById('card-modal-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
                displayError.classList.remove("d-none");
            } else {
                displayError.textContent = '';
                displayError.classList.add("d-none");
            }

            modelButton.disabled = !event.complete;
        });

    </script>
@endif
