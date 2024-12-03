<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WM Inventory - Efficient Inventory Management</title>
   <!-- REMOVER EL CSS PARA OTRA CARPETA -->
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
                    <!-- AQUI ESTA EL BOTON DE LOGIN -->
                    <a href="#features">Login</a>
                    <a href="#contact">Contact</a>
                </div>                      
            </nav>
        </div>
    </header>                                       

    <main>
        <section class="hero">
            <div class="container">
                <h1>Efficient Inventory Management for Your Business</h1>
                <p>Optimize your inventory, reduce costs, and boost productivity with WM Inventory</p>
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <h2>Features Main</h2>
                <div class="feature-grid">
                    <div class="feature">
                        <h3>Real-Time Control</h3>
                        <p>Monitor your inventory in real time from any device.</p>
                    </div>
                    <div class="feature">
                        <h3>Order Management</h3>
                        <p>Automate the ordering and restocking process.</p>
                    </div>
                    <div class="feature">
                        <h3>Detailed Reports</h3>
                        <p>Generate custom reports to make informed decisions.</p>
                    </div>
                    <div class="feature">
                        <h3>Easy Integration</h3>
                        <p>Easily integrate with your existing accounting and sales systems.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact">
        <div class="container">
            <p>&copy; 2024 WM Inventory. All rights reserved.</p>
            <p>Contact: info@wminventory.com | Tel: (123) 456-7890</p>
        </div>
    </footer>
</body>
</html>