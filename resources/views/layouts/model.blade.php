<div class="offer-overlay" id="offerPopup">
    <div class="offer-modal">

        <!-- Close Button -->
        <button type="button" class="offer-close" onclick="closeOfferPopup()">
            &times;
        </button>

        <div class="row g-0">

            <!-- LEFT: OFFER IMAGE -->
            <div class="col-lg-5 offer-image">
                <img src="{{ asset('images/logo.png') }}"
                     alt="Course Offer">

                <div class="offer-image-content">
                    <span>LIMITED TIME OFFER</span>
                    <h2>Start Your Career Today</h2>
                    <p>Join our professional training courses.</p>

                </div>
            </div>

            <!-- RIGHT: FORM -->
            <div class="col-lg-7">
                <div class="offer-form">

                    <h2>Get Course Offer</h2>

                    <form action="{{ route('offer.submit') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter your name"
                                   required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter your email"
                                   required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="tel"
                                   name="phone"
                                   class="form-control"
                                   placeholder="Enter phone number"
                                   maxlength="10"
                                   required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address"
                                      class="form-control"
                                      rows="2"
                                      placeholder="Enter your address"
                                      required></textarea>
                        </div>

                        <!-- Course -->
                        <div class="mb-3">
                            <label>Select Course</label>
                            <select name="course_id" class="form-select" required>
                                <option value="">Select Course</option>

                                @foreach($formdata  as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <button type="submit" class="offer-submit">
                            Get Offer Now
                        </button>

                    </form>



                </div>
            </div>

        </div>
    </div>
</div>
