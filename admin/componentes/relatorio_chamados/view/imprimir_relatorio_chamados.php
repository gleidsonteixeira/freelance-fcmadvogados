<?php 
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$pagina ='<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald:400,700">
    </head>
    <body style="font-family: \'Open Sans\';background-color: #ededed;">
        <div id="relatorio-chamados-componente">
            <div id="chamados" style="display: table;width: 90%;margin: 0 auto;border-radius: 5px;background-color: white;padding:16px;">
                <h2 style="font-size: 28px;margin-bottom: 0;">Relatorio de Chamados</h2>
                <h6 style="font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;margin-top: 0;color:#666;">de 00/00/0000 ate 00/00/0000</h6>
                
                <ul style="list-style:none;overflow: hidden;padding: 0;">
                    <li style="float: left;border: 1px solid #dedede;border-radius: 5px;padding: 10px;min-width: 100px;margin-right: 10px;">
                        <h6 style="font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;margin: 0;">chamados abertos</h6>
                        <h2 style="font-size: 22px;margin: 0;color:#666;">0</h2>
                    </li>
                    <li style="float: left;border: 1px solid #dedede;border-radius: 5px;padding: 10px;min-width: 100px;margin-right: 10px;">
                        <h6 style="font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;margin: 0;">chamados encerrados</h6>
                        <h2 style="font-size: 22px;margin: 0;color:#666;">0</h2>
                    </li>
                    <li style="float: left;border: 1px solid #dedede;border-radius: 5px;padding: 10px;min-width: 100px;margin-right: 10px;">
                        <h6 style="font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;margin: 0;">atendentes operando</h6>
                        <h2 style="font-size: 22px;margin: 0;color:#666;">0</h2>
                    </li>
                    <li style="float: left;border: 1px solid #dedede;border-radius: 5px;padding: 10px;min-width: 100px;margin-right: 10px;">
                        <h6 style="font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;margin: 0;">mic</h6>
                        <h2 style="font-size: 22px;margin: 0;color:#666;">0</h2>
                    </li>
                </ul>
                
                <ul style="display: table;width: 100%;padding: 0;margin-bottom: 0;margin-top: 26px;">
                    <li style="display: table-row;">
                        <h6 style="display: table-cell;font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;width:50px;text-align: center;">cod</h6>
                        <h6 style="display: table-cell;font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;">assunto</h6>
                        <h6 style="display: table-cell;font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;width:150px;text-align: center;">empresa</h6>
                        <h6 style="display: table-cell;font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;width:100px;text-align: center;">data</h6>
                        <h6 style="display: table-cell;font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;width:200px;text-align: center;">setor</h6>
                        <h6 style="display: table-cell;font-size: 12px;text-transform: uppercase;letter-spacing: 1px;font-weight: bold;width:120px;text-align: center;">prioridade</h6>
                    </li>
                </ul>
                <ul style="display: table;width: 100%;padding: 0;margin: 0;">
                    <li style="display: table-row;">
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width: 50px;text-align: center;">#01</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;">Titulo do chamado</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:150px;text-align: center;">Objetive TI</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:100px;text-align: center;">00/00/0000</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:200px;text-align: center;">Fabrica de software</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:120px;text-align: center;">Baixa</h6>
                    </li>
                    <li style="display: table-row;background-color: rgba(0,0,0,.15);">
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width: 50px;text-align: center;">#01</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;">Titulo do chamado</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:150px;text-align: center;">Objetive TI</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:100px;text-align: center;">00/00/0000</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:200px;text-align: center;">Fabrica de software</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:120px;text-align: center;">Baixa</h6>
                    </li>
                    <li style="display: table-row;">
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width: 50px;text-align: center;">#01</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;">Titulo do chamado</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:150px;text-align: center;">Objetive TI</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:100px;text-align: center;">00/00/0000</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:200px;text-align: center;">Fabrica de software</h6>
                        <h6 style="display: table-cell;font-size: 12px;font-weight: bold;color: #666;line-height:40px;width:120px;text-align: center;">Baixa</h6>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>';

$mpdf = new \Mpdf\Mpdf();

// $mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML("olá mundo");
// $mpdf->WriteHTML($pagina);
$mpdf->Output();
exit;
?>