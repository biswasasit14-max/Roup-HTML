<?php
// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Test if guard.php has errors
require_once 'guard.php';
echo "Guard loaded successfully!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common-styles.css">
    
    <style>
        p {
            font-size: 1.1em;
            line-height: 1.8;
        }

        nav {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background: linear-gradient(145deg, rgba(255,255,255,0.7), rgba(255,255,255,0.5));
            border-radius: 12px;
        }

        nav p {
            margin-bottom: 15px;
            font-size: 1.2em;
            color: var(--primary-dark);
            font-weight: 600;
        }

        nav a {
            text-decoration: none;
            color: var(--primary-dark);
            font-weight: 600;
            padding: 8px 16px;
            margin: 0 10px;
            border-radius: 25px;
            background: linear-gradient(to right, rgba(76, 175, 80, 0.1), rgba(33, 150, 243, 0.1));
            transition: all 0.3s ease;
            display: inline-block;
        }

        nav a:hover {
            color: white;
            background: linear-gradient(90deg, var(--primary-medium), var(--secondary-medium));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        footer {
            color: #ddd;
            text-align: center;
            padding: 25px;
            font-size: 0.95em;
            box-shadow: 0 -4px 15px rgba(0,0,0,0.3);
            position: relative;
            overflow: hidden;
            margin-top: auto;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-medium), var(--secondary-medium));
        }

        footer p {
            margin: 0;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        @media (max-width: 768px) {
            main {
                margin: 10px;
                padding: 20px 15px;
            }
            
            header h1 {
                font-size: 1.8em;
            }
            
            section {
                padding: 20px;
            }
            
            nav a {
                display: block;
                margin: 8px auto;
                width: 80%;
                max-width: 250px;
            }
        }
    </style>
</head>
<body>
    <header class="gradient-header">
        <h1>St. Teresa's School Berhampore</h1> 
    </header>
    <hr>
    <p style="text-align: center;">
        <img src="STS.jpg" alt="St. Teresa's School Berhampore" width="125" height="125">
    </p>
    <main class="gradient-card">
        <section class="gradient-section">
            <h2>Introduction</h2>
            <p style="text-align: justify;">
                <b>
                 St. Teresa's School, Berhampore, a Catholic English Medium Educational Institution for boys and girls, 
                 owned by Teresian Carmelite Sisters, was established in 2015.
                 It is a minority institution but provision is also made for the admission of children irrespective of caste and creed.
                 The Teresian Carmelites are working in India and abroad through educational centres, 
                 orphanages and other charitable and promotional works.
                </b>
            </p>
        </section>
        
        <nav>
            <p>Explore More About Our School</p>
            <a href="dashboard.html">Dashboard</a>
            <a href="About Us.php">About Us</a>
            <a href="Departments.php">Departments</a>
            <a href="logout.php">Logout</a>
        </nav>
    </main>
    <footer class="gradient-footer">
        <p>&copy; 2015 St. Teresa's School. All rights reserved.</p>
    </footer>

    <script src="redirect.js"></script>
</body>
</html>






