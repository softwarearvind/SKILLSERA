
{{-- ================= FREE DEMO MODAL ================= --}}
<div class="modal fade" id="demoModal" tabindex="-1"
     aria-labelledby="demoModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered demo-dialog">
        <div class="modal-content demo-modal">

            {{-- Header & Logo --}}
            <div class="demo-header text-center">
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>

                <img src="{{ asset('images/logo.png') }}"
                     alt="SKILLS ERA Logo"
                     class="demo-logo">

                <h5 id="demoModalLabel" class="fw-bold mb-1">
                    Book a Free Demo
                </h5>
                <p class="text-muted small mb-0">
                    Choose your course and start learning!
                </p>
            </div>

            {{-- Form --}}
            <div class="modal-body demo-body">

                <form action="{{ route('offer.submit') }}"
                      method="POST" id="demoForm">
                    @csrf

                    <div class="row g-3">

                        {{-- Name --}}
                        <div class="col-12 col-sm-6">
                            <label for="demoName" class="demo-label">
                                Full Name <span>*</span>
                            </label>
                            <input type="text" id="demoName" name="name"
                                   class="form-control demo-input @error('name') is-invalid @enderror"
                                   placeholder="Your full name"
                                   value="{{ old('name') }}"
                                   maxlength="255" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div class="col-12 col-sm-6">
                            <label for="demoPhone" class="demo-label">
                                Phone Number <span>*</span>
                            </label>
                            <input type="tel" id="demoPhone" name="phone"
                                   class="form-control demo-input @error('phone') is-invalid @enderror"
                                   placeholder="10-digit mobile"
                                   value="{{ old('phone') }}"
                                   maxlength="10" minlength="10"
                                   pattern="[0-9]{10}"
                                   inputmode="numeric" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-12">
                            <label for="demoEmail" class="demo-label">
                                Email Address <span>*</span>
                            </label>
                            <input type="email" id="demoEmail" name="email"
                                   class="form-control demo-input @error('email') is-invalid @enderror"
                                   placeholder="you@example.com"
                                   value="{{ old('email') }}"
                                   maxlength="255" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Course --}}
                        <div class="col-12">
                            <label for="demoCourse" class="demo-label">
                                Select Course <span>*</span>
                            </label>
                            <select id="demoCourse" name="course_id"
                                    class="form-select demo-input @error('course_id') is-invalid @enderror"
                                    required>
                                <option value="">Choose your course</option>
                                @foreach($formdata as $course)
                                    <option value="{{ $course->id }}"
                                        {{ (string) old('course_id') === (string) $course->id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div class="col-12">
                            <label for="demoAddress" class="demo-label">
                                Address <span>*</span>
                            </label>
                            <textarea id="demoAddress" name="address"
                                      class="form-control demo-input @error('address') is-invalid @enderror"
                                      rows="2" placeholder="Your address"
                                      required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit button --}}
                        <div class="col-12">
                            <button type="submit" class="demo-submit"
                                    id="demoSubmitBtn">
                                <i class="bi bi-send-fill me-2"></i>
                                Book My Free Demo
                            </button>

                            <p class="demo-note">
                                <i class="bi bi-shield-check me-1"></i>
                                Your details are safe with us.
                            </p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- ================= TOAST NOTIFICATIONS ================= --}}
@if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3"
         style="z-index: 2000;">
        <div id="offerSuccessToast"
             class="toast text-bg-success border-0 shadow"
             role="alert" aria-live="polite" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
                <button type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="toast-container position-fixed top-0 end-0 p-3"
         style="z-index: 2000;">
        <div id="offerErrorToast"
             class="toast text-bg-danger border-0 shadow"
             role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <strong><i class="bi bi-exclamation-circle me-1"></i>
                        Please check your details.</strong>
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif


{{-- ================= CSS ================= --}}
<style>
.demo-dialog {
    max-width: 490px;
    margin-left: auto;
    margin-right: auto;
}

.demo-modal {
    position: relative;
    border: 0;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, .18);
}

.demo-header {
    position: relative;
    padding: 20px 24px 12px;
    background: #f0fdf4;
    border-bottom: 1px solid #dcfce7;
}

.demo-header .btn-close {
    position: absolute;
    right: 15px;
    top: 15px;
}

.demo-logo {
    display: block;
    width: auto;
    height: 48px;
    max-width: 180px;
    object-fit: contain;
    margin: 0 auto 9px;
}

.demo-header h5 {
    color: #166534;
    font-size: 21px;
}

.demo-header p {
    font-size: 12px;
}

.demo-body {
    padding: 18px 24px 20px;
}

.demo-label {
    display: block;
    margin-bottom: 5px;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
}

.demo-label span {
    color: #dc2626;
}

.demo-input {
    min-height: 41px;
    padding: 9px 12px;
    font-size: 13px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background-color: #fff;
}

textarea.demo-input {
    min-height: 65px;
    resize: vertical;
}

.demo-input:focus {
    border-color: #16a34a;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, .12);
}

.demo-submit {
    width: 100%;
    padding: 12px;
    border: 0;
    border-radius: 9px;
    background: #15803d;
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    transition: background .2s ease;
}

.demo-submit:hover {
    background: #166534;
}

.demo-note {
    margin: 10px 0 0;
    text-align: center;
    color: #6b7280;
    font-size: 11px;
}

@media (max-width: 575.98px) {
    .demo-dialog {
        max-width: none;
        margin: 10px;
    }

    .demo-header {
        padding-top: 18px;
    }

    .demo-body {
        padding: 16px;
    }

    .demo-logo {
        height: 42px;
    }
}
</style>


{{-- ================= JAVASCRIPT ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap bundle JS is not loaded.');
        return;
    }

    const successToast = document.getElementById('offerSuccessToast');
    if (successToast) {
        bootstrap.Toast.getOrCreateInstance(successToast, {
            delay: 4000
        }).show();
    }

    const errorToast = document.getElementById('offerErrorToast');
    if (errorToast) {
        bootstrap.Toast.getOrCreateInstance(errorToast, {
            autohide: false
        }).show();

        const modal = document.getElementById('demoModal');
        if (modal) {
            bootstrap.Modal.getOrCreateInstance(modal).show();
        }
    }

    const phone = document.getElementById('demoPhone');
    if (phone) {
        phone.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
        });
    }

});
</script>
