<div class="tab-pane fade my-subscriptions" id="subscriptions">
    <!-- Subscriptions -->
    <div class="row mt-5">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover subscriptions-table">
                <thead class="thead-light">
                    <tr>
                        <th>Sr No</th>
                        <th>Plan Name</th>
                        <th>Date Created</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->subscriptions as $key => $subscription)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $subscription->name }}</td>
                            <td>{{ $subscription->created_at }}</td>
                            <td>
                                <a href="{{ route('profile.invoice',['subscriptionId' => $subscription->stripe_id]) }}"
                                   target="_blank"
                                   title="Download Invoice">
                                    Download Invoice
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
