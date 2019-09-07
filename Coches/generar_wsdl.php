<?php
require_once '../WSDLDocument/WSDLDocument.php';
require_once 'coches.php';

$wsdl = @new WSDLDocument("Coches", "http://localhost/Workspace/Servicios_Web/Coches/servicio_wsdl.php",
                            "http://localhost/Workspace/Servicios_Web/Coches");
echo $wsdl->saveXML();
?>