<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentaCar Express - Alquiler de Autos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary: #1a3a5f;
            --secondary: #4a90e2;
            --accent: #ff6b6b;
            --success: #2ecc71;
            --warning: #f39c12;
            --light: #f8f9fa;
            --dark: #2c3e50;
            --gray: #95a5a6;
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header y Navegación Mejorada */
        header {
            background-color: white;
            padding: 1rem 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
        }
        
        .logo i {
            color: var(--secondary);
            margin-right: 10px;
            font-size: 2rem;
        }
        
        .logo span {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            margin-left: auto;
            margin-right: 2rem;
        }
        
        .nav-links li {
            margin-left: 2rem;
        }
        
        .nav-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.5rem 0;
            position: relative;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--secondary);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--secondary);
            transition: width 0.3s;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        /* Botones de autenticación en esquina derecha */
        .auth-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .auth-buttons {
            display: flex;
            gap: 0.8rem;
        }
        
        .auth-btn {
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-size: 0.9rem;
        }
        
        .login-btn {
            background-color: transparent;
            color: var(--secondary);
            border: 2px solid var(--secondary);
        }
        
        .login-btn:hover {
            background-color: var(--secondary);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        
        .register-btn {
            background-color: var(--secondary);
            color: white;
            border: 2px solid var(--secondary);
        }
        
        .register-btn:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: var(--dark);
            font-weight: 600;
            padding: 0.5rem 1rem;
            background-color: #f0f7ff;
            border-radius: 50px;
        }
        
        .user-info i {
            color: var(--secondary);
            font-size: 1.2rem;
        }
        
        .logout-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #e74c3c;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        
        /* Hero Section Mejorada */
        .hero {
            background: linear-gradient(135deg, rgba(26, 58, 95, 0.9) 0%, rgba(74, 144, 226, 0.8) 100%), url('https://images.unsplash.com/photo-1549399542-7e3f8b79c341?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
            border-radius: 0 0 30px 30px;
            margin-bottom: 3rem;
        }
        
        .hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 800;
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }
        
        /* Buscador Mejorado */
        .search-container {
            background-color: white;
            border-radius: 15px;
            padding: 2.5rem;
            max-width: 1000px;
            margin: 2rem auto 0;
            box-shadow: var(--shadow-hover);
        }
        
        .search-title {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
        }
        
        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .form-control {
            padding: 0.9rem 1.2rem;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        .search-btn {
            grid-column: 1 / -1;
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 0.5rem;
        }
        
        .search-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        
        .search-btn i {
            margin-right: 0.5rem;
        }
        
        /* Filtros Avanzados */
        .filter-toggle {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .filter-btn {
            background: none;
            border: none;
            color: var(--secondary);
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
        }
        
        .advanced-filters {
            display: none;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            background-color: #f8fafc;
            border-radius: 10px;
        }
        
        .advanced-filters.active {
            display: grid;
            animation: fadeIn 0.5s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Sección de Autos */
        .section-title {
            text-align: center;
            margin: 3rem 0 2rem;
            color: var(--primary);
            font-size: 2.5rem;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary), var(--primary));
            margin: 0.8rem auto;
            border-radius: 2px;
        }
        
        .cars-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .results-count {
            color: var(--gray);
            font-weight: 600;
        }
        
        .sort-options select {
            padding: 0.7rem 1rem;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            background-color: white;
        }
        
        .cars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }
        
        .car-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            position: relative;
        }
        
        .car-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }
        
        .car-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: var(--accent);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            z-index: 2;
        }
        
        .car-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .car-card:hover img {
            transform: scale(1.05);
        }
        
        .car-info {
            padding: 1.5rem;
        }
        
        .car-title {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .car-name {
            font-size: 1.4rem;
            color: var(--primary);
            font-weight: 700;
        }
        
        .car-type {
            color: var(--gray);
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .car-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            color: #666;
        }
        
        .car-detail {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            flex: 1;
        }
        
        .car-detail i {
            color: var(--secondary);
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .car-detail span {
            font-size: 0.9rem;
        }
        
        .car-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .car-price span {
            font-size: 1rem;
            color: var(--gray);
            font-weight: 600;
        }
        
        .car-actions {
            display: flex;
            gap: 1rem;
        }
        
        .action-btn {
            flex: 1;
            padding: 0.8rem;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .detail-btn {
            background-color: #f0f7ff;
            color: var(--secondary);
            border: 2px solid #e1e8ed;
        }
        
        .detail-btn:hover {
            background-color: var(--secondary);
            color: white;
            border-color: var(--secondary);
        }
        
        .rent-btn {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
        }
        
        .rent-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        
        /* Formularios de autenticación */
        .auth-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            animation: fadeInModal 0.3s;
        }
        
        @keyframes fadeInModal {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .auth-form {
            background-color: white;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            padding: 2.5rem;
            box-shadow: var(--shadow-hover);
            position: relative;
            animation: slideUp 0.5s;
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.8rem;
            cursor: pointer;
            color: var(--gray);
            transition: color 0.3s;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .close-btn:hover {
            color: var(--accent);
            background-color: #f8f9fa;
        }
        
        .auth-form h2 {
            margin-bottom: 1.8rem;
            color: var(--primary);
            text-align: center;
            font-size: 2rem;
        }
        
        .auth-form .submit-btn {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        
        .auth-form .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        
        /* Página de Contacto */
        .contact-page {
            padding: 3rem 0;
            flex: 1;
        }
        
        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }
        
        .contact-info {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }
        
        .contact-info h2 {
            margin-bottom: 2rem;
            font-size: 2rem;
        }
        
        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .contact-item i {
            font-size: 1.5rem;
            margin-top: 0.2rem;
            color: #aad1ff;
        }
        
        .contact-item h4 {
            margin-bottom: 0.3rem;
            font-size: 1.1rem;
        }
        
        .social-contact {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .social-icon {
            width: 45px;
            height: 45px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .social-icon:hover {
            background-color: white;
            color: var(--primary);
            transform: translateY(-3px);
        }
        
        .contact-form-container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }
        
        .contact-form-container h2 {
            color: var(--primary);
            margin-bottom: 2rem;
            font-size: 2rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .contact-form .form-group {
            margin-bottom: 1.5rem;
        }
        
        .contact-form textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .contact-form .submit-btn {
            width: 100%;
            padding: 1rem;
            font-size: 1.1rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary);
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: auto;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2.5rem;
        }
        
        .footer-column h3 {
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--secondary);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-column ul li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .footer-column ul li a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid #3a506b;
            color: #bdc3c7;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }
            
            .auth-section {
                width: 100%;
                justify-content: center;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .search-container {
                padding: 1.5rem;
            }
            
            .cars-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
        
        @media (max-width: 576px) {
            .auth-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .auth-btn {
                width: 100%;
            }
            
            .user-info {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
            
            .car-actions {
                flex-direction: column;
            }
        }
        
        /* Utilidades */
        .hidden {
            display: none !important;
        }
        
        .active-page {
            color: var(--secondary) !important;
        }
        
        .active-page::after {
            width: 100% !important;
        }
        
        /* Notificaciones */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            z-index: 3000;
            animation: slideInRight 0.5s;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            max-width: 350px;
            box-shadow: var(--shadow-hover);
        }
        
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .notification.success {
            background-color: var(--success);
        }
        
        .notification.warning {
            background-color: var(--warning);
        }
        
        .notification.error {
            background-color: var(--accent);
        }
        
        .notification.info {
            background-color: var(--secondary);
        }
        
        /* Reserva Modal */
        .reservation-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            animation: fadeInModal 0.3s;
        }
        
        .reservation-form {
            background-color: white;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            padding: 2.5rem;
            box-shadow: var(--shadow-hover);
            position: relative;
            animation: slideUp 0.5s;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .reservation-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .reservation-car-img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }
        
        .reservation-car-info h3 {
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .reservation-car-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--secondary);
        }
        
        .reservation-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .reservation-summary {
            background-color: #f8fafc;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e1e8ed;
        }
        
        .summary-total {
            display: flex;
            justify-content: space-between;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
            margin-top: 1rem;
        }
        
        /* Detalles del Auto Modal */
        .car-detail-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            animation: fadeInModal 0.3s;
        }
        
        .car-detail-content {
            background-color: white;
            border-radius: 20px;
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideUp 0.5s;
        }
        
        .car-detail-header {
            padding: 2rem 2rem 0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .car-detail-body {
            padding: 1.5rem 2rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
        
        .car-detail-gallery {
            border-radius: 10px;
            overflow: hidden;
            height: 300px;
        }
        
        .car-detail-gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .car-detail-specs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        
        .spec-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .spec-item i {
            color: var(--secondary);
            font-size: 1.2rem;
            width: 30px;
        }
        
        /* NUEVOS ESTILOS PARA FILTROS ACTIVOS */
        .filter-active-indicator {
            border-color: var(--secondary) !important;
            background-color: #f0f7ff !important;
        }
        
        .filter-tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        
        .filter-tag {
            background-color: var(--secondary);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .filter-tag button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .clear-filters-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 1rem;
        }
        
        .clear-filters-btn:hover {
            background-color: #e74c3c;
        }
        
        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo" id="homeLink">
                    <i class="fas fa-car"></i>
                    <span>RentaCar Express</span>
                </a>
                
                <ul class="nav-links">
                    <li><a href="#" id="homeNav" class="active-page">Inicio</a></li>
                    <li><a href="#" id="carsNav">Autos</a></li>
                    <li><a href="#" id="contactNav">Contacto</a></li>
                </ul>
                
                <div class="auth-section" id="authSection">
                    <!-- Se llenará dinámicamente con login/register o user info -->
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido Principal (se cambia dinámicamente) -->
    <main id="mainContent">
        <!-- Página de Inicio (se carga por defecto) -->
        <div id="homePage">
            <!-- Hero Section -->
            <section class="hero">
                <div class="container">
                    <div class="hero-content">
                        <h1>Encuentra el auto perfecto para tu viaje</h1>
                        <p>Reserva en minutos, recoge en nuestras sucursales y disfruta de la mejor experiencia de alquiler.</p>
                        
                        <div class="search-container">
                            <h3 class="search-title">Busca tu auto ideal</h3>
                            
                            <div class="filter-toggle">
                                <button class="filter-btn" id="toggleFilters">
                                    <i class="fas fa-sliders-h"></i>
                                    Filtros avanzados
                                </button>
                            </div>
                            
                            <form id="searchForm" class="search-form">
                                <div class="form-group">
                                    <label for="searchLocation">Ubicación de recogida</label>
                                    <input type="text" id="searchLocation" class="form-control" placeholder="¿Dónde recogerás el auto?" value="Ciudad Central">
                                </div>
                                
                                <div class="form-group">
                                    <label for="pickupDate">Fecha de recogida</label>
                                    <input type="date" id="pickupDate" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="returnDate">Fecha de devolución</label>
                                    <input type="date" id="returnDate" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="carType">Tipo de auto</label>
                                    <select id="carType" class="form-control">
                                        <option value="">Cualquier tipo</option>
                                        <option value="Económico">Económico</option>
                                        <option value="Compacto">Compacto</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Lujo">Lujo</option>
                                        <option value="Eléctrico">Eléctrico</option>
                                    </select>
                                </div>
                                
                                <div class="advanced-filters" id="advancedFilters">
                                    <div class="form-group">
                                        <label for="transmission">Transmisión</label>
                                        <select id="transmission" class="form-control">
                                            <option value="">Cualquiera</option>
                                            <option value="Automático">Automático</option>
                                            <option value="Manual">Manual</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="passengers">Pasajeros</label>
                                        <select id="passengers" class="form-control">
                                            <option value="0">Cualquiera</option>
                                            <option value="4">4+ pasajeros</option>
                                            <option value="5">5 pasajeros</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="priceRange">Rango de precio (por día)</label>
                                        <select id="priceRange" class="form-control">
                                            <option value="">Cualquiera</option>
                                            <option value="0-50">$0 - $50</option>
                                            <option value="50-100">$50 - $100</option>
                                            <option value="100-150">$100 - $150</option>
                                            <option value="150-200">$150+</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="fuelType">Tipo de combustible</label>
                                        <select id="fuelType" class="form-control">
                                            <option value="">Cualquiera</option>
                                            <option value="Gasolina">Gasolina</option>
                                            <option value="Híbrido">Híbrido</option>
                                            <option value="Eléctrico">Eléctrico</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <button type="submit" class="search-btn">
                                    <i class="fas fa-search"></i>
                                    Buscar Autos Disponibles
                                </button>
                            </form>
                            
                            <!-- Tags de filtros activos -->
                            <div class="filter-tags-container" id="filterTags">
                                <!-- Los filtros activos aparecerán aquí -->
                            </div>
                            
                            <div class="search-stats" id="searchStats">
                                <p>Mostrando <span id="resultsCount">8</span> autos disponibles</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sección de Autos Destacados -->
            <section class="container">
                <h2 class="section-title">Autos Disponibles</h2>
                
                <div class="cars-header">
                    <div class="results-count">
                        <span id="totalResults">8</span> autos encontrados
                    </div>
                    
                    <div class="sort-options">
                        <select id="sortBy">
                            <option value="recommended">Recomendados</option>
                            <option value="price-low">Precio: menor a mayor</option>
                            <option value="price-high">Precio: mayor a menor</option>
                            <option value="name">Nombre A-Z</option>
                        </select>
                    </div>
                </div>
                
                <div class="cars-grid" id="carsGrid">
                    <!-- Los autos se cargarán aquí dinámicamente -->
                </div>
            </section>
        </div>
        
        <!-- Página de Contacto (oculta por defecto) -->
        <div id="contactPage" class="hidden">
            <section class="contact-page">
                <div class="container">
                    <h1 class="section-title">Contáctanos</h1>
                    
                    <div class="contact-container">
                        <div class="contact-info">
                            <h2>¿Necesitas ayuda?</h2>
                            <p>Estamos aquí para ayudarte con cualquier pregunta sobre nuestros servicios de alquiler de autos.</p>
                            
                            <div class="contact-details">
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <h4>Dirección</h4>
                                        <p>Av. Principal 1234, Ciudad Central</p>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <div>
                                        <h4>Teléfono</h4>
                                        <p>+1 (234) 567-8900</p>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <div>
                                        <h4>Email</h4>
                                        <p>info@rentacarexpress.com</p>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <h4>Horario de Atención</h4>
                                        <p>Lunes a Viernes: 8:00 - 20:00<br>Sábados: 9:00 - 18:00</p>
                                    </div>
                                </div>
                            </div>
                            
                            <h3>Síguenos en redes sociales</h3>
                            <div class="social-contact">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        
                        <div class="contact-form-container">
                            <h2>Envíanos un mensaje</h2>
                            <form id="contactForm" class="contact-form">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="contactName">Nombre completo *</label>
                                        <input type="text" id="contactName" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="contactEmail">Correo electrónico *</label>
                                        <input type="email" id="contactEmail" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="contactSubject">Asunto *</label>
                                    <input type="text" id="contactSubject" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="contactMessage">Mensaje *</label>
                                    <textarea id="contactMessage" class="form-control" required></textarea>
                                </div>
                                
                                <button type="submit" class="submit-btn">Enviar Mensaje</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Formulario de Inicio de Sesión -->
    <div id="loginModal" class="auth-modal">
        <div class="auth-form">
            <span class="close-btn" id="closeLogin">&times;</span>
            <h2>Iniciar Sesión</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="loginEmail">Correo Electrónico</label>
                    <input type="email" id="loginEmail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Contraseña</label>
                    <input type="password" id="loginPassword" class="form-control" required>
                </div>
                <button type="submit" class="submit-btn">Iniciar Sesión</button>
            </form>
            <div class="form-footer" style="text-align: center; margin-top: 1.5rem;">
                <p>¿No tienes una cuenta? <a href="#" id="goToRegister">Regístrate aquí</a></p>
            </div>
        </div>
    </div>

    <!-- Formulario de Registro -->
    <div id="registerModal" class="auth-modal">
        <div class="auth-form">
            <span class="close-btn" id="closeRegister">&times;</span>
            <h2>Crear Cuenta</h2>
            <form id="registerForm">
                <div class="form-group">
                    <label for="registerName">Nombre Completo</label>
                    <input type="text" id="registerName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Correo Electrónico</label>
                    <input type="email" id="registerEmail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="registerPhone">Teléfono</label>
                    <input type="tel" id="registerPhone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Contraseña</label>
                    <input type="password" id="registerPassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="registerConfirmPassword">Confirmar Contraseña</label>
                    <input type="password" id="registerConfirmPassword" class="form-control" required>
                </div>
                <button type="submit" class="submit-btn">Crear Cuenta</button>
            </form>
            <div class="form-footer" style="text-align: center; margin-top: 1.5rem;">
                <p>¿Ya tienes una cuenta? <a href="#" id="goToLogin">Inicia sesión aquí</a></p>
            </div>
        </div>
    </div>

    <!-- Modal de Reserva -->
    <div id="reservationModal" class="reservation-modal">
        <div class="reservation-form">
            <span class="close-btn" id="closeReservation">&times;</span>
            <div class="reservation-header">
                <img id="reservationCarImg" src="" alt="" class="reservation-car-img">
                <div class="reservation-car-info">
                    <h3 id="reservationCarName"></h3>
                    <div class="reservation-car-price" id="reservationCarPrice"></div>
                </div>
            </div>
            
            <form id="reservationForm">
                <div class="reservation-details">
                    <div class="form-group">
                        <label for="reservationPickupDate">Fecha de recogida</label>
                        <input type="date" id="reservationPickupDate" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="reservationReturnDate">Fecha de devolución</label>
                        <input type="date" id="reservationReturnDate" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="reservationPickupLocation">Ubicación de recogida</label>
                        <select id="reservationPickupLocation" class="form-control" required>
                            <option value="central">Sucursal Central - Av. Principal 1234</option>
                            <option value="north">Sucursal Norte - Calle Norte 567</option>
                            <option value="south">Sucursal Sur - Av. Sur 890</option>
                            <option value="airport">Aeropuerto Internacional</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="reservationReturnLocation">Ubicación de devolución</label>
                        <select id="reservationReturnLocation" class="form-control" required>
                            <option value="central">Sucursal Central - Av. Principal 1234</option>
                            <option value="north">Sucursal Norte - Calle Norte 567</option>
                            <option value="south">Sucursal Sur - Av. Sur 890</option>
                            <option value="airport">Aeropuerto Internacional</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="reservationExtras">Extras (opcional)</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 0.5rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem;">
                            <input type="checkbox" name="extra" value="insurance" id="extraInsurance">
                            <span>Seguro adicional (+$15/día)</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem;">
                            <input type="checkbox" name="extra" value="gps" id="extraGPS">
                            <span>GPS (+$10/día)</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem;">
                            <input type="checkbox" name="extra" value="childseat" id="extraChildSeat">
                            <span>Asiento para niño (+$8/día)</span>
                        </label>
                    </div>
                </div>
                
                <div class="reservation-summary">
                    <h4 style="margin-bottom: 1rem; color: var(--primary);">Resumen de la Reserva</h4>
                    <div class="summary-item">
                        <span>Tarifa diaria:</span>
                        <span id="summaryDailyRate">$0</span>
                    </div>
                    <div class="summary-item">
                        <span>Días de alquiler:</span>
                        <span id="summaryDays">0</span>
                    </div>
                    <div class="summary-item">
                        <span>Subtotal:</span>
                        <span id="summarySubtotal">$0</span>
                    </div>
                    <div class="summary-item">
                        <span>Extras:</span>
                        <span id="summaryExtras">$0</span>
                    </div>
                    <div class="summary-item">
                        <span>Impuestos (10%):</span>
                        <span id="summaryTaxes">$0</span>
                    </div>
                    <div class="summary-total">
                        <span>Total:</span>
                        <span id="summaryTotal">$0</span>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">Confirmar Reserva</button>
            </form>
        </div>
    </div>

    <!-- Modal de Detalles del Auto -->
    <div id="carDetailModal" class="car-detail-modal">
        <div class="car-detail-content">
            <span class="close-btn" id="closeCarDetail">&times;</span>
            <div class="car-detail-header">
                <div>
                    <h2 id="detailCarName"></h2>
                    <p id="detailCarType" style="color: var(--gray);"></p>
                </div>
                <div id="detailCarPrice" style="font-size: 1.8rem; font-weight: 800; color: var(--secondary);"></div>
            </div>
            
            <div class="car-detail-body">
                <div class="car-detail-gallery">
                    <img id="detailCarImage" src="" alt="">
                </div>
                
                <div>
                    <h3 style="color: var(--primary); margin-bottom: 1rem;">Descripción</h3>
                    <p id="detailCarDescription" style="margin-bottom: 1.5rem;"></p>
                    
                    <h3 style="color: var(--primary); margin-bottom: 1rem;">Especificaciones</h3>
                    <div class="car-detail-specs" id="detailCarSpecs">
                        <!-- Se llenará dinámicamente -->
                    </div>
                    
                    <div class="car-actions" style="margin-top: 2rem;">
                        <button class="action-btn detail-btn" id="detailCloseBtn">
                            <i class="fas fa-times"></i>
                            Cerrar
                        </button>
                        <button class="action-btn rent-btn" id="detailRentBtn">
                            <i class="fas fa-calendar-check"></i>
                            Reservar Ahora
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>RentaCar Express</h3>
                    <p>La mejor plataforma para alquilar autos. Ofrecemos una amplia variedad de vehículos para todos tus viajes.</p>
                </div>
                <div class="footer-column">
                    <h3>Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="#" id="footerHome"><i class="fas fa-chevron-right"></i> Inicio</a></li>
                        <li><a href="#" id="footerCars"><i class="fas fa-chevron-right"></i> Autos Disponibles</a></li>
                        <li><a href="#" id="footerContact"><i class="fas fa-chevron-right"></i> Contacto</a></li>
                        <li><a href="#" id="footerLogin"><i class="fas fa-chevron-right"></i> Iniciar Sesión</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contacto</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Av. Principal 1234, Ciudad Central</a></li>
                        <li><a href="tel:+12345678900"><i class="fas fa-phone"></i> +1 234 567 8900</a></li>
                        <li><a href="mailto:info@rentacarexpress.com"><i class="fas fa-envelope"></i> info@rentacarexpress.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 RentaCar Express. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Datos de autos disponibles - CORREGIDOS para coincidir con filtros
        const cars = [
            {
                id: 1,
                name: "Toyota Corolla 2023",
                type: "Compacto",
                passengers: 5,
                transmission: "Automático",
                fuel: "Híbrido",
                doors: 4,
                luggage: 2,
                price: 45,
                image: "https://beyondautos.com/wp-content/uploads/2023/09/Toyota-Corolla.jpg",
                description: "El Toyota Corolla es un sedán compacto confiable y eficiente en combustible, perfecto para viajes urbanos y carreteras.",
                featured: true
            },
            {
                id: 2,
                name: "Honda Civic 2023",
                type: "Compacto",
                passengers: 5,
                transmission: "Manual",
                fuel: "Gasolina",
                doors: 4,
                luggage: 2,
                price: 40,
                image: "https://www.honda-mideast.com/en-lb/-/media/honda/civic-ehev-lebanon/civic_ehev-23ym-frt-3_4_r-1005x560.jpg",
                description: "El Honda Civic ofrece un equilibrio perfecto entre rendimiento y eficiencia, con un diseño moderno y tecnología avanzada.",
                featured: false
            },
            {
                id: 3,
                name: "Ford Escape 2023",
                type: "SUV",
                passengers: 5,
                transmission: "Automático",
                fuel: "Híbrido",
                doors: 4,
                luggage: 3,
                price: 65,
                image: "https://media.ed.edmunds-media.com/ford/escape/2023/oem/2023_ford_escape_4dr-suv_plug-in-hybrid_fq_oem_1_1600.jpg",
                description: "SUV espacioso y versátil ideal para familias y viajes largos, con tracción en las cuatro ruedas y amplio espacio de carga.",
                featured: true
            },
            {
                id: 4,
                name: "BMW Serie 3 2023",
                type: "Lujo",
                passengers: 5,
                transmission: "Automático",
                fuel: "Gasolina",
                doors: 4,
                luggage: 2,
                price: 90,
                image: "https://hips.hearstapps.com/hmg-prod/images/2023-bmw-m340i-xdrive-182-640f4380f300b.jpg?crop=0.622xw:0.523xh;0.0962xw,0.434xh&resize=2048:*",
                description: "Sedán de lujo con prestaciones excepcionales, interior premium y tecnología de vanguardia para una experiencia de conducción única.",
                featured: true
            },
            {
                id: 5,
                name: "Nissan Versa 2023",
                type: "Económico",
                passengers: 5,
                transmission: "Automático",
                fuel: "Gasolina",
                doors: 4,
                luggage: 1,
                price: 35,
                image: "https://wieck-nissanao-production.s3.amazonaws.com/photos/636e10d706be957feb8adb091f9de1c7ca348cfe/preview-928x522.jpg",
                description: "Auto económico perfecto para la ciudad, con bajo consumo de combustible y mantenimiento accesible.",
                featured: false
            },
            {
                id: 6,
                name: "Jeep Wrangler 2023",
                type: "SUV",
                passengers: 4,
                transmission: "Manual",
                fuel: "Gasolina",
                doors: 2,
                luggage: 2,
                price: 75,
                image: "https://di-uploads-pod3.dealerinspire.com/saffordcjdrofwinchester/uploads/2022/10/ezgif.com-gif-maker-2022-10-05T113530.848.jpg",
                description: "Vehiculo todoterreno legendario, ideal para aventuras off-road y viajes con tracción en las cuatro ruedas.",
                featured: true
            },
            {
                id: 7,
                name: "Tesla Model 3 2023",
                type: "Eléctrico",
                passengers: 5,
                transmission: "Automático",
                fuel: "Eléctrico",
                doors: 4,
                luggage: 2,
                price: 85,
                image: "https://autobuy.com.co/wp-content/uploads/2024/09/Tesla-Model-3-picture-1.webp",
                description: "Auto eléctrico de alto rendimiento con autonomía extendida, tecnología autónoma y carga rápida.",
                featured: true
            },
            {
                id: 8,
                name: "Chevrolet Spark 2023",
                type: "Económico",
                passengers: 4,
                transmission: "Manual",
                fuel: "Gasolina",
                doors: 4,
                luggage: 1,
                price: 30,
                image: "https://www.c3carecarcenter.com/wp-content/uploads/2025/05/Descubre-el-nuevo-precio-del-Chevrolet-Spark-2023-ahora.webp",
                description: "Auto urbano compacto y económico, fácil de estacionar y perfecto para desplazamientos diarios.",
                featured: false
            }
        ];

        // Estado de la aplicación
        const state = {
            isLoggedIn: false,
            currentUser: null,
            currentPage: 'home',
            filteredCars: [...cars],
            currentCarForReservation: null,
            currentCarForDetail: null,
            activeFilters: {
                carType: '',
                transmission: '',
                passengers: '',
                priceRange: '',
                fuelType: ''
            }
        };

        // Elementos del DOM
        const authSection = document.getElementById('authSection');
        const mainContent = document.getElementById('mainContent');
        const homePage = document.getElementById('homePage');
        const contactPage = document.getElementById('contactPage');
        const carsGrid = document.getElementById('carsGrid');
        const loginModal = document.getElementById('loginModal');
        const registerModal = document.getElementById('registerModal');
        const reservationModal = document.getElementById('reservationModal');
        const carDetailModal = document.getElementById('carDetailModal');
        const searchForm = document.getElementById('searchForm');
        const searchStats = document.getElementById('searchStats');
        const resultsCount = document.getElementById('resultsCount');
        const totalResults = document.getElementById('totalResults');
        const toggleFilters = document.getElementById('toggleFilters');
        const advancedFilters = document.getElementById('advancedFilters');
        const sortBy = document.getElementById('sortBy');
        const homeNav = document.getElementById('homeNav');
        const carsNav = document.getElementById('carsNav');
        const contactNav = document.getElementById('contactNav');
        const homeLink = document.getElementById('homeLink');
        const filterTags = document.getElementById('filterTags');

        // Inicializar la aplicación
        function init() {
            // Establecer fechas por defecto
            setDefaultDates();
            checkAuthStatus();
            renderAuthUI();
            renderCars();
            setupEventListeners();
            updateActiveNav();
        }

        // Establecer fechas por defecto
        function setDefaultDates() {
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            const nextWeek = new Date(today);
            nextWeek.setDate(nextWeek.getDate() + 7);
            
            // Formatear fechas para input date
            const formatDate = (date) => {
                return date.toISOString().split('T')[0];
            };
            
            document.getElementById('pickupDate').value = formatDate(tomorrow);
            document.getElementById('returnDate').value = formatDate(nextWeek);
        }

        // Verificar estado de autenticación
        function checkAuthStatus() {
            const savedUser = localStorage.getItem('rentacar_currentUser');
            if (savedUser) {
                state.currentUser = JSON.parse(savedUser);
                state.isLoggedIn = true;
            }
        }

        // Renderizar interfaz de autenticación
        function renderAuthUI() {
            if (state.isLoggedIn && state.currentUser) {
                authSection.innerHTML = `
                    <div class="user-info">
                        <i class="fas fa-user-circle"></i>
                        <span>${state.currentUser.name.split(' ')[0]}</span>
                    </div>
                    <button class="logout-btn" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i>
                        Cerrar Sesión
                    </button>
                `;
                
                document.getElementById('logoutBtn').addEventListener('click', logout);
            } else {
                authSection.innerHTML = `
                    <div class="auth-buttons">
                        <button class="auth-btn login-btn" id="loginBtn">
                            <i class="fas fa-sign-in-alt"></i>
                            Iniciar Sesión
                        </button>
                        <button class="auth-btn register-btn" id="registerBtn">
                            <i class="fas fa-user-plus"></i>
                            Registrarse
                        </button>
                    </div>
                `;
                
                document.getElementById('loginBtn').addEventListener('click', () => {
                    loginModal.style.display = 'flex';
                });
                
                document.getElementById('registerBtn').addEventListener('click', () => {
                    registerModal.style.display = 'flex';
                });
            }
        }

        // Renderizar autos en la página
        function renderCars() {
            carsGrid.innerHTML = '';
            
            if (state.filteredCars.length === 0) {
                carsGrid.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-car" style="font-size: 3rem; color: var(--gray); margin-bottom: 1rem;"></i>
                        <h3 style="color: var(--primary); margin-bottom: 1rem;">No se encontraron autos</h3>
                        <p>Intenta ajustar tus filtros de búsqueda para encontrar más opciones.</p>
                        <button class="clear-filters-btn" id="clearAllFiltersBtn" style="margin-top: 1.5rem;">
                            <i class="fas fa-times"></i> Limpiar todos los filtros
                        </button>
                    </div>
                `;
                
                document.getElementById('clearAllFiltersBtn').addEventListener('click', clearAllFilters);
                
                resultsCount.textContent = '0';
                totalResults.textContent = '0';
                return;
            }
            
            state.filteredCars.forEach(car => {
                const carCard = document.createElement('div');
                carCard.className = 'car-card';
                carCard.innerHTML = `
                    ${car.featured ? '<div class="car-badge">Destacado</div>' : ''}
                    <img src="${car.image}" alt="${car.name}">
                    <div class="car-info">
                        <div class="car-title">
                            <div>
                                <h3 class="car-name">${car.name}</h3>
                                <p class="car-type">${car.type}</p>
                            </div>
                        </div>
                        <div class="car-details">
                            <div class="car-detail">
                                <i class="fas fa-users"></i>
                                <span>${car.passengers} pasajeros</span>
                            </div>
                            <div class="car-detail">
                                <i class="fas fa-cog"></i>
                                <span>${car.transmission}</span>
                            </div>
                            <div class="car-detail">
                                <i class="fas fa-gas-pump"></i>
                                <span>${car.fuel}</span>
                            </div>
                        </div>
                        <div class="car-price">$${car.price}<span>/día</span></div>
                        <div class="car-actions">
                            <button class="action-btn detail-btn" data-id="${car.id}">
                                <i class="fas fa-info-circle"></i>
                                Ver Detalles
                            </button>
                            <button class="action-btn rent-btn" data-id="${car.id}">
                                <i class="fas fa-calendar-check"></i>
                                ${state.isLoggedIn ? 'Reservar' : 'Iniciar sesión'}
                            </button>
                        </div>
                    </div>
                `;
                carsGrid.appendChild(carCard);
            });
            
            // Actualizar contadores
            resultsCount.textContent = state.filteredCars.length;
            totalResults.textContent = state.filteredCars.length;
            
            // Agregar event listeners a los botones de los autos
            document.querySelectorAll('.detail-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const carId = parseInt(this.getAttribute('data-id'));
                    showCarDetail(carId);
                });
            });
            
            document.querySelectorAll('.rent-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const carId = parseInt(this.getAttribute('data-id'));
                    if (!state.isLoggedIn) {
                        showNotification('Por favor, inicia sesión para reservar un auto.', 'warning');
                        loginModal.style.display = 'flex';
                    } else {
                        showReservationModal(carId);
                    }
                });
            });
        }

        // Actualizar tags de filtros activos
        function updateFilterTags() {
            filterTags.innerHTML = '';
            const hasActiveFilters = Object.values(state.activeFilters).some(filter => filter !== '' && filter !== '0');
            
            if (!hasActiveFilters) {
                return;
            }
            
            // Crear botón para limpiar todos los filtros
            const clearAllButton = document.createElement('button');
            clearAllButton.className = 'clear-filters-btn';
            clearAllButton.innerHTML = '<i class="fas fa-times"></i> Limpiar filtros';
            clearAllButton.addEventListener('click', clearAllFilters);
            filterTags.appendChild(clearAllButton);
            
            // Crear tags para cada filtro activo
            if (state.activeFilters.carType) {
                const tag = createFilterTag('Tipo: ' + state.activeFilters.carType, 'carType');
                filterTags.appendChild(tag);
            }
            
            if (state.activeFilters.transmission) {
                const tag = createFilterTag('Transmisión: ' + state.activeFilters.transmission, 'transmission');
                filterTags.appendChild(tag);
            }
            
            if (state.activeFilters.passengers && state.activeFilters.passengers !== '0') {
                const text = state.activeFilters.passengers === '4' ? '4+ pasajeros' : '5 pasajeros';
                const tag = createFilterTag(text, 'passengers');
                filterTags.appendChild(tag);
            }
            
            if (state.activeFilters.priceRange) {
                let text = '';
                switch(state.activeFilters.priceRange) {
                    case '0-50': text = 'Precio: $0 - $50'; break;
                    case '50-100': text = 'Precio: $50 - $100'; break;
                    case '100-150': text = 'Precio: $100 - $150'; break;
                    case '150-200': text = 'Precio: $150+'; break;
                }
                const tag = createFilterTag(text, 'priceRange');
                filterTags.appendChild(tag);
            }
            
            if (state.activeFilters.fuelType) {
                const tag = createFilterTag('Combustible: ' + state.activeFilters.fuelType, 'fuelType');
                filterTags.appendChild(tag);
            }
        }

        // Crear un tag de filtro
        function createFilterTag(text, filterName) {
            const tag = document.createElement('div');
            tag.className = 'filter-tag';
            tag.innerHTML = `
                <span>${text}</span>
                <button type="button" data-filter="${filterName}">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            tag.querySelector('button').addEventListener('click', function() {
                removeFilter(filterName);
            });
            
            return tag;
        }

        // Remover un filtro específico
        function removeFilter(filterName) {
            document.getElementById(filterName).value = '';
            state.activeFilters[filterName] = '';
            filterCars();
        }

        // Limpiar todos los filtros
        function clearAllFilters() {
            document.getElementById('carType').value = '';
            document.getElementById('transmission').value = '';
            document.getElementById('passengers').value = '0';
            document.getElementById('priceRange').value = '';
            document.getElementById('fuelType').value = '';
            
            // Resetear todos los filtros activos
            state.activeFilters = {
                carType: '',
                transmission: '',
                passengers: '',
                priceRange: '',
                fuelType: ''
            };
            
            filterCars();
        }

        // Filtrar autos según búsqueda
        function filterCars() {
            // Actualizar filtros activos
            state.activeFilters.carType = document.getElementById('carType').value;
            state.activeFilters.transmission = document.getElementById('transmission').value;
            state.activeFilters.passengers = document.getElementById('passengers').value;
            state.activeFilters.priceRange = document.getElementById('priceRange').value;
            state.activeFilters.fuelType = document.getElementById('fuelType').value;
            
            let filtered = [...cars];
            
            // Filtrar por tipo
            if (state.activeFilters.carType) {
                filtered = filtered.filter(car => car.type.toLowerCase() === state.activeFilters.carType.toLowerCase());
            }
            
            // Filtrar por transmisión
            if (state.activeFilters.transmission) {
                filtered = filtered.filter(car => car.transmission.toLowerCase() === state.activeFilters.transmission.toLowerCase());
            }
            
            // Filtrar por pasajeros
            if (state.activeFilters.passengers && state.activeFilters.passengers !== '0') {
                const minPassengers = parseInt(state.activeFilters.passengers);
                filtered = filtered.filter(car => car.passengers >= minPassengers);
            }
            
            // Filtrar por rango de precio
            if (state.activeFilters.priceRange) {
                if (state.activeFilters.priceRange === '0-50') {
                    filtered = filtered.filter(car => car.price <= 50);
                } else if (state.activeFilters.priceRange === '50-100') {
                    filtered = filtered.filter(car => car.price > 50 && car.price <= 100);
                } else if (state.activeFilters.priceRange === '100-150') {
                    filtered = filtered.filter(car => car.price > 100 && car.price <= 150);
                } else if (state.activeFilters.priceRange === '150-200') {
                    filtered = filtered.filter(car => car.price > 150);
                }
            }
            
            // Filtrar por tipo de combustible
            if (state.activeFilters.fuelType) {
                filtered = filtered.filter(car => car.fuel.toLowerCase() === state.activeFilters.fuelType.toLowerCase());
            }
            
            // Ordenar según selección
            const sortValue = sortBy.value;
            if (sortValue === 'price-low') {
                filtered.sort((a, b) => a.price - b.price);
            } else if (sortValue === 'price-high') {
                filtered.sort((a, b) => b.price - a.price);
            } else if (sortValue === 'name') {
                filtered.sort((a, b) => a.name.localeCompare(b.name));
            } else {
                // Recomendados: destacados primero, luego por precio
                filtered.sort((a, b) => {
                    if (a.featured && !b.featured) return -1;
                    if (!a.featured && b.featured) return 1;
                    return a.price - b.price;
                });
            }
            
            state.filteredCars = filtered;
            updateFilterTags();
            renderCars();
        }

        // Mostrar modal de reserva
        function showReservationModal(carId) {
            const car = cars.find(c => c.id === carId);
            if (!car) return;
            
            state.currentCarForReservation = car;
            
            document.getElementById('reservationCarImg').src = car.image;
            document.getElementById('reservationCarName').textContent = car.name;
            document.getElementById('reservationCarPrice').textContent = `$${car.price}/día`;
            
            // Establecer fechas por defecto
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            const nextWeek = new Date(today);
            nextWeek.setDate(nextWeek.getDate() + 7);
            
            // Formatear fechas para input date
            const formatDate = (date) => {
                return date.toISOString().split('T')[0];
            };
            
            document.getElementById('reservationPickupDate').valueAsDate = tomorrow;
            document.getElementById('reservationReturnDate').valueAsDate = nextWeek;
            
            // Calcular resumen inicial
            calculateReservationSummary();
            
            reservationModal.style.display = 'flex';
        }

        // Calcular resumen de reserva
        function calculateReservationSummary() {
            const pickupDate = new Date(document.getElementById('reservationPickupDate').value);
            const returnDate = new Date(document.getElementById('reservationReturnDate').value);
            
            // Validar fechas
            if (isNaN(pickupDate.getTime()) || isNaN(returnDate.getTime())) {
                return;
            }
            
            // Calcular días
            const timeDiff = returnDate.getTime() - pickupDate.getTime();
            const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
            
            if (daysDiff < 1) {
                showNotification('La fecha de devolución debe ser posterior a la fecha de recogida.', 'warning');
                return;
            }
            
            // Calcular tarifas
            const dailyRate = state.currentCarForReservation.price;
            const subtotal = dailyRate * daysDiff;
            
            // Calcular extras
            let extrasTotal = 0;
            if (document.getElementById('extraInsurance').checked) extrasTotal += 15 * daysDiff;
            if (document.getElementById('extraGPS').checked) extrasTotal += 10 * daysDiff;
            if (document.getElementById('extraChildSeat').checked) extrasTotal += 8 * daysDiff;
            
            // Calcular impuestos
            const taxes = (subtotal + extrasTotal) * 0.10;
            const total = subtotal + extrasTotal + taxes;
            
            // Actualizar resumen
            document.getElementById('summaryDailyRate').textContent = `$${dailyRate}`;
            document.getElementById('summaryDays').textContent = daysDiff;
            document.getElementById('summarySubtotal').textContent = `$${subtotal}`;
            document.getElementById('summaryExtras').textContent = `$${extrasTotal}`;
            document.getElementById('summaryTaxes').textContent = `$${taxes.toFixed(2)}`;
            document.getElementById('summaryTotal').textContent = `$${total.toFixed(2)}`;
        }

        // Mostrar detalles del auto
        function showCarDetail(carId) {
            const car = cars.find(c => c.id === carId);
            if (!car) return;
            
            state.currentCarForDetail = car;
            
            document.getElementById('detailCarName').textContent = car.name;
            document.getElementById('detailCarType').textContent = car.type;
            document.getElementById('detailCarPrice').textContent = `$${car.price}/día`;
            document.getElementById('detailCarImage').src = car.image;
            document.getElementById('detailCarDescription').textContent = car.description;
            
            // Especificaciones
            const specsContainer = document.getElementById('detailCarSpecs');
            specsContainer.innerHTML = `
                <div class="spec-item">
                    <i class="fas fa-users"></i>
                    <div>
                        <div style="font-weight: 600;">Pasajeros</div>
                        <div>${car.passengers}</div>
                    </div>
                </div>
                <div class="spec-item">
                    <i class="fas fa-cog"></i>
                    <div>
                        <div style="font-weight: 600;">Transmisión</div>
                        <div>${car.transmission}</div>
                    </div>
                </div>
                <div class="spec-item">
                    <i class="fas fa-gas-pump"></i>
                    <div>
                        <div style="font-weight: 600;">Combustible</div>
                        <div>${car.fuel}</div>
                    </div>
                </div>
                <div class="spec-item">
                    <i class="fas fa-door-closed"></i>
                    <div>
                        <div style="font-weight: 600;">Puertas</div>
                        <div>${car.doors}</div>
                    </div>
                </div>
                <div class="spec-item">
                    <i class="fas fa-suitcase"></i>
                    <div>
                        <div style="font-weight: 600;">Equipaje</div>
                        <div>${car.luggage} maletas</div>
                    </div>
                </div>
            `;
            
            carDetailModal.style.display = 'flex';
        }

        // Cambiar página
        function navigateTo(page) {
            // Ocultar todas las páginas
            homePage.classList.add('hidden');
            contactPage.classList.add('hidden');
            
            // Mostrar página seleccionada
            if (page === 'home') {
                homePage.classList.remove('hidden');
                state.currentPage = 'home';
            } else if (page === 'contact') {
                contactPage.classList.remove('hidden');
                state.currentPage = 'contact';
            }
            
            updateActiveNav();
        }

        // Actualizar navegación activa
        function updateActiveNav() {
            // Remover clase activa de todos
            homeNav.classList.remove('active-page');
            carsNav.classList.remove('active-page');
            contactNav.classList.remove('active-page');
            
            // Agregar clase activa según página actual
            if (state.currentPage === 'home') {
                homeNav.classList.add('active-page');
                carsNav.classList.add('active-page');
            } else if (state.currentPage === 'contact') {
                contactNav.classList.add('active-page');
            }
        }

        // Mostrar notificación
        function showNotification(message, type = 'info') {
            // Eliminar notificación anterior si existe
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }
            
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : type === 'error' ? 'times-circle' : 'info-circle'}"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            
            // Remover notificación después de 5 segundos
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.style.animation = 'slideInRight 0.5s reverse';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 500);
                }
            }, 5000);
        }

        // Funciones de autenticación
        function login(email, password) {
            // En una aplicación real, aquí se haría una petición al servidor
            // Para este ejemplo, simulamos un login exitoso con credenciales de prueba
            if (email === "demo@rentacar.com" && password === "123456") {
                state.currentUser = {
                    name: "Usuario Demo",
                    email: email,
                    phone: "1234567890"
                };
            } else {
                // Verificar si el usuario está registrado en localStorage
                const users = JSON.parse(localStorage.getItem('rentacar_users')) || [];
                const user = users.find(u => u.email === email && u.password === password);
                
                if (!user) {
                    showNotification('Credenciales incorrectas. Intenta nuevamente.', 'warning');
                    return false;
                }
                
                state.currentUser = {
                    name: user.name,
                    email: user.email,
                    phone: user.phone
                };
            }
            
            state.isLoggedIn = true;
            localStorage.setItem('rentacar_currentUser', JSON.stringify(state.currentUser));
            showNotification(`¡Bienvenido, ${state.currentUser.name.split(' ')[0]}!`, 'success');
            renderAuthUI();
            renderCars();
            return true;
        }

        function register(name, email, phone, password, confirmPassword) {
            // Validaciones básicas
            if (password !== confirmPassword) {
                showNotification('Las contraseñas no coinciden.', 'warning');
                return false;
            }
            
            if (password.length < 6) {
                showNotification('La contraseña debe tener al menos 6 caracteres.', 'warning');
                return false;
            }
            
            // Verificar si el usuario ya existe
            const users = JSON.parse(localStorage.getItem('rentacar_users')) || [];
            const userExists = users.some(u => u.email === email);
            
            if (userExists) {
                showNotification('Ya existe una cuenta con este correo electrónico.', 'warning');
                return false;
            }
            
            // Guardar nuevo usuario
            const newUser = { name, email, phone, password };
            users.push(newUser);
            localStorage.setItem('rentacar_users', JSON.stringify(users));
            
            // Iniciar sesión automáticamente
            state.currentUser = { name, email, phone };
            state.isLoggedIn = true;
            localStorage.setItem('rentacar_currentUser', JSON.stringify(state.currentUser));
            
            showNotification(`¡Cuenta creada exitosamente, ${name.split(' ')[0]}!`, 'success');
            renderAuthUI();
            renderCars();
            return true;
        }

        function logout() {
            state.isLoggedIn = false;
            state.currentUser = null;
            localStorage.removeItem('rentacar_currentUser');
            showNotification('Has cerrado sesión correctamente.', 'success');
            renderAuthUI();
            renderCars();
        }

        // Configurar event listeners
        function setupEventListeners() {
            // Navegación
            homeNav.addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo('home');
                window.scrollTo(0, 0);
            });
            
            carsNav.addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo('home');
                window.scrollTo(0, document.querySelector('.section-title').offsetTop - 100);
            });
            
            contactNav.addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo('contact');
                window.scrollTo(0, 0);
            });
            
            homeLink.addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo('home');
                window.scrollTo(0, 0);
            });
            
            // Footer links
            document.getElementById('footerHome').addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo('home');
                window.scrollTo(0, 0);
            });
            
            document.getElementById('footerCars').addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo('home');
                window.scrollTo(0, document.querySelector('.section-title').offsetTop - 100);
            });
            
            document.getElementById('footerContact').addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo('contact');
                window.scrollTo(0, 0);
            });
            
            document.getElementById('footerLogin').addEventListener('click', (e) => {
                e.preventDefault();
                if (!state.isLoggedIn) {
                    loginModal.style.display = 'flex';
                }
            });
            
            // Búsqueda y filtros
            searchForm.addEventListener('submit', (e) => {
                e.preventDefault();
                filterCars();
                showNotification(`${state.filteredCars.length} autos encontrados`, 'success');
            });
            
            toggleFilters.addEventListener('click', () => {
                advancedFilters.classList.toggle('active');
                toggleFilters.innerHTML = advancedFilters.classList.contains('active') 
                    ? '<i class="fas fa-sliders-h"></i> Ocultar filtros avanzados'
                    : '<i class="fas fa-sliders-h"></i> Filtros avanzados';
            });
            
            sortBy.addEventListener('change', filterCars);
            
            // Aplicar filtros automáticamente cuando cambian
            document.getElementById('carType').addEventListener('change', filterCars);
            document.getElementById('transmission').addEventListener('change', filterCars);
            document.getElementById('passengers').addEventListener('change', filterCars);
            document.getElementById('priceRange').addEventListener('change', filterCars);
            document.getElementById('fuelType').addEventListener('change', filterCars);
            
            // Modales - Cerrar
            document.getElementById('closeLogin').addEventListener('click', () => {
                loginModal.style.display = 'none';
            });
            
            document.getElementById('closeRegister').addEventListener('click', () => {
                registerModal.style.display = 'none';
            });
            
            document.getElementById('closeReservation').addEventListener('click', () => {
                reservationModal.style.display = 'none';
            });
            
            document.getElementById('closeCarDetail').addEventListener('click', () => {
                carDetailModal.style.display = 'none';
            });
            
            document.getElementById('detailCloseBtn').addEventListener('click', () => {
                carDetailModal.style.display = 'none';
            });
            
            // Cerrar modales al hacer clic fuera
            window.addEventListener('click', (e) => {
                if (e.target === loginModal) loginModal.style.display = 'none';
                if (e.target === registerModal) registerModal.style.display = 'none';
                if (e.target === reservationModal) reservationModal.style.display = 'none';
                if (e.target === carDetailModal) carDetailModal.style.display = 'none';
            });
            
            // Navegación entre formularios de autenticación
            document.getElementById('goToRegister').addEventListener('click', (e) => {
                e.preventDefault();
                loginModal.style.display = 'none';
                registerModal.style.display = 'flex';
            });
            
            document.getElementById('goToLogin').addEventListener('click', (e) => {
                e.preventDefault();
                registerModal.style.display = 'none';
                loginModal.style.display = 'flex';
            });
            
            // Formularios
            document.getElementById('loginForm').addEventListener('submit', (e) => {
                e.preventDefault();
                const email = document.getElementById('loginEmail').value;
                const password = document.getElementById('loginPassword').value;
                
                if (login(email, password)) {
                    loginModal.style.display = 'none';
                    document.getElementById('loginForm').reset();
                }
            });
            
            document.getElementById('registerForm').addEventListener('submit', (e) => {
                e.preventDefault();
                const name = document.getElementById('registerName').value;
                const email = document.getElementById('registerEmail').value;
                const phone = document.getElementById('registerPhone').value;
                const password = document.getElementById('registerPassword').value;
                const confirmPassword = document.getElementById('registerConfirmPassword').value;
                
                if (register(name, email, phone, password, confirmPassword)) {
                    registerModal.style.display = 'none';
                    document.getElementById('registerForm').reset();
                }
            });
            
            document.getElementById('contactForm').addEventListener('submit', (e) => {
                e.preventDefault();
                showNotification('Mensaje enviado correctamente. Te contactaremos pronto.', 'success');
                document.getElementById('contactForm').reset();
            });
            
            document.getElementById('reservationForm').addEventListener('submit', (e) => {
                e.preventDefault();
                reservationModal.style.display = 'none';
                showNotification(`¡Reserva confirmada para el ${state.currentCarForReservation.name}! Recibirás un correo con los detalles.`, 'success');
            });
            
            // Eventos para calcular resumen de reserva
            document.getElementById('reservationPickupDate').addEventListener('change', calculateReservationSummary);
            document.getElementById('reservationReturnDate').addEventListener('change', calculateReservationSummary);
            document.getElementById('extraInsurance').addEventListener('change', calculateReservationSummary);
            document.getElementById('extraGPS').addEventListener('change', calculateReservationSummary);
            document.getElementById('extraChildSeat').addEventListener('change', calculateReservationSummary);
            
            // Botón de reserva en detalles
            document.getElementById('detailRentBtn').addEventListener('click', () => {
                carDetailModal.style.display = 'none';
                if (!state.isLoggedIn) {
                    showNotification('Por favor, inicia sesión para reservar un auto.', 'warning');
                    loginModal.style.display = 'flex';
                } else if (state.currentCarForDetail) {
                    showReservationModal(state.currentCarForDetail.id);
                }
            });
        }

        // Inicializar la aplicación
        init();
    </script>
</body>
</html>