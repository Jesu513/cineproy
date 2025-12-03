<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reportes de Cine</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            color: #2c3e50;
        }
        
        /* Efecto de partículas animadas */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 90%;
        }
        
        .header h1 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 2.2rem;
        }
        
        .header p {
            color: #7f8c8d;
            font-size: 1.1rem;
        }
        
        .button-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 800px;
            width: 90%;
        }
        
        .report-button {
            background-color: rgba(255, 255, 255, 0.95);
            color: #2c3e50;
            border: none;
            padding: 20px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.4s ease;
            text-align: center;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 140px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .report-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(52, 152, 219, 0.1) 0%, rgba(155, 89, 182, 0.1) 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .report-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            color: #3498db;
        }
        
        .report-button:hover::before {
            opacity: 1;
        }
        
        .report-button i {
            font-size: 36px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }
        
        .report-button:hover i {
            transform: scale(1.1);
        }
        
        .report-button span {
            display: block;
            margin-top: 8px;
            font-size: 14px;
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        .report-button:hover span {
            opacity: 1;
        }
        
        /* Colores específicos para cada botón */
        .report-button:nth-child(1) { border-top: 4px solid #3498db; }
        .report-button:nth-child(2) { border-top: 4px solid #2ecc71; }
        .report-button:nth-child(3) { border-top: 4px solid #e74c3c; }
        .report-button:nth-child(4) { border-top: 4px solid #f39c12; }
        
        @media (max-width: 768px) {
            .button-container {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
        }
        
        /* Animación de flotación para el header */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .header {
            animation: float 6s ease-in-out infinite;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Canvas para las partículas -->
    <div id="particles-js"></div>
    
    <div class="header">
        <h1>Sistema de Reportes de Cine</h1>
        <p>Seleccione el tipo de reporte que desea generar</p>
    </div>

    <div class="button-container">
        <a href="reportecine.php" class="report-button">
            <i class="fas fa-film"></i>
            Reporte Completo de Películas
            <span>ID, Nombre, Año, Estudio y Actores</span>
        </a>

        <a href="reportepeli.php" class="report-button">
            <i class="fas fa-list-ol"></i>
            Reporte Básico de Películas
            <span>ID, Nombre y Año solamente</span>
        </a>

        <a href="reporteactores.php" class="report-button">
            <i class="fas fa-users"></i>
            Reporte de Actores
            <span>Listado completo de actores</span>
        </a>

        <a href="reporteestudios.php" class="report-button">
            <i class="fas fa-building"></i>
            Reporte de Estudios
            <span>Estudios y sus películas</span>
        </a>
    </div>

    <!-- Script para las partículas animadas -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Inicialización del efecto de partículas
        document.addEventListener('DOMContentLoaded', function() {
            particlesJS('particles-js', {
                "particles": {
                    "number": {
                        "value": 60,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#3498db"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        }
                    },
                    "opacity": {
                        "value": 0.3,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 2,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#3498db",
                        "opacity": 0.2,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 1,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": true,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 0.5
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        });
    </script>
</body>
</html>
