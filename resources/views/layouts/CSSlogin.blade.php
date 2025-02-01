<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Styles -->
    <style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to bottom right, #f3f4f6, #e5e7eb);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* Login Container */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 500px;
    background: #fff;
    box-shadow: 1 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 40px;
    box-sizing: border-box;
}

/* Login Card */
.login-card {
    width: 100%;
}

/* Header */
.login-header {
    font-size: 1.8rem;
    font-weight: bold;
    text-align: center;
    color: #4f46e5;
    margin-bottom: 20px;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

.form-label {
    font-size: 0.9rem;
    color: #374151;
    margin-bottom: 5px;
    display: block;
}

.form-input {
    padding: 10px 15px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    font-size: 1rem;
    color: #374151;
    background: #f9fafb;
    transition: all 0.3s ease;
}

.form-input:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 4px rgba(79, 70, 229, 0.4);
    outline: none;
}

/* Error Message */
.error-message {
    font-size: 0.875rem;
    color: #dc2626;
    margin-top: 5px;
}

/* Remember Me */
.checkbox-container {
    display: flex;
    align-items: center;
    gap: 8px;
}

.checkbox-container input {
    margin: 0;
}

.checkbox-label {
    font-size: 0.875rem;
    color: #374151;
}


/* Button */
.login-button {
    width: 100%;
    padding: 10px 15px;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background: #4f46e5;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.login-button:hover {
    background: #3730a3;
}

/* Footer */
.login-footer {
    text-align: center;
    margin-top: 20px;
}

.login-footer p {
    font-size: 0.875rem;
    color: #6b7280;
}

.register-link {
    color: #4f46e5;
    text-decoration: none;
    font-weight: bold;
}

.register-link:hover {
    text-decoration: underline;
}

</style>

</head>
        <main class="app-main">
            @yield('content') {{-- Konten dinamis dari halaman login --}}
        </main>
        
    </div>
</body>
</html>
