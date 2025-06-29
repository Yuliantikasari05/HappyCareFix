@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="container-fluid">
    <div class="d-flexSettings')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Settings</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab">
                    <i class="fas fa-cog me-2"></i> General
                </button>
                <button class="nav-link" id="v-pills-appearance-tab" data-bs-toggle="pill" data-bs-target="#v-pills-appearance" type="button" role="tab">
                    <i class="fas fa-palette me-2"></i> Appearance
                </button>
                <button class="nav-link" id="v-pills-email-tab" data-bs-toggle="pill" data-bs-target="#v-pills-email" type="button" role="tab">
                    <i class="fas fa-envelope me-2"></i> Email
                </button>
                <button class="nav-link" id="v-pills-social-tab" data-bs-toggle="pill" data-bs-target="#v-pills-social" type="button" role="tab">
                    <i class="fas fa-share-alt me-2"></i> Social Media
                </button>
                <button class="nav-link" id="v-pills-advanced-tab" data-bs-toggle="pill" data-bs-target="#v-pills-advanced" type="button" role="tab">
                    <i class="fas fa-tools me-2"></i> Advanced
                </button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- General Settings -->
                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">General Settings</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.update') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="site_name" class="form-label">Site Name</label>
                                    <input type="text" class="form-control" id="site_name" name="site_name" value="HappyCare">
                                </div>
                                <div class="mb-3">
                                    <label for="site_description" class="form-label">Site Description</label>
                                    <textarea class="form-control" id="site_description" name="site_description" rows="3">Your health and wellness companion</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">Contact Email</label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" value="admin@happycare.com">
                                </div>
                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Contact Phone</label>
                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="+1234567890">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Appearance Settings -->
                <div class="tab-pane fade" id="v-pills-appearance" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Appearance Settings</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.appearance') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="theme_color" class="form-label">Primary Color</label>
                                    <input type="color" class="form-control form-control-color" id="theme_color" name="theme_color" value="#0d6efd">
                                </div>
                                <div class="mb-3">
                                    <label for="logo_url" class="form-label">Logo URL</label>
                                    <input type="url" class="form-control" id="logo_url" name="logo_url" placeholder="https://example.com/logo.png">
                                </div>
                                <div class="mb-3">
                                    <label for="favicon_url" class="form-label">Favicon URL</label>
                                    <input type="url" class="form-control" id="favicon_url" name="favicon_url" placeholder="https://example.com/favicon.ico">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Email Settings -->
                <div class="tab-pane fade" id="v-pills-email" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Email Settings</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.email') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="smtp_host" class="form-label">SMTP Host</label>
                                    <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="smtp.gmail.com">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="smtp_port" class="form-label">SMTP Port</label>
                                            <input type="number" class="form-control" id="smtp_port" name="smtp_port" value="587">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="smtp_encryption" class="form-label">Encryption</label>
                                            <select class="form-select" id="smtp_encryption" name="smtp_encryption">
                                                <option value="tls" selected>TLS</option>
                                                <option value="ssl">SSL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="smtp_username" class="form-label">SMTP Username</label>
                                    <input type="text" class="form-control" id="smtp_username" name="smtp_username">
                                </div>
                                <div class="mb-3">
                                    <label for="smtp_password" class="form-label">SMTP Password</label>
                                    <input type="password" class="form-control" id="smtp_password" name="smtp_password">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Social Media Settings -->
                <div class="tab-pane fade" id="v-pills-social" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Social Media Settings</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.social') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="facebook_url" class="form-label">Facebook URL</label>
                                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" placeholder="https://facebook.com/happycare">
                                </div>
                                <div class="mb-3">
                                    <label for="twitter_url" class="form-label">Twitter URL</label>
                                    <input type="url" class="form-control" id="twitter_url" name="twitter_url" placeholder="https://twitter.com/happycare">
                                </div>
                                <div class="mb-3">
                                    <label for="instagram_url" class="form-label">Instagram URL</label>
                                    <input type="url" class="form-control" id="instagram_url" name="instagram_url" placeholder="https://instagram.com/happycare">
                                </div>
                                <div class="mb-3">
                                    <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                                    <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" placeholder="https://linkedin.com/company/happycare">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Advanced Settings -->
                <div class="tab-pane fade" id="v-pills-advanced" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Advanced Settings</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.advanced') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="maintenance_mode" name="maintenance_mode">
                                        <label class="form-check-label" for="maintenance_mode">
                                            Maintenance Mode
                                        </label>
                                    </div>
                                    <small class="text-muted">Enable this to put the site in maintenance mode</small>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_registration" name="user_registration" checked>
                                        <label class="form-check-label" for="user_registration">
                                            Allow User Registration
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="google_analytics" class="form-label">Google Analytics ID</label>
                                    <input type="text" class="form-control" id="google_analytics" name="google_analytics" placeholder="GA-XXXXXXXXX">
                                </div>
                                <div class="mb-3">
                                    <label for="custom_css" class="form-label">Custom CSS</label>
                                    <textarea class="form-control" id="custom_css" name="custom_css" rows="5" placeholder="/* Add your custom CSS here */"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection