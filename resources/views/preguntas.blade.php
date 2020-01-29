@extends('layouts.app')
<style>
	.box{
		height: 2.2em;
		padding: .2em;
		margin-top: 0;
	}
	h5{
		font-weight: bold;
	}
</style>
@section('content')
<script>	
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>



	<div class="color-cut center">
		<h3 class="white-text center-align box">Preguntas y Respuestas</h3><br>
	</div>
	<div class="container">
			<div class="container">
				<ul class="collapsible">
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Cómo registrarme?</strong></h5></div>
					    <div class="collapsible-body">
					      	<p>En la url de <a href="{{url('register')}}">registro</a> vienen dos campos <strong>Código</strong> y <strong>Nip</strong></p>
					      	<div class="center">
								<img src="{{ asset('img/preguntas1.jpg') }}" class="center" alt="imagen 1" width="200">
					      	</div>

					      <p>ingresa con los datos que ingresas a SIIAU, espera unos segundos si todo marcha bien aparecerá tu <strong>nombre</strong> y el <strong>centro universitario</strong>, en caso contrario te marca un error(puedes ver cuales son los <a href="">posibles errores</a></p>
					      <div class="center">
					      	<img src="{{asset('img/preguntas2.png')}}" alt="" width="200">
					      </div>
							<p>Presiona en siguiente, rellena los campos (correo y contraseña)</p>
							<div class="center">
								<img src="{{asset('img/preguntas3.png')}}" alt="" width="200">
							</div>
							<p>Si ves esta pantalla, ya estas registrado</p>
							<div class="center">
								<img src="{{asset('img/preguntas4.png')}}" alt="" width="200">
							</div>
						</div>		
				    </li>

				    <li>
				      <div class="collapsible-header"><h5><strong>¿Es gratis?</strong></h5></div>
					    <div class="collapsible-body">
					     El uso de la plataforma es gratis, a los vendedores no se les cobrara dinero, sin embargo se le pedirá que done uno de sus alimentos para el programa  “comida a un universitario”. Para el mantenimiento del servidor se pedirán donaciones.
						</div>		
				    </li>
					 <li>
				      <div class="collapsible-header"><h5><strong>¿Qué es el programa "comida a un universitario"?</strong></h5></div>
				      <div class="collapsible-body"><span>El programa pretende que de forma aleatoria algunos alumnos del cutonala puedan recibir un día a la semana comida gratis, la idea es que los vendedores donen uno de sus alimentos a esta noble causa ¹

¹.La plataforma no cobra dinero a los vendedores, el único requisito que le pedimos a nuestros vendedores es que done un alimento para los alumnos del Cutonala, de igual manera cualquier persona está invitada a participar en este programa</span></div>
				    </li>
		
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Cómo vender?</strong></h5></div>
				      <div class="collapsible-body">
				      	<p>Ve a la página para <a href="{{ url('seller/create') }}">crear un perfil de vendedor</a>.
				      		<div class="center">
				      			<img src="{{asset('img/preguntas5.png')}}" alt="" width="200">
				      		</div>
				      	<p>Debes rellenar todos los campos y aceptar los términos y condiciones.</p>
						<p>Para obtener más detalles de cómo rellenar los campos checa <a href="#buen_perfil">¿Cómo hacer una buena publicación?</a></p>
						<p>Después de enviar tu solicitud te llegara un correo, tú perfil entrara a un filtro, si usted cumple con los campos tendrá una respuesta positiva, y se le enviara otro correo donde aparece su estado.</p>
						<div class="center">
				      			<img src="{{asset('img/preguntas14.jpeg')}}" alt="" width="200">
				      	</div>
						<strong>En tu perfil se muestra el estado</strong>
						<div class="center">
				      			<img src="{{asset('img/preguntas11.png')}}" alt="" width="200">
				      	</div>
						<h5>Ojo</h5><p><strong>“tu perfil“</strong>es el perfil de usuario,no vaya a confundir perfil de usuario con perfil de vendedor.
						cada usuario puede tener uno o más <strong>perfiles de vendedor</strong></p>
					</p></div>
				    </li>
				     <li>
				      <div class="collapsible-header" id="buen_perfil"><h5><strong>¿Cómo hacer un buen perfil de vendedor?</strong></h5></div>
				      <div class="collapsible-body">
				      	<p>A continuación se muestran algunas recomendaciones para poder hacer un buen perfil.</p>
				      	<div class="center">
				      		<img src="{{ asset('img/preguntas5.png') }}" alt="pregunta 5" width="200">
				      	</div>
				      	<strong>Nombre:</strong><p>Genera un nombre llamativo y corto de unas 3 palabras como máximo, trata de no poner palabras hirientes ya que eso se penaliza.</p>
				      	<strong>Foto:</strong><p>Pon una foto ya sea el logotipo de tu negocio o tu saliendo en la foto para la que gente te conozca, se recomienda una imagen de 1200 x 900, imágenes muy pequeñas no se verán muy bien.toma la foto horizontalmente</p>
				      	<div class="center">
				      		<img src="{{ asset('img/preguntas8.png')}}" alt="" width="200">
				      	</div>
				      	<strong>Describe el perfil:</strong><p> Aquí puedes poner la historia de tu negocio, redes sociales o algún anuncio o condiciones que quieras poner, se recomienda que el texto sea menor de 240 caracteres, puedes agregar listas, links, poner texto en negrita o en itálica.</p>
				      	<strong>Categoría:</strong><p> Es importante poder clasificar tu perfil para que los usuarios puedan conocerte, si vendes diferentes productos con diferentes categorías, céntrate en el producto en el que vendas más por ejemplo el maya su principal negocio es la <strong>comida</strong>, pero también vende aguas o postres.</p>
				      	<p><strong>Recuerda es importante clasificarlo bien, si vendes comida no vayas a poner que vendes accesorios u otras cosas, esto se penaliza.</strong></p>
				      	<strong>Numero de celular:</strong><p> Ingresa tu número de celular, trata de que ese número este asociado a Whatsapp ya que de ese número puedes recibir mensajes y llamadas.</p>
				      	<strong>Salón o lugar de venta:</strong><p> Ingresa el lugar donde vendes, trata de resumirlo lo más posible 
						ejemplos: A102, en las bancas del b, ambulante, etc.</p>
						<p><strong>Nota: Trata de cambiar los datos cada que cambies de lugar.</strong></p>
				      	<strong>Horario:</strong><p> Pon el horario en el que vas a trabajar, puede ser que hay días que los horarios no son los mismo, te pedimos de favor que cada día actualices tus horarios a conforme vendas, o si ese día no vendes cambia el estado a no disponible.</p>
				      	<strong> Acepta los términos y condiciones:</strong><p> Es importante que el vendedor este de acuerdo con los términos  y condiciones para que no haya problemas en un futuro, es de vital importancia que los vendedores lean los <a href="{{url('terminos')}}">terminos</a>.</p>
				      	<h5>Nota: Si sigues estas recomendaciones es más probable de que se publique tu perfil.</h5>

				      </div>
				    </li>
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Cómo funciona la plataforma?</strong></h5></div>
				      <div class="collapsible-body"><span>La plataforma funciona como un intermediario entre los vendedores y los estudiantes,la plataforma muestra los datos y su objetivo principal es poder mostrarte los perfiles de los vendedores que estan disponibles.</span></div>

				    </li>
				   
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Qué datos se guardan?</strong></h5></div>
				      <div class="collapsible-body"><span>En la plataforma se recopilan varios datos,se guarda el <strong>código</strong> para checar que no se repitan dos usuarios con el mismo código,se guarda el <strong>centro universitario</strong> para no tener gente ajena del centro,se guarda la <strong>carrera</strong> para tener un censo,datos como el <strong class="red-text">nip</strong> u otros datos <strong class="green-text">no se guardan</strong>.ningun administrador puede entrar a su cuenta,la contraseña que usted ingrese se <strong class="green-text">encripta</strong>.</span></div>
				    </li>
				   <!-- <li>
				      <div class="collapsible-header"><h5><strong>¿Es seguro?</strong></h5></div>
				      <div class="collapsible-body"><span></span></div>
				    </li>-->
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Qué puedo vender?</strong></h5></div>
				      <div class="collapsible-body"><p>La plataforma está enfocada de mostrar productos de comida que estén disponibles, se pueden vender accesorios y otros tipos de productos, queda prohibido la venta de alcohol o productos que puedan hacer daño, una de las condiciones es que el producto se puede obtener en el centro universitario o esté cerca del centro universitario. Negocios ajenos a esto no podrán vender.</p></div>
				    </li>
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Tiene límite?</strong></h5></div>
				      <div class="collapsible-body"><p>Si, se recomienda que no pase de los 35 productos, para esto tenemos algunas recomendaciones</p>
				      	<p>
						Si tienes productos con el mismo precio y son de la misma categoría puedes agruparlos, un ejemplo pueden ser en los dulces puedes poner “dulces de 1$ “y la descripción del producto puedes agregar los nombres de esos productos, trate que en la imagen aparezcan esos productos.</p>
						 Ejemplo:
						 <div class="center">
						 	<img src="{{asset('img/preguntas6.png')}}" alt="" width="200">
						 </div>
						 <div class="center">
						 	<img src="{{asset('img/preguntas7.png')}}" alt="" width="200">
						 </div>
						</div>
				    </li>
				   
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Cómo subir un producto?</strong></h5></div>
				      <div class="collapsible-body">
				      	<strong>Nombre:</strong><p>Ingresa el nombre tu producto o promoción, corto de unas 3 palabras como máximo, trata de no poner palabras hirientes ya que eso se penaliza.</p>
				      	<strong>Foto:</strong>
				      	<p> trata de enfocar el producto o los productos, no utilices márgenes o cosas que puedan distraer al usuario, usa un fondo blanco o limpio para enfocar los productos, la foto es</p>
				      	<p><strong>importante que la tomes horizontalmente</strong></p>
						<div class="center">
							<img src="{{asset('img/preguntas8.png')}}" alt="" width="200">
						</div>
						<br>
						<strong>Descripción:</strong>
						<p>Aquí puedes poner los ingredientes que contiene un producto o los productos que están en una “ promoción o agrupación” puedes poner las condiciones o lo que tenga que ver con tu producto.</p>
						<strong>Categoría:</strong><p>Selecciona la categoría en la que está tu producto.</p>
 						<strong>Precio:</strong><p>Ingresa la cantidad  que pagara el usuario por el producto.</p>
				</div>
				    </li>
				    <li>
				      <div class="collapsible-header"><h5><strong>¿Qué significa la línea de colores en los productos de un vendedor?</strong></h5></div>
				      <div class="collapsible-body">
				      	<p>Significa la disponibilidad</p>
						<div class="center">
							<img src="{{ asset('img/preguntas9.png') }}" alt="" width="200">
						</div>
						<p class="center-align"><strong >No Disponible</strong></p>
						<div class="center">
							<img src="{{ asset('img/preguntas10.png') }}" alt="" width="200">
						</div>
						<p class="center-align"><strong >Disponible</strong></p>
				      </div>	
				    </li>
				  </ul>
				
		</div>
	</div>
@endsection