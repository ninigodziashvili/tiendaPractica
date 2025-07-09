/*
template name: Politicas de privacidad
*/
<?php
get_header();
?>
    <style>
       /* Estilo base */
body {
   color: #333;
   box-sizing: border-box;
}
/* ------------------------------------------------------------------------------------------------------------------------------------------- */
.cookie-banner {
  position: fixed;
  bottom: 0;
  width: 100%;
  background: #fff;
  color: #333;
  padding: 15px;
  box-shadow: 0 -2px 5px rgba(0,0,0,0.2);
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 9999;
}

.cookie-banner p {
  margin: 0;
  flex: 1;
}

.cookie-banner button {
  margin-left: 10px;
  padding: 8px 12px;
  cursor: pointer;
  border: none;
  background-color: #007BFF;
  color: white;
  border-radius: 4px;
}

.cookie-banner button:hover {
  background-color: #0056b3;
}


/* Ajustes para el contenido principal */
.Politica {
  margin: 2em;
  padding: 1em;
}
.politica_privacidad{
    text-decoration: underline;
}

/* Estilo para encabezados */
h1, h2, h3, h4 {
  color: #333;
  text-align: center;
  margin-top: 1.2em;
  margin-bottom: 0.5em;
}

/* Párrafos generales */
.parrafo-privacidad {
  font-size: 1rem;
  
}

/* Listas */
ul {
  padding-left: 1.5em;
}


/* Estilo responsive */
@media (max-width: 768px) {
  .politica {
    margin: 0.5em;
    padding: 0.5em;
  }

  h1 {
    font-size: 1.5rem;
  }

  h2, h3 {
    font-size: 1.2rem;
  }

  h4 {
    font-size: 1rem;
  }

  .parrafo-privacidad {
    font-size: 0.95rem;
  }
}

@media (max-width: 480px) {
  .politica {
    margin: 0.8em;
    padding: 0.5em;
  }

  h1 {
    font-size: 1.5rem;
  }

  h2, h3 {
    font-size: 1.2rem;
  }

  h4 {
    font-size: 1rem;
  }

  .parrafo-privacidad {
    font-size: 0.9rem;
  }
}

    </style>
</head>
<body>
    <header class="cookies">
        <div id="cookie-banner" class="cookie-banner">
  <p>Este sitio utiliza cookies para mejorar tu experiencia.</p>
  <button id="accept-cookies">Aceptar</button>
  <button id="reject-cookies">Rechazar</button>
