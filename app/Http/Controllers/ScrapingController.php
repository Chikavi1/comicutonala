<?php

namespace App\Http\Controllers;
use Goutte\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ScrapingController extends Controller
{
    public function __construct()
    {
    	 \Session::put('codigo','');
    	 \Session::put('carrera','');
    	 \Session::put('centro','');
    }

 	public function example(Request $request)
 	{
 		try { 
 	 	$codigo = $request->codigo;
 	 	$nip = $request->nip;

		 $codigoexiste = DB::table('users')
        ->select('code')
        ->where('code', '=', $codigo)
        ->get()->count();

        if($codigoexiste){
        	return response()->json(['message'=> 'error','descripcion'=>'Codigo ya Utilizado']);
        }



 		$client = new Client();
 		$crawler = $client->request('GET', 'http://siiauescolar.siiau.udg.mx/wus/gupprincipal.forma_inicio');

 		$form = $crawler->selectButton('Ingresar')->form();
		$crawler = $client->submit($form, array('p_codigo_c' => $codigo, 'p_clave_c' => $nip));


		//nuevas lineas
		$crawler = $client->request('GET', 'http://siiauescolar.siiau.udg.mx/wal/gupprincipal.contenido');
		$href = $crawler->filter('.liso font a')->last()->attr('href');
		$pPidm = explode("BANSATURN.SPPIMSS.UNIDAD_MEDICA_C?pPidm=",$href);
		$pPidm = $pPidm[1];
		//nuevas lineas


		//$crawler = $client->submit($form, array('p_pidm_n' => '1087215'));
		$crawler = $client->request('GET', 'gupmenug.menu_sistema?p_pidm_n='.$pPidm); //nueva linea
		$nombre = $crawler->filter("tr td ");

		$i=0;
		foreach ($nombre as $nombre ) {
			 $i++;
		}
		$CONPREPA = 8;
		if($i == $CONPREPA){

			$link = $crawler->selectLink('ALUMNOS')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('ACADÉMICA')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('Constancia')->link();
			$crawler = $client->click($link);

			$majrp = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="majrp"]')->last()->attr('value');
			$cicloap = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="cicloap"]')->last()->attr('value');
			$form = $crawler->selectButton('Consultar')->form();

			$crawler = $client->submit($form, array('pidmp' => $pPidm, 'majrp' => $majrp,'cicloap'=> $cicloap));
			$nombre = $crawler->filter("table[width='100%'] td[colspan='5'] font ")->text();

			$minusculas = strtolower($nombre);
			$CamelCase = ucwords($minusculas);
			$cantidad = str_word_count($CamelCase);

			$palabrasSeparadas = explode(" ", $nombre);

			$nombre = $palabrasSeparadas[0]." ".$palabrasSeparadas[$cantidad-2];
			$codigo = $crawler->filter("table[width='100%'] td[bgcolor='white'] font ")->text();
			$carrera = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->text();
			$sede = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->eq(1)->text();
			\Session::put('codigo',$codigo);
     	    \Session::put('carrera',$carrera);
	   	    \Session::put('centro',$sede);

	   	    if($sede != "CENTRO UNIVERSITARIO DE TONALA"){
        	return response()->json(['message'=> 'error','descripcion'=>'No eres alumno de este centro']);
        	}


			return response()->json(['message' => 'satisfactorio','data' => 'con prepa','nombre' => $nombre,
 	 			'codigo' => $codigo,
 	 			'carrera' => $carrera,
 	 			'centro' => $sede]);
		}else{
			$link = $crawler->selectLink('ALUMNOS')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('ACADÉMICA')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('Constancia')->link();
			$crawler = $client->click($link);

			$nombre = $crawler->filter("table[width='100%'] td[colspan='5'] font ")->text();
			$minusculas = strtolower($nombre);
			$CamelCase = ucwords($minusculas);
			$cantidad = str_word_count($CamelCase);
			$palabrasSeparadas = explode(" ", $nombre);
			$nombre = $palabrasSeparadas[0]." ".$palabrasSeparadas[$cantidad-2];

			$codigo = $crawler->filter("table[width='100%'] td[bgcolor='white'] font ")->text();
			$carrera = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->text();
			$sede = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->eq(1)->text();
			\Session::put('codigo',$codigo);
     	    \Session::put('carrera',$carrera);
	   	    \Session::put('centro',$sede);
			return response()->json(['message' => 'satisfactorio','data' => 'sin prepa','nombre' => $nombre,
 	 			'codigo' => $codigo,
 	 			'carrera' => $carrera,
 	 			'centro' => $sede]);
		}

					// $link = $crawler->selectLink('ALUMNOS')->link();
					// $crawler = $client->click($link);
					// $link = $crawler->selectLink('ACADÉMICA')->link();
					// $crawler = $client->click($link);
					// $link = $crawler->selectLink('Constancia')->link();
					// $crawler = $client->click($link);
					// //dd($crawler);
					//  $majrp = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="majrp"]')->last()->attr('value');
			  //        $cicloap = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="cicloap"]')->last()->attr('value');
					//  $form = $crawler->selectButton('Consultar')->form();

					//  $crawler = $client->submit($form, array('pidmp' => $pPidm, 'majrp' => $majrp,'cicloap'=> $cicloap));

					//  $nombre = $crawler->filter("table[width='100%'] td[colspan='5'] font ")->text();


					//  $minusculas = strtolower($nombre);
					//  $CamelCase = ucwords($minusculas);
					//  $cantidad = str_word_count($CamelCase);

					//  $palabrasSeparadas = explode(" ", $nombre);
					//  $nombre = $palabrasSeparadas[0]." ".$palabrasSeparadas[$cantidad-2];

					//  $codigo = $crawler->filter("table[width='100%'] td[bgcolor='white'] font ")->text();
					//  $carrera = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->text();
					//  $sede = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->eq(1)->text();
					 
			 	// 		\Session::put('codigo',$codigo);
			  //   	    \Session::put('carrera',$carrera);
			  //   	    \Session::put('centro',$sede);

			 	// 		return response()->json(
			 	// 			[
			 	// 			'message'=> 'satisfactorio',
			 	// 			'nombre' => $nombre,
			 	// 			'codigo' => $codigo,
			 	// 			'carrera' => $carrera,
			 	// 			'centro' => $sede,
			 	// 		]); 
					

 	}catch(\InvalidArgumentException $e) { 
 		return response()->json(['message'=> 'error','descripcion' => 'codigo o nip incorrectos']);  
		return ;
	 }

 	}   











