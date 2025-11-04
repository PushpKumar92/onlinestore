@extends('frontend.layout.main')

@section('title', 'Contact Us')

@section('content')


<section class="contact-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title-1">Get In Touch</h2>
            <p class="section-subtitle">Have questions? We'd love to hear from you. Send us a message and we'll respond
                as soon as possible.</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row g-4">
            <!-- Contact Information Column -->
            <div class="col-lg-5">
                <div class="contact-info-wrapper">
                    <!-- Phone Card -->
                    <div class="contact-card" data-aos="fade-right" data-aos-delay="100">
                        <div class="contact-icon">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Phone</h5>
                            <p>91-8837810916</p>
                            <p class="text-muted small">Mon-Fri: 10AM - 6PM</p>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="contact-card" data-aos="fade-right" data-aos-delay="200">
                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Email</h5>
                            <p>support@yourstore.com</p>
                            <p class="text-muted small">We reply within 24 hours</p>
                        </div>
                    </div>

                    <!-- Address Card -->
                    <div class="contact-card" data-aos="fade-right" data-aos-delay="300">
                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Address</h5>
                            <p>10149, 10th floor, Gaur City Mall </p>
                            <p>Greater Noida, 201318</p>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="map-container" data-aos="fade-up">

                    <!-- Option 1: New Delhi, India (Capital) -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224357.8066978043!2d77.04417084707599!3d28.52758200617607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2sNew%20Delhi%2C%20Delhi%2C%20India!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                    <!-- Option 2: Mumbai, India -->
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.11609823277!2d72.71637536858896!3d19.08219783873968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra%2C%20India!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe> -->

                    <!-- Option 3: Bangalore, India -->
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.8862419672!2d77.49085447890879!3d12.953945613661024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C%20Karnataka%2C%20India!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe> -->

                    <!-- Option 4: Ghaziabad, Uttar Pradesh (Your Current Location) -->
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224317.67785691446!2d77.30032654746135!3d28.671787899508656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cf1bb41c50fdf%3A0xe6732119ce20be71!2sGhaziabad%2C%20Uttar%20Pradesh%2C%20India!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe> -->

                    <!-- Option 5: Hyderabad, India -->
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d243647.3159928039!2d78.26449087156551!3d17.412608636728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb99daeaebd2c7%3A0xae93b78392bafbc2!2sHyderabad%2C%20Telangana%2C%20India!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe> -->

                    <!-- Option 6: Pune, India -->
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242118.02763643936!2d73.69815320676856!3d18.524564297132016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra%2C%20India!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe> -->
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="col-lg-7">
                <div class="contact-form-wrapper" data-aos="fade-left">
                    <h3 class="form-title">Send Us A Message</h3>
                     <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name') }}" 
                                    placeholder="John Doe" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" value="{{ old('email') }}" 
                                    placeholder="john@example.com" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                    id="phone" name="phone" value="{{ old('phone') }}" 
                                    placeholder="+1 (234) 567-8900">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subject -->
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject *</label>
                                <select class="form-select @error('subject') is-invalid @enderror" 
                                    id="subject" name="subject" required>
                                    <option value="">Choose a subject</option>
                                    <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>
                                        General Inquiry
                                    </option>
                                    <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>
                                        Customer Support
                                    </option>
                                    <option value="order" {{ old('subject') == 'order' ? 'selected' : '' }}>
                                        Order Issue
                                    </option>
                                    <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>
                                        Feedback
                                    </option>
                                    <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <label for="message" class="form-label">Your Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                    id="message" name="message" rows="5" 
                                    placeholder="Write your message here..." 
                                    required>{{ old('message') }}</textarea>
                                <small class="text-muted">Minimum 10 characters, maximum 1000 characters</small>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="submit-btn btn btn-primary w-100">
                                    <span>Send Message</span>
                                    <i class="fa-solid fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection