@extends('layouts.public.app')

@section('title', 'GoalFit - Digital Content Payment')

@section('content')
    <div class="container py-5" style="max-width: 800px;">

        <!-- Payment Card -->
        <div class="card border-0 shadow" style="background-color: #1a1a1a;">
            <div class="card-header bg-dark border-bottom border-secondary">
                <h3 class="mb-0 text-light">Purchase Digital Content</h3>
            </div>
            <div class="card-body">
                <!-- Product Selection -->
                <div class="mb-4">
                    <h5 class="text-light mb-3">Select Content</h5>
                    <div class="row g-3">
                        <!-- Workout Videos Option -->
                        <div class="col-md-6">
                            <div class="product-option p-3 rounded border" id="workoutOption"
                                style="background-color: #2d2d2d; border-color: #4d0909 !important; cursor: pointer;"
                                onclick="selectProduct('workout')">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="productType" id="workoutVideos"
                                        checked>
                                    <label class="form-check-label text-light" for="workoutVideos">
                                        <i class="fas fa-dumbbell fs-4 text-danger"></i>
                                        <span class="d-block mt-2 fw-bold">Workout Videos</span>
                                        <span class="text-muted">Premium exercise library</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Nutrition Plans Option -->
                        <div class="col-md-6">
                            <div class="product-option p-3 rounded border" id="nutritionOption"
                                style="background-color: #2d2d2d; border-color: #4d0909 !important; cursor: pointer;"
                                onclick="selectProduct('nutrition')">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="productType" id="nutritionPlans">
                                    <label class="form-check-label text-light" for="nutritionPlans">
                                        <i class="fas fa-utensils fs-4 text-success"></i>
                                        <span class="d-block mt-2 fw-bold">Nutrition Plans</span>
                                        <span class="text-muted">Custom meal programs</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visa Payment Form -->
                <div>
                    <h5 class="text-light mb-3">Payment Method</h5>
                    <div class="alert alert-dark border border-secondary mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-cc-visa fs-3 text-primary me-3"></i>
                            <p class="text-light mb-0">We accept Visa cards only for digital content purchases</p>
                        </div>
                    </div>

                    <form id="visaPaymentForm">
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label text-light">Visa Card Number</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-light">
                                    <i class="fab fa-cc-visa"></i>
                                </span>
                                <input type="text" class="form-control bg-dark text-light border-secondary" id="cardNumber"
                                    placeholder="4XXX XXXX XXXX XXXX" pattern="4[0-9]{15}" required>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="expiryDate" class="form-label text-light">Expiry Date</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" id="expiryDate"
                                    placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label text-light">CVV</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" id="cvv"
                                    placeholder="123" pattern="[0-9]{3}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cardName" class="form-label text-light">Name on Card</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" id="cardName"
                                placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-light">Email for Receipt</label>
                            <input type="email" class="form-control bg-dark text-light border-secondary" id="email"
                                placeholder="your@email.com" required>
                        </div>
                    </form>
                </div>

                <!-- Order Summary (Dynamic based on selection) -->
                <div class="mt-4 p-3 rounded" style="background-color: #2d2d2d;" id="orderSummary">
                    <h5 class="text-light mb-3">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-light" id="productName">Workout Videos Access</span>
                        <span class="text-light" id="productPrice">$29.99</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-light">Tax</span>
                        <span class="text-light" id="taxAmount">$3.00</span>
                    </div>
                    <hr class="border-secondary">
                    <div class="d-flex justify-content-between">
                        <span class="text-light fw-bold">Total</span>
                        <span class="text-danger fw-bold" id="totalAmount">$32.99</span>
                    </div>
                </div>

                <!-- Terms and Submit -->
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                    <label class="form-check-label text-light" for="termsCheck">
                        I agree to the <a href="#" class="text-danger">Terms and Conditions</a> and <a href="#"
                            class="text-danger">Privacy Policy</a>
                    </label>
                </div>
                <button class="btn btn-danger w-100 mt-4 py-2" onclick="processPayment()">Complete Purchase</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Product selection
        function selectProduct(type) {
            const workoutOption = document.getElementById('workoutOption');
            const nutritionOption = document.getElementById('nutritionOption');

            if (type === 'workout') {
                workoutOption.style.borderColor = '#dc3545';
                nutritionOption.style.borderColor = '#4d0909';
                document.getElementById('workoutVideos').checked = true;

                // Update order summary
                document.getElementById('productName').textContent = 'Workout Videos Access';
                document.getElementById('productPrice').textContent = '$29.99';
                document.getElementById('taxAmount').textContent = '$3.00';
                document.getElementById('totalAmount').textContent = '$32.99';
            } else {
                workoutOption.style.borderColor = '#4d0909';
                nutritionOption.style.borderColor = '#dc3545';
                document.getElementById('nutritionPlans').checked = true;

                // Update order summary
                document.getElementById('productName').textContent = 'Nutrition Plans Access';
                document.getElementById('productPrice').textContent = '$39.99';
                document.getElementById('taxAmount').textContent = '$4.00';
                document.getElementById('totalAmount').textContent = '$43.99';
            }
        }

        // Payment processing
        function processPayment() {
            const termsChecked = document.getElementById('termsCheck').checked;
            const form = document.getElementById('visaPaymentForm');

            if (!termsChecked) {
                alert('Please agree to the terms and conditions');
                return;
            }

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Here you would normally process the payment with your backend
            // For demo purposes, we'll just show a success message
            alert('Payment processed successfully! Your digital content will be available immediately.');

            // Reset form
            form.reset();
            document.getElementById('termsCheck').checked = false;
        }
    </script>
@endpush

@push('styles')
    <style>
        body {
            background-color: #121212;
        }

        .product-option {
            transition: all 0.3s ease;
        }

        .product-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
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

        .input-group-text {
            transition: all 0.3s ease;
        }

        .input-group:focus-within .input-group-text {
            border-color: #dc3545;
            background-color: #dc3545;
        }
    </style>
@endpush