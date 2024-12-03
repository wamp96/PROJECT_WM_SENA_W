<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WM Inventory - Gestión de Inventario Eficiente</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 1rem 0;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }
        .hero {
            background-color: #34495e;
            color: #fff;
            text-align: center;
            padding: 4rem 0;
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .cta-button {
            display: inline-block;
            background-color: #e74c3c;
            color: #fff;
            padding: 0.8rem 2rem;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .cta-button:hover {
            background-color: #c0392b;
        }
        .features {
            padding: 4rem 0;
            background-color: #f4f4f4;
        }
        .features h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .feature {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .feature h3 {
            margin-bottom: 1rem;
        }
        footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .hero h1 {
                font-size: 2rem;
            }
            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">WM Inventory</div>
                <div class="nav-links">
                    <a href="#features">Características</a>
                    <a href="#contact">Contacto</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Gestión de Inventario Eficiente para tu Negocio</h1>
                <p>Optimiza tu inventario, reduce costos y aumenta la productividad con WM Inventory</p>
                <a href="#contact" class="cta-button">Solicitar Demo</a>
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <h2>Características Principales</h2>
                <div class="feature-grid">
                    <div class="feature">
                        <h3>Control en Tiempo Real</h3>
                        <p>Monitorea tu inventario en tiempo real desde cualquier dispositivo.</p>
                    </div>
                    <div class="feature">
                        <h3>Gestión de Pedidos</h3>
                        <p>Automatiza el proceso de pedidos y reabastecimiento.</p>
                    </div>
                    <div class="feature">
                        <h3>Informes Detallados</h3>
                        <p>Genera informes personalizados para tomar decisiones informadas.</p>
                    </div>
                    <div class="feature">
                        <h3>Integración Fácil</h3>
                        <p>Integra fácilmente con tus sistemas existentes de contabilidad y ventas.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact">
        <div class="container">
            <p>&copy; 2024 WM Inventory. Todos los derechos reservados.</p>
            <p>Contacto: info@wminventory.com | Tel: (123) 456-7890</p>
        </div>
    </footer>
</body>
</html>