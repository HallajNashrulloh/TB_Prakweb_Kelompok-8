<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Styles -->
    <style>
/* Register Container */
.register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(to bottom right, #f3f4f6, #e5e7eb);
}

.register-card {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 400px;
}

/* Header */
.register-header {
    font-size: 1.8rem;
    color: #4f46e5;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Form Input */
.form-input {
    width: 100%;
    padding: 12px 15px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-input:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 4px rgba(79, 70, 229, 0.4);
    outline: none;
}

/* Register Button */
.register-button {
    background-color: #4f46e5;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: bold;
    transition: background 0.3s ease;
    padding: 10px 15px;
    border-radius: 5px;
    margin-top: 10px;
    width: 100%;
}

.register-button:hover {
    background-color: #3730a3;
}

/* Footer */
.register-footer {
    margin-top: 20px;
    font-size: 0.9rem;
    color: #6b7280;
}

.register-footer a {
    color: #4f46e5;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.register-footer a:hover {
    color: #3730a3;
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
