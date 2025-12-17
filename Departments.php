<?php
require_once 'guard.php'; // That's it! No extra function call needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Departments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common-styles.css">
    
    <!-- Internal CSS -->
    <style>
        .table-container {
            margin-top: 20px;
            border: 2px solid transparent;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            overflow-x: auto;
            border-image: linear-gradient(45deg, var(--primary-medium), var(--secondary-medium)) 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            color: white;
            padding: 16px;
            text-align: left;
            font-weight: 600;
            border-right: 1px solid rgba(255,255,255,0.2);
        }

        th:last-child {
            border-right: none;
        }

        td {
            padding: 16px;
            border: 1px solid rgba(0,0,0,0.1);
        }

        tr:hover td {
            background: linear-gradient(90deg, rgba(232,245,233,0.9), rgba(200,230,201,0.9));
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        tr {
            transition: transform 0.3s ease;
        }

        footer {
            color: #ddd;
            text-align: center;
            padding: 25px;
            font-size: 0.95em;
            box-shadow: 0 -4px 15px rgba(0,0,0,0.3);
            position: relative;
            overflow: hidden;
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

        /* Apply Gradient Classes */
        header {
            background: linear-gradient(90deg, var(--primary-medium) 0%, var(--primary-dark) 100%);
        }

        main {
            background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(255,255,255,0.85));
        }

        .table-container {
            background: linear-gradient(145deg, rgba(255,255,255,0.9), rgba(245,245,245,0.8));
        }

        th {
            background: linear-gradient(90deg, var(--primary-medium), var(--primary-dark));
        }

        td {
            background: linear-gradient(to right, rgba(255,255,255,0.9), rgba(255,255,255,0.7));
        }

        tr:nth-child(even) td {
            background: linear-gradient(to right, rgba(242,242,242,0.9), rgba(242,242,242,0.7));
        }

        @media (max-width: 768px) {
            main {
                margin: 10px;
                padding: 20px 15px;
            }
            
            header h1 {
                font-size: 1.8em;
            }
            
            th, td {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <header class="gradient-header">
        <h1>Departments of St. Teresa's School</h1> 
    </header>
    <hr>
    <p style="text-align: center;">
        <img src="STS.jpg" alt="St. Teresa's School Berhampore" width="125" height="125">
    </p>
    <main class="gradient-card">
        <section>
            <h2>Our Departments</h2>
            <div class="table-container">
                <table>
                    <tr>
                        <th class="gradient-table-header">Physics</th>
                        <td class="gradient-table-row">Mr. Bishal Saha</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">Chemistry</th>
                        <td class="gradient-table-row">Mr. Soumajeet Sarkar</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">Biology</th>
                        <td class="gradient-table-row">Mr. Pijush Mazumdar</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">Mathematics</th>
                        <td class="gradient-table-row-alt">Mr. Bishal Saha</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">English Lit. & Lang.</th>
                        <td class="gradient-table-row-alt">Mrs. Soumi Nath</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">Geography</th>
                        <td class="gradient-table-row">Mrs. Emily Ghosh</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">History & Civics</th>
                        <td class="gradient-table-row">Mrs. Vibha Das</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">P.E./Games</th>
                        <td class="gradient-table-row-alt">Mr. Prakash</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">SUPW</th>
                        <td class="gradient-table-row-alt">Mr. Sonimesh Baskey</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">Computer Science</th>
                        <td class="gradient-table-row">Mr. Soumajeet Sarkar</td>
                    </tr>
                    <tr>
                        <th class="gradient-table-header">Languages</th>
                        <td class="gradient-table-row">Mrs. Shreya Chandra<br>Mrs. Ferdous Ara Begam</td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
    <footer class="gradient-footer">
        <p>&copy; 2015 St. Teresa's School. All rights reserved.</p>
    </footer>  

    <script src="redirect.js"></script>
</body>
</html>




