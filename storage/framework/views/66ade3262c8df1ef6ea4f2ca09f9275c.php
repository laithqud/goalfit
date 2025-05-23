

<?php $__env->startSection('title', 'GoalFit - Gym Subscription'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5" style="max-width: 800px;">

        <!-- Payment Card -->
        <div class="card border-0 shadow" style="background-color: #1a1a1a;">
            <div class="card-header bg-dark border-bottom border-secondary">
                <h3 class="mb-0 text-light">Complete Your Subscription</h3>
            </div>
            <div class="card-body">
                <!-- Gym Info -->
                <div class="d-flex align-items-center mb-4 p-3 rounded" style="background-color: #2d2d2d;">
                    <img src="<?php echo e(asset('images/gym.png')); ?>" alt="Gym" class="rounded me-3" width="80" height="80">
                    <div>
                        <h4 class="text-light mb-1">Elite Fitness Center</h4>
                        <p class="text-muted mb-1"><i class="fas fa-map-marker-alt text-danger me-2"></i> 1.2 miles away</p>
                        <span class="badge bg-danger">Premium Membership</span>
                    </div>
                </div>

                <!-- Payment Method Selection -->
                <div class="mb-4">
                    <h5 class="text-light mb-3">Payment Method</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="payment-option p-3 rounded border"
                                style="background-color: #2d2d2d; border-color: #4d0909 !important;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard"
                                        checked>
                                    <label class="form-check-label text-light" for="creditCard">
                                        <i class="fab fa-cc-visa fs-4 text-primary"></i>
                                        <i class="fab fa-cc-mastercard fs-4 text-warning ms-2"></i>
                                        <span class="d-block mt-2">Credit/Debit Card</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-option p-3 rounded border"
                                style="background-color: #2d2d2d; border-color: #4d0909 !important;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="cashPayment">
                                    <label class="form-check-label text-light" for="cashPayment">
                                        <i class="fas fa-money-bill-wave fs-4 text-success"></i>
                                        <span class="d-block mt-2">Pay in Cash at Gym</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Credit Card Form (Initially Visible) -->
                <div id="creditCardForm">
                    <h5 class="text-light mb-3">Card Details</h5>
                    <form>
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label text-light">Card Number</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" id="cardNumber"
                                placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="expiryDate" class="form-label text-light">Expiry Date</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" id="expiryDate"
                                    placeholder="MM/YY">
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label text-light">CVV</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" id="cvv"
                                    placeholder="123">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cardName" class="form-label text-light">Name on Card</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" id="cardName"
                                placeholder="John Doe">
                        </div>
                    </form>
                </div>

                <!-- Cash Payment Info (Initially Hidden) -->
                <div id="cashPaymentInfo" class="d-none">
                    <div class="alert alert-dark border border-secondary">
                        <h5 class="text-light"><i class="fas fa-info-circle text-danger me-2"></i> Pay at Gym</h5>
                        <p class="text-light mb-0">Please visit Elite Fitness Center within 24 hours to complete your
                            payment and activate your membership.</p>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="mt-4 p-3 rounded" style="background-color: #2d2d2d;">
                    <h5 class="text-light mb-3">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-light">Premium Membership</span>
                        <span class="text-light">$39.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-light">Tax</span>
                        <span class="text-light">$3.90</span>
                    </div>
                    <hr class="border-secondary">
                    <div class="d-flex justify-content-between">
                        <span class="text-light fw-bold">Total</span>
                        <span class="text-danger fw-bold">$42.90/month</span>
                    </div>
                </div>

                <!-- Terms and Submit -->
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="termsCheck">
                    <label class="form-check-label text-light" for="termsCheck">
                        I agree to the <a href="#" class="text-danger">Terms and Conditions</a> and <a href="#"
                            class="text-danger">Privacy Policy</a>
                    </label>
                </div>
                <button class="btn btn-danger w-100 mt-4 py-2">Complete Subscription</button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle between payment methods
            const creditCardRadio = document.getElementById('creditCard');
            const cashRadio = document.getElementById('cashPayment');
            const creditCardForm = document.getElementById('creditCardForm');
            const cashPaymentInfo = document.getElementById('cashPaymentInfo');

            creditCardRadio.addEventListener('change', function () {
                if (this.checked) {
                    creditCardForm.classList.remove('d-none');
                    cashPaymentInfo.classList.add('d-none');
                }
            });

            cashRadio.addEventListener('change', function () {
                if (this.checked) {
                    creditCardForm.classList.add('d-none');
                    cashPaymentInfo.classList.remove('d-none');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        body {
            background-color: #121212;
        }

        .payment-option {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .payment-option:hover {
            border-color: #dc3545 !important;
            transform: translateY(-3px);
        }

        .form-control {
            padding: 10px 15px;
        }

        .form-control:focus {
            background-color: #2d2d2d;
            color: white;
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }

        .form-check-input:checked {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/paymint.blade.php ENDPATH**/ ?>