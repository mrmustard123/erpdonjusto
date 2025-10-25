<?php
session_start();
require_once 'model/model.php';

// Crear instancia del modelo
$model = new model();

// Obtener datos del reporte
$v_harvests = $model->report_harvests();


 
    if(!isset($_GET['flow'])){
      $_SESSION['report_harvests']= 0;  
    }
    
    
    if($_GET['flow']=='previous'){
     $_SESSION['report_harvests'] = $_SESSION['report_harvests']+1;   
    }
    
    if($_GET['flow']=='following'){
        
        $_SESSION['report_harvests'] = $_SESSION['report_harvests']-1;     
    }
    
    
    
    $flow = $_SESSION['report_harvests'];


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Cosecha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .info {
            background-color: #e8f4f8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total {
            font-weight: bold;
            background-color: #4CAF50;
            color: white;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .stat-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            flex: 1;
            margin: 0 10px;
            border-left: 4px solid #4CAF50;
        }
        .stat-box h3 {
            margin: 0;
            color: #666;
            font-size: 14px;
        }
        .stat-box p {
            margin: 10px 0 0 0;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        @media print {
            .btn-back {
                display: none;
            }
            body {
                background-color: white;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <a href="index.php?action=home" class="btn-back">Inicio</a>  
        
        <h1>🍯 Reporte de Cosecha de Miel</h1>
        
        <?php if ($v_harvests && count($v_harvests) > 0): ?>
            <?php 
            $total_kg = 0;
            
            // Calcular totales
            foreach($v_harvests as $harvest) {
                $total_kg += $harvest['KG'];
            }
            
            $promedio_kg = $total_kg / count($v_harvests);
            ?>
            
            <div class="stats">
                <div class="stat-box">
                    <h3>Total de Cosechas</h3>
                    <p><?php echo count($v_harvests); ?></p>
                </div>
                <div class="stat-box">
                    <h3>Total Cosechado</h3>
                    <p><?php echo number_format($total_kg, 2, ',', '.'); ?> kg</p>
                </div>
                <div class="stat-box">
                    <h3>Promedio por Cosecha</h3>
                    <p><?php echo number_format($promedio_kg, 2, ',', '.'); ?> kg</p>
                </div>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>KG</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($v_harvests as $harvest): ?>
                        <tr>
                            <td><?php echo date('d/m/Y H:i', strtotime($harvest['mov_date'])); ?></td>
                            <td><?php echo number_format($harvest['KG'], 2, ',', '.'); ?> kg</td>
                            <td><?php echo htmlspecialchars($harvest['comments']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="total">
                        <td><strong>TOTAL</strong></td>
                        <td><strong><?php echo number_format($total_kg, 2, ',', '.'); ?> kg</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <div class="no-data">
                <p>No se encontraron registros de cosecha.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>