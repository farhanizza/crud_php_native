<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            background-color: #333;
            color: #fff;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            margin-left: 20px;
        }

        .navbar-toggle {
            display: none;
            cursor: pointer;
            padding: 10px;
        }

        .navbar-toggle span {
            display: block;
            height: 3px;
            width: 25px;
            background-color: #fff;
            margin: 5px 0;
        }

        .navbar-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .navbar-menu li {
            margin: 0 10px;
        }

        .navbar-menu a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .navbar-menu a:hover {
            color: #f00;
        }

        @media (max-width: 768px) {
            .navbar-container {
                max-width: 90%;
                margin: 0 auto;
            }

            .navbar-toggle {
                display: block;
            }

            .navbar-menu {
                display: none;
                background-color: red;
                position: absolute;
                top: 60px;
                left: 0;
                right: 0;
                z-index: 999;
            }

            .navbar-menu ul {
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .navbar-menu li {
                margin: 10px 0;
            }

            .navbar-menu a {
                font-size: 20px;
            }

            .show {
                display: block;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="brand-logo">TEST UNTUK USER</a>
            <div class="navbar-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="navbar-menu">
                <ul>
                    <li><a href="#">Menu 1</a></li>
                    <li><a href="#">Menu 2</a></li>
                    <li><a href="#">Menu 3</a></li>
                    <li><a href="#">Menu 4</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <script>
        const toggleBtn = document.querySelector('.navbar-toggle');
        const menu = document.querySelector('.navbar-menu');

        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('show');
        });
    </script>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 60px;
        }

        .navbar-brand a {
            color: #fff;
            font-weight: bold;
            font-size: 24px;
            text-decoration: none;
        }

        .navbar-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar-item {
            margin: 0 10px;
        }

        .navbar-item a {
            color: #fff;
            text-decoration: none;
        }

        .navbar-toggle {
            display: none;
        }

        @media screen and (max-width: 768px) {
            .navbar-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-menu {
                display: none;
                flex-direction: column;
                padding: 0 20px;
                background-color: #333;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                z-index: 1;
            }

            .navbar-item {
                margin: 10px 0;
            }

            .navbar-toggle {
                display: block;
            }

            .navbar-toggle-button {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                height: 24px;
                width: 30px;
                border: none;
                background-color: transparent;
                cursor: pointer;
            }

            .navbar-toggle-button span {
                display: block;
                height: 2px;
                background-color: #fff;
                transition: all 0.2s ease-out;
            }

            .navbar-toggle-button.active span:nth-child(1) {
                transform: translateY(6px) rotate(45deg);
            }

            .navbar-toggle-button.active span:nth-child(2) {
                opacity: 0;
            }

            .navbar-toggle-button.active span:nth-child(3) {
                transform: translateY(-6px) rotate(-45deg);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <a href="#">Logo</a>
            </div>
            <ul class="navbar-menu">
                <li class="navbar-item"><a href="#">Menu 1</a></li>
                <li class="navbar-item"><a href="#">Menu 2</a></li>
                <li class="navbar-item"><a href="#">Menu 3</a></li>
            </ul>
            <div class="navbar-toggle">
                <button id="navbar-toggle-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>
    <script>
        const navbarToggleButton = document.getElementById('navbar-toggle-button');
        const navbarMenu = document.querySelector('.navbar-menu');

        navbarToggleButton.addEventListener('click', () => {
            navbarToggleButton.classList.toggle('active');
            navbarMenu.classList.toggle('active');
        });
    </script>
</body>

</html> -->