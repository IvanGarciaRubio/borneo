<?php
//use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

require __DIR__ . './vendor/autoload.php';

/*$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();

$container->set('uploads', __DIR__ . '/uploads');*/

include 'classes.php';


/**
 * Included class from classes, you can call it with
 * $class_name=new CLASS_NAME();
 * 
 */
//AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addBodyParsingMiddleware();

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);

$app->setBasePath("/borneo/index.php");

/*---------------------------------------LISTADO DE PROPIEDADES-------------------------------------------------------------------------*/
$app->get('/owned/search', function (Request $request, Response $response,$args){
    $variable= new test();

    $all=$variable->GetAll();

    $response->getBody()->write(json_encode($all));
    return  $response;

});

/*---------------------------------------LISTADO DE PROPIEDADES POR ID------------------------------------------------------------------*/
$app->get('/owned/search/{id}', function (Request $request, Response $response,$args){
    $variable= new test();
    $id = $args['id'];

    $owned_id=$variable->IdPropiedad($id);

    $response->getBody()->write(json_encode($owned_id));
    return  $response;

});


/*---------------------------------------AÑADIR PROPIEDADES----------------------------------------------------------------------------*/
$app->post('/owned/add', function (Request $request, Response $response,$args) {
    $variable= new test();
    $data = $request->getParsedBody();
    $nombre = $data["nombre"];
    $descripcion = $data["descripcion"];
    $personas = $data["personas"];
    $acceso = $data["access"];
    $salasReuniones = $data["salas_reuniones"];
    $recepcion = $data["reception"];
    $eventosNetwork = $data["eventos_network"];
    $terraza = $data["terraza"];
    $cafeRelax = $data["cafe_relax"];
    $seguridad = $data["seguridad"];
    $limpieza = $data["limpieza"];
    $certificado = $data["cer_energetica"];
    $paqueteria = $data["paqueteria"];
    $parking = $data["parking"];
    $wifi = $data["wifi"];
    $coworking = $data["coworking"];
    $tarifa = $data["tarifa"];
    $tipoPropiedad = $data["tipo_propiedad"];
    $imagen = $data["imagen"];
    $direccion = $data["direccion"];
    $ciudad = $data["ciudad"];
    $comunidadAutonoma = $data["comunidad_autonoma"];
    $telefono = $data["telefono"];
    
    $add=$variable->AddPropiedades($nombre, $descripcion, $personas, $acceso, $salasReuniones, $recepcion, $eventosNetwork,$terraza, 
    $cafeRelax, $seguridad, $limpieza, $certificado, $paqueteria,$parking, $wifi, $coworking, $tarifa, $tipoPropiedad, $imagen, 
    $direccion, $ciudad, $comunidadAutonoma, $telefono);
    $response->getBody()->write(json_encode($add));
    return $response;
});

/*---------------------------------MODIFICAR PROPIEDADES--------------------------------------------------------------------------*/
$app->post('/owned/update/{id}', function (Request $request, Response $response,$args) {
    $data = (array)$request->getParsedBody();
    $nombre = $data["nombre"];
    $descripcion = $data["descripcion"];
    $personas = $data["personas"];
    $acceso = $data["access"];
    $salasReuniones = $data["salas_reuniones"];
    $recepcion = $data["reception"];
    $eventosNetwork = $data["eventos_network"];
    $terraza = $data["terraza"];
    $cafeRelax = $data["cafe_relax"];
    $seguridad = $data["seguridad"];
    $limpieza = $data["limpieza"];
    $certificado = $data["cer_energetica"];
    $paqueteria = $data["paqueteria"];
    $parking = $data["parking"];
    $wifi = $data["wifi"];
    $coworking = $data["coworking"];
    $tarifa = $data["tarifa"];
    $tipoPropiedad = $data["tipo_propiedad"];
    $imagen = $data["imagen"];
    $direccion = $data["direccion"];
    $ciudad = $data["ciudad"];
    $comunidadAutonoma = $data["comunidad_autonoma"];
    $telefono = $data["telefono"];
    $id = $args['id'];
    
    $variable= new test();
    $add=$variable->ModifyPropiedades($nombre, $descripcion, $personas, $acceso, $salasReuniones, $recepcion, $eventosNetwork,$terraza, 
    $cafeRelax, $seguridad, $limpieza, $certificado, $paqueteria,$parking, $wifi, $coworking, $tarifa, $tipoPropiedad, $imagen, 
    $direccion, $ciudad, $comunidadAutonoma, $telefono, $id);

    $response->getBody()->write(json_encode($add));
    return $response;
});

/*---------------------------------------BORRADO DE PROPIEDADES------------------------------------------------------------------*/
$app->get('/owned/delete/{id}', function (Request $request, Response $response,$args){
    $variable= new test();
    $id = $args['id'];

    $delete_id=$variable->DeletePropiedades($id);

    $response->getBody()->write(json_encode($delete_id));
    return  $response;

});

/*----------------------------------------RECOGER FORM CONTACTO-----------------------------------------------------------------*/
$app->get('/contact/search', function (Request $request, Response $response,$args){
    $variable= new test();

    $all=$variable->GetContact();

    $response->getBody()->write(json_encode($all));
    return  $response;

});

/*---------------------------------------LISTADO DE PROPIEDADES POR ID------------------------------------------------------------------*/
$app->get('/contact/search/{id}', function (Request $request, Response $response,$args){
    $variable= new test();
    $id = $args['id'];

    $contact_id=$variable->IdContact($id);

    $response->getBody()->write(json_encode($contact_id));
    return  $response;

});

/*---------------------------------------BORRADO DE PROPIEDADES------------------------------------------------------------------*/
$app->get('/contact/delete/{id}', function (Request $request, Response $response,$args){
    $variable= new test();
    $id = $args['id'];

    $delete_id=$variable->DeleteContact($id);

    $response->getBody()->write(json_encode($delete_id));
    return  $response;

});

/*---------------------------------------AÑADIR CONTACTOS-----------------------------------------------------------------------*/
$app->post('/contact/add', function (Request $request, Response $response,$args) {
    $variable= new test();
    $data = $request->getParsedBody();
    $nombre = $data["nombre"];
    $email = $data["email"];
    $asunto = $data["asunto"];
    $mensaje = $data["mensaje"];
    $fecha = $data["fecha"];
    
    $add=$variable->AddContacto($nombre, $email, $asunto, $mensaje, $fecha);
    $response->getBody()->write(json_encode($add));
    return $response;
});

$app->run();