</div>

    </header>
   
    <main class="Politica">
        <h1 class="politica_privacidad">Política de Privacidad</h1>
    <h3 class="Actualizacion">Última actualización: [08/07/2025]</h3>
        <p class="parrafo-privacidad">En <strong>Susanita Urban</strong>, nos comprometemos a proteger tu privacidad y garantizar la seguridad de tus datos personales. Esta Política de Privacidad explica cómo recopilamos, utilizamos y protegemos tu información cuando visitas nuestro sitio web o realizas una compra.</p>

        <i><p>Condiciones de venta</p></i>
        <i><p>Aviso legal y política datos</p></i>
        <i><p>Política de Cookies</p></i>

    <h3 class="titulos"> 1.Responsable del tratamiento</h3>
    <h3 class="titulos">Susanita Urban</h3>

        <p class="parrafo-privacidad">Correo electrónico: <i><a href="">susanitaurban@gmail.com</a></i></p>
        <p class="parrafo-privacidad">Dirección: <i>Juan II Kalea,5, 01003 /Vitoria-Gasteiz, Araba</i></p>

    <h3 class="Actualizacion">2. Datos personales que recopilamos</h3>
        <p class="parrafo-privacidad">Podemos recopilar y tratar los siguientes datos personales:</p>
        <ul>
            <li>Nombre y apellidos</li>
            <li>Dirección de correo electrónico</li>
            <li>Dirección postal y datos de envío</li>
            <li>Número de teléfono</li>
            <li>Información de pago (a través de plataformas seguras de terceros)</li>
            <li>Historial de compras</li>
            <li>Datos de navegación (cookies, IP, tipo de navegador, etc.)</li>
        </ul>
    <div class="table-tratamiento">
    <h3 class="Actualizacion">3. Finalidades del tratamiento y base legal</h3>
    <h3 class="Actualizacion">Finalidad</h3>
            <p class="parrafo-privacidad">Procesar tus pedidos y pagos</p>
            <p class="parrafo-privacidad">Envío de actualizaciones sobre tu pedido</p>
            <p class="parrafo-privacidad">Atención al cliente y resolución de incidencias</p>
            <p class="parrafo-privacidad">Envío de promociones y boletines (si te suscribes)</p>
            <p class="parrafo-privacidad">Mejorar la experiencia del usuario y analizar el tráfico</p>
            <p class="parrafo-privacidad">Cumplimiento de obligaciones legales (fiscales, contables, etc.)</p>
    </div> 
    <div class="table-tratamiento">  
    <h3 class="Actualizacion">Base legal (art. 6 RGPD)</h3>
        <p class="parrafo-privacidad">Cumplimiento de un contrato (Art. 6(1)(b))</p>
        <p class="parrafo-privacidad">Interés legítimo (Art. 6(1)(f))</p>
        <p class="parrafo-privacidad">Interés legítimo (Art. 6(1)(f))</p>
        <p class="parrafo-privacidad">Consentimiento (Art. 6(1)(a))</p>
        <p class="parrafo-privacidad">Interés legítimo / Consentimiento (según el tipo de cookies)</p>
        <p class="parrafo-privacidad">Obligación legal (Art. 6(1)(c))</p>
    </div>

    <h3 class="Actualizacion">4. Conservación de los datos</h3>
        <p class="parrafo-privacidad">Conservaremos tus datos personales durante el tiempo necesario para cumplir con las finalidades indicadas, y conforme a las obligaciones legales aplicables. Por ejemplo:</p>
        <ul>
            <li>Datos de pedidos: hasta 6 años (por obligaciones fiscales y contables)</li>
            <li>Datos de marketing: hasta que retires tu consentimiento</li>
        </ul>
    
    <h3 class="Actualizacion">5. Compartición de datos</h3>
        <p class="parrafo-privacidad">Podemos compartir tus datos con:</p>
        <ul>
            <li>Proveedores de servicios de pago (como Stripe o PayPal)</li>
            <li>Servicios de mensajería y transporte</li>
            <li>Plataformas de email marketing (si te has suscrito al boletín)</li>
            <li>Proveedores tecnológicos y de alojamiento web</li>
            <li>Asesores fiscales y contables (cuando sea necesario legalmente)</li>
        </ul>
            <p class="parrafo-privacidad">Nunca venderemos tus datos personales a terceros.</p>

    <h3 class="Actualizacion">6. Tus derechos como usuario</h3>
            <p class="parrafo-privacidad">Procesa tus pedidos y pagos de una manera fácil</p>
            <ul>
                <li>Acceder a tus datos personales</li>
                <li>Rectificar los datos inexactos</li>
                <li>Solicitar la supresión de tus datos</li>
                <li>Oponerte al tratamiento en base al interés legítimo</li>
                <li>Solicitar la limitación del tratamiento</li>
                <li>Retirar tu consentimiento en cualquier momento</li>
                <li>Presentar una reclamación ante una autoridad de control (como la AEPD)</li>
            </ul>
            <p class="parrafo-privacidad">Para ejercer tus derechos, contáctanos en: <a href=""><i>susanitaurban2025@gmail.com</i></a></p>
    
    <h3 class="Actualizacion">7. Seguridad de tus datos</h3>
            <p class="parrafo-privacidad">Implementamos medidas técnicas y organizativas adecuadas para proteger tus datos frente a pérdida, acceso no autorizado, uso indebido o divulgación.</p>

    <h3 class="Actualizacion">8. Cookies</h3>
           <p class="parrafo-privacidad">Utilizamos cookies para mejorar tu experiencia, analizar el tráfico y personalizar contenido. Puedes gestionar tus preferencias a través de nuestra [Política de Cookies].</p> 

    <h3 class="Actualizacion">9. Modificaciones de esta política</h3>
            <p class="parrafo-privacidad">Podemos actualizar esta política ocasionalmente. Te recomendamos revisarla periódicamente. Te notificaremos cambios significativos a través del sitio web o por correo electrónico.</p>

    <h3 class="Actualizacion">10. Condiciones de venta</h3>
    <h4 class="Actualizacion">Como comprar:</h4>
            <p class="parrafo-privacidad">Comprar en Susanita Urban es muy sencillo e intuitivo. Si es la primera vez que entras en Susanita Urban y quieres realizar una compra te detallo los pasos, aunque si conoces otros comercios on-line, te parecerá bastante fácil.</p>
            <p class="parrafo-privacidad">Navega por la tienda echando un vistazo a los productos por las diferentes categorías: pulsa sobre las imágenes y los títulos para ver en detalle las características de cada uno.</p>

            <p class="parrafo-privacidad">A medida que encuentres artículos que te interesen puedes ir añadiendo a la cesta de la compra que aparece a la derecha de la pantalla. Es muy parecido a un supermercado en el que se llena el carrito de la compra con las cosas que queremos adquirir. Para añadir un producto al carrito basta con pinchar en <strong>«Encargar«</strong> y automáticamente se añade. Del mismo modo, puedes eliminar el producto añadido previamente en cualquier momento, ya que la inclusión en la cesta en este paso no presupone su consentimiento a la adquisición del producto. </p>

            <p class="parrafo-privacidad">Una vez que hayas terminado tu elección, sólo tendrás que pinchar en el icono <strong>«Finalizar compra«</strong> y seguir los pasos.</p>
            <p class="parrafo-privacidad">Si no estás registrado como cliente, en el proceso de compra lo podrás  hacer. Te pediré tus datos para el envío y de contacto, respetando en todo momento nuestra <strong>política de datos.</strong></p>

            <p class="parrafo-privacidad">Una vez finalizada la compra, recibirás en la dirección de correo electrónico que hayas facilitado, la <strong>confirmación</strong> de que el pedido se ha realizado, momento a partir del cuál trabajaré para que tu pedido te llegue a la dirección postal que has puesto.</p>

            <p class="parrafo-privacidad">Todas las compras que se realizan en mi tienda online <strong>Susanita Urban</strong> están sujetas a las condiciones generales de contratación expuestas en el presente documento. Las ventas celebradas son ventas a distancia reguladas por la legislación española vigente en la materia.</p>

    <h4 class="Actualizacion">Métodos de pago</h4>
            <ul>
                <li><h4 class="Actualizacion">Tarjeta de débito o crédito:</h4>El pago se realiza de forma rápida, cómoda y segura a través del Sistema correspondiente, quien procesa el pago y me notifica la realización de la operación. Yo nunca recibo los datos de la tarjeta.</li>

                <li><h4 class="Actualizacion">PayPal: </h4> El pago lo realizas a través de la plataforma de pago seguro por internet. Puedes pagar con tu tarjeta de crédito aunque no tengas una cuenta de PayPal creada.</li>

                <li><h4 class="Actualizacion">Bizum:</h4> Al número de teléfono: <i>+34 646752850 (Susana Pérez Gómez).</i> </li> 
            </ul>

    <h4 class="Actualizacion">Política de envíos</h4>
    <h4 class="Actualizacion">Formas y costes de envío:</h4>

                <p class="parrafo-privacidad">El envío se realiza cuando se ha efectuado y comprobado el pago, y su tiempo de entrega dependiendo de el tipo de producto y material seleccionado.</p>
                <p class="parrafo-privacidad"> El tiempo aproximado para la entrega de cada producto según el tamaño y las medidas solicitadas por el cliente, con un plazo aproximado <strong>3 semanas.</strong></p>

    <h4 class="Actualizacion">Plazos de entrega</h4>
                <ul>
                    <li>Artículos <strong>«en stock»:</strong> significa que están disponibles y se enviarán una vez recibido el pedido y comprobado el pago.</li>

                    <li>Artículos <strong>«disponibles para reserva»:</strong>  Significa que están casi terminados o te lo podemos fabricar, por eso te permitimos realizar la compra.</li>
                </ul>
                <p> class="parrafo-privacidad"> <strong> IMPORTANTE: </strong> Debes tener en cuenta el <strong>TIEMPO APROXIMADO DE FABRICACIÓN</strong> . Normalmente tardamos poco. Ya que dependerá del número de encargos en cada momento.  Aún así, se concretará con el cliente en cada caso.</p>

                <p class="parrafo-privacidad">Y ante cualquier duda, puedes consultarme directamente en el Whatsapp  de la web, teléfono en el <strong>646752850</strong> o por correo electrónico en <strong>susanitaurban@gmail.com </strong></p>

        <h4 class="Actualizacion">Cómo realizar devoluciones:</h4>
        <p class="parrafo-privacidad">En caso de que no estés satisfecho/a con el producto  recibido, puedes proceder a su devolución en un plazo máximo de 7 días, siempre que el artículo esté en perfecto estado y <strong> siendo los gastos de envío correspondientes por tu cuenta.</strong></p>

        <p class="parrafo-privacidad">Si adviertes pequeñas imperfecciones o variaciones de color en algunos artículos, es debido al uso de materiales naturales y al trabajo artesanal de cada artículo. No deben considerarse tara ni defectos.</p>

        <p class="parrafo-privacidad">Nunca olvides que nuestros productos son hechos a mano uno a uno, y aunque usemos los mismos patrones y los mismos hilos, todos son creaciones nuevas, con sus diferencias y peculiaridades. Y eso es lo que lo hace <strong>único.</strong></p>

         <h2 class="Actualizacion">Política de cookies</h2>

         <h3 class="Actualizacion">¿Qué son las cookies?</h3>
         <p class="parrafo-privacidad">Las cookies son pequeños archivos que se almacenan en el disco duro de su ordenador cuando visita un sitio web.</p>

         <h3 class="Actualizacion">¿Son las cookies seguras?</h3>
         <p class="parrafo-privacidad">Si. Las cookies son pequeños archivos de texto. No pueden ver en su ordenador ni tampoco leer ninguna información personal. Las cookies no pueden vehicular virus ni instalar nada dañino en su ordenador.</p>

         <h3 class="Actualizacion">¿Son usadas las cookies para rastrear información?</h3>
         <p class="parrafo-privacidad">Si. También las cookies se usan para rastrear cuanta gente está visitando una página web y qué áreas del sitio web están viendo. Esto nos permite tener una idea de cómo nuestros clientes están usando nuestro sitio web y nos ayuda a mejorar su uso.</p>

        <h3 class="Actualizacion">¿Qué tipo de cookies se usan?</h3>
        <p class="parrafo-privacidad">Usamos diferentes cookies; algunas son temporales y otras permanentes. Ninguna recoge información personal.</p>

        <h4 class="Actualizacion">Cookies temporales</h4>
             <p class="parrafo-privacidad">Estas cookies identifican que el usuario se está moviendo de página a página y termina cuando el usuario para de visitar estas varias páginas web. Se borra cuando el navegador se cierra.</p>

        <h4 class="Actualizacion">Cookies permanentes</h4>
             <p class="parrafo-privacidad"> Estas cookies nos ayudan a recordar tus preferencias/configuraciones cuando vuelves a visitar nuestro sitio web. Por eso, estas cookies siguen en tu ordenador aún después de que hayas terminado de visitar nuestro sitio web.</p>

        <h4 class="Actualizacion">Cookies de terceros: </h4>
             <p class="parrafo-privacidad">: Todas las cookies pertenecen a un propietario como a colaboradores publicitarios y pueden ser incluso establecidas por consentimiento externo de terceros respecto de nuestro sitio web, dentro de nuestro sitio web.</p>

       

    </main>
    <script>
        
  window.addEventListener('load', () => {
    const banner = document.getElementById('cookie-banner');
    const acceptBtn = document.getElementById('accept-cookies');
    const rejectBtn = document.getElementById('reject-cookies');

    if (!localStorage.getItem('cookieConsent')) {
      banner.style.display = 'flex';
    }

    acceptBtn.addEventListener('click', () => {
      localStorage.setItem('cookieConsent', 'accepted');
      banner.style.display = 'none';
      // Aquí puedes activar scripts que dependen del consentimiento
    });

    rejectBtn.addEventListener('click', () => {
      localStorage.setItem('cookieConsent', 'rejected');
      banner.style.display = 'none';
      // Aquí puedes bloquear scripts que instalan cookies no esenciales
    });
  });
</script>

    
</body>

<?php
get_footer();
?>
</html>