public function authchikavis(Request $request)
{

	return 'correcto';
}








public function authchikavi(Request $request)
 	{
 		try { 
 	 	$codigo = $request->codigo;
 	 	$nip = $request->nip;


 		$client = new Client();
 		$crawler = $client->request('GET', 'http://siiauescolar.siiau.udg.mx/wus/gupprincipal.forma_inicio');
 		$form = $crawler->selectButton('Ingresar')->form();
		$crawler = $client->submit($form, array('p_codigo_c' => $codigo, 'p_clave_c' => $nip));

		//nuevas lineas
		$crawler = $client->request('GET', 'http://siiauescolar.siiau.udg.mx/wal/gupprincipal.contenido');
		$href = $crawler->filter('.liso font a')->last()->attr('href');
		$pPidm = explode("BANSATURN.SPPIMSS.UNIDAD_MEDICA_C?pPidm=",$href);
		$pPidm = $pPidm[1];
		//nuevas lineas
		//$crawler = $client->submit($form, array('p_pidm_n' => '1087215'));
		$crawler = $client->request('GET', 'gupmenug.menu_sistema?p_pidm_n='.$pPidm); //nueva linea
		$nombre = $crawler->filter("tr td ");
		$i=0;
		foreach ($nombre as $nombre ) {
			 $i++;
		}
		$CONPREPA = 8;
		if($i == $CONPREPA){
			$link = $crawler->selectLink('ALUMNOS')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('ACADÉMICA')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('Constancia')->link();
			$crawler = $client->click($link);
			$majrp = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="majrp"]')->last()->attr('value');
			$cicloap = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="cicloap"]')->last()->attr('value');
			$form = $crawler->selectButton('Consultar')->form();
			$crawler = $client->submit($form, array('pidmp' => $pPidm, 'majrp' => $majrp,'cicloap'=> $cicloap));
			$nombre = $crawler->filter("table[width='100%'] td[colspan='5'] font ")->text();
			$minusculas = strtolower($nombre);
			$CamelCase = ucwords($minusculas);
			$cantidad = str_word_count($CamelCase);
			$palabrasSeparadas = explode(" ", $nombre);
			$nombre = $palabrasSeparadas[0]." ".$palabrasSeparadas[$cantidad-2];
			$codigo = $crawler->filter("table[width='100%'] td[bgcolor='white'] font ")->text();
			$carrera = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->text();
			$sede = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->eq(1)->text();

	   	    if($sede != "CENTRO UNIVERSITARIO DE TONALA"){
        		return 'incorrecto';
        	}
        	
			return $nombre;
		}else{
			$link = $crawler->selectLink('ALUMNOS')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('ACADÉMICA')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('Constancia')->link();
			$crawler = $client->click($link);

			$nombre = $crawler->filter("table[width='100%'] td[colspan='5'] font ")->text();
			$minusculas = strtolower($nombre);
			$CamelCase = ucwords($minusculas);
			$cantidad = str_word_count($CamelCase);
			$palabrasSeparadas = explode(" ", $nombre);
			$nombre = $palabrasSeparadas[0]." ".$palabrasSeparadas[$cantidad-2];

			$codigo = $crawler->filter("table[width='100%'] td[bgcolor='white'] font ")->text();
			$carrera = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->text();
			$sede = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->eq(1)->text();
			 if($sede != "CENTRO UNIVERSITARIO DE TONALA"){
        		return 'incorrecto';
        	}
			return $nombre;
		}

 	}catch(\InvalidArgumentException $e) { 
        return 'incorrecto';
		return ;
	 }

 	}   







































 	public function prueba(){
 		$client = new Client();
 		$crawler = $client->request('GET', 'http://siiauescolar.siiau.udg.mx/wus/gupprincipal.forma_inicio');
 		//dd($crawler);
 		$form = $crawler->selectButton('Ingresar')->form();
		$crawler = $client->submit($form, array('p_codigo_c' => '217727036', 'p_clave_c' => '16021999'));
		//dd($crawler);

		$crawler = $client->request('GET', 'http://siiauescolar.siiau.udg.mx/wal/gupprincipal.contenido');
		//$mensaje =  $crawler->filter('center h2.tituloPag')->text();
		//dd($mensaje);
		$href = $crawler->filter('.liso font a')->last()->attr('href');
		$pPidm = explode("BANSATURN.SPPIMSS.UNIDAD_MEDICA_C?pPidm=",$href);
		$pPidm = $pPidm[1];
		//nuevas lineas


		//$crawler = $client->submit($form, array('p_pidm_n' => '1087215'));
		$crawler = $client->request('GET', 'gupmenug.menu_sistema?p_pidm_n='.$pPidm); //nueva linea
		$nombre = $crawler->filter("tr td ");

		$i=0;
		foreach ($nombre as $nombre ) {
			 $i++;
		}
		$CONPREPA = 8;
		if($i == $CONPREPA){

//			print "eres estudiante de prepa e uni"."<br>";

			$link = $crawler->selectLink('ALUMNOS')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('ACADÉMICA')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('Constancia')->link();
			$crawler = $client->click($link);

			$majrp = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="majrp"]')->last()->attr('value');
			$cicloap = $crawler->filter('form[action="sglhist.constancia_dc"] input[name="cicloap"]')->last()->attr('value');
			$form = $crawler->selectButton('Consultar')->form();

			$crawler = $client->submit($form, array('pidmp' => $pPidm, 'majrp' => $majrp,'cicloap'=> $cicloap));
			$nombre = $crawler->filter("table[width='100%'] td[colspan='5'] font ")->text();

			$minusculas = strtolower($nombre);
			$CamelCase = ucwords($minusculas);
			$cantidad = str_word_count($CamelCase);

			$palabrasSeparadas = explode(" ", $nombre);

			$nombre = $palabrasSeparadas[0]." ".$palabrasSeparadas[$cantidad-2];
			print($nombre."<br>");
			$codigo = $crawler->filter("table[width='100%'] td[bgcolor='white'] font ")->text();
			print($codigo."<br>");
			$carrera = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->text();
			print($carrera."<br>");
			$sede = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->eq(1)->text();
			print($sede."<br>");


		}else{
//			print "solo eres estudiante de uni"."<br>";

			$link = $crawler->selectLink('ALUMNOS')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('ACADÉMICA')->link();
			$crawler = $client->click($link);
			$link = $crawler->selectLink('Constancia')->link();
			$crawler = $client->click($link);
			
			$nombre = $crawler->filter("table[width='100%'] td[colspan='5'] font ")->text();
			print($nombre."<br>");
			$codigo = $crawler->filter("table[width='100%'] td[bgcolor='white'] font ")->text();
			print($codigo."<br>");
			$carrera = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->text();
			print($carrera."<br>");
			$sede = $crawler->filter("table[width='100%'] td[colspan='7'] font ")->eq(1)->text();
			print($sede."<br>");

		}
	} 
 	
}
