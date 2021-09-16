@extends('web.layouts.app')

@section('styles')
<style>
    .post__body {
        columns: 3 250px;
        margin-bottom: 5rem;
    }

    .post__header h1 {
        font-weight: 900;
        font-size: 2.5rem;
    }

    .post__body h3 {
        font-weight: bold;
        padding-left: 25px;
        position: relative;
    }

    .post__body h3::before {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        content: '';
        width: 5px;
        background: #01d099;
    }
</style>
@endsection

@section('content')
<!-- Sponsors-->
<section class="content-info">
    <div class="white-section pt-5 mb-1">
        <div class="container">
            <div class="row no-line-height">
                <div class="col-sm-12">
                    <div class="post__header">
                        <h1>Reglamento General</h1>
                    </div>
                    <div class="post__body">
                        <h3>SOBRE EL ORGANIZADOR Y CONSIDERACIONES GENERALES</h3>

                        <h4>Artículo 1º</h4>
                        <p>
                            La organización estará a cargo de una Liga que se denominará A.R.B.F.I (Asociación
                            Riojana de Baby Futbol Infantil), LA PARTE ADMINISTRATIVA SERA EJECUTADA POR
                            LA ASOCIACIÓN y se regirá de la siguiente manera:
                            <ol>
                                <li>La asociación riojana de baby futbol infantil será la encargada de fijar los
                                    Objetivos, Promover Organización y Dictar su Reglamentación Interna según lo
                                    acordado en la primera reunión celebrada el día de su creación</li>
                                <li>Estará integrada por miembros que sean Idóneos en la materia. La misma estará
                                    compuesta por 9 (NUEVE) miembros, 6 (SEIS) Titulares y 3 (TRES) Suplentes, y
                                    estos trabajarán sin percibir sueldo alguno, más el coordinador general elegido por
                                    la
                                    comisión directiva de la cuál se desprenderán 3 (tres) miembros para Tribunal de
                                    Disciplina, que podrán ser ajenos a las Instituciones, mas 1 (un) miembro suplente.
                                </li>
                            </ol>
                        </p>

                        <h4>Artículo 2º</h4>
                        <p>
                            Se pondrá a consideración el cobro de un Bono Contribución de Admisión al Público
                            bajo las siguientes cláusulas:
                            <ol>
                                <li> El precio del Bono Contribución será fijado en Asamblea de Delegados realizada a
                                    tal fin. </li>
                                <li>
                                    Los ingresos por lo recaudado serán para la Institución que juegue de Local,
                                    salvo
                                    expresa indicación de la asociación a tal efecto.</li>
                            </ol>
                        </p>

                        <h4>Artículo 3º</h4>
                        <p>Los Torneos serán Organizados Anualmente por la asociación y la Denominación del
                            primer encuentro se realiza en el año 2012 a criterio de C.D, el cuál fue " TORNEO
                            INTEGRACION”.</p>
                        <h4>Artículo 4º</h4>
                        <p>El arbitraje estará sujeto a las reglas y los aranceles serán determinados en común
                            acuerdo y podrán variar de acuerdo a las circunstancias (eje.)Modificación de fixture.
                        </p>

                        <h4>Artículo 5º</h4>
                        <p>Los Torneos Organizados por ésta Liga serán disputados por Todas las Instituciones
                            Asociadas, las cuales quedarán sujetas al presente Reglamento.-</p>

                        <h4>Artículo 6º</h4>
                        <p>Cualquier circunstancia que acontezca durante el desarrollo del Torneo y que no este
                            prevista por esta Reglamentación, será resuelta por la Comisión Directiva y Tribunal
                            de Disciplina de esta asociación, siendo su fallo APELABLE, dentro de las 72 Hs.
                            Hábiles, por escrito, luego de haber conocido la Resolución.</p>

                        <h3>DE LAS CATEGORÍAS INTERVINIENTES</h3>
                        <h4>Artículo 7º</h4>
                        <P>En la realización del Torneo Amistad intervendrán OCHO (8) Categorías por cada
                            Institución, a saber:
                            <ul>
                                <li>CATEGORÍA "A" NIÑOS HASTA 6 AÑOS DE EDAD.</li>
                                <li>CATEGORÍA "B" NIÑOS HASTA 7 AÑOS DE EDAD.</li>
                                <li>CATEGORIA "C": NIÑOS HASTA 8 AÑOS DE EDAD.</li>
                                <li>CATEGORIA "D": NIÑOS HASTA 9 AÑOS DE EDAD.</li>
                                <li>CATEGORIA "E": NIÑOS HASTA 10 AÑOS DE EDAD.</li>
                                <li>CATEGORIA "F": NIÑOS HASTA 11 AÑOS DE EDAD.</li>
                                <li>CATEGORIA "G": NIÑOS HASTA 12 AÑOS DE EDAD.</li>
                                <li>CATEGORIA "H" NIÑOS HASTA: 13 AÑOS DE EDAD.</li>
                                <li>CATEGORIA PROMOCIÓN NIÑOS HASTA: 5 AÑOS DE EDAD</li>
                                <li>CATEGORIA FEMENINA: A CONSIDERACIÓN DE C.D</li>
                            </ul>
                        </P>

                        <h4>Artículo 8º</h4>
                        <p>Las Categorías "D-C-B-A-F-E" jugarán en el orden indicado los días y
                            horarios a determinar. Y las
                            "G-H-I- promoción también a determinar en reunión de delegados para
                            tal fin.
                            El Orden de Juego de las Categorías mencionadas podrá ser modificado
                            con acuerdo previo de ambas Instituciones y comunicado a ésta Liga,
                            bajo Nota Firmada por ambos Delegados. No pudiendo hacerse más de
                            3 veces en el transcurso del torneo, consecutivamente o
                            alternadamente.
                            DEL INGRESO
                            La Inscripción deberá Formalizarse por Nota a ésta asociación, siendo
                            OBLIGATORIO presentar la cantidad de categorías que se dicte en reunión de
                            delegados. Será obligatorio participar del Torneo Oficial para poder
                            inscribirse en los Torneos adicionales y Arancelados.</p>

                        <h3>DEL FICHAJE</h3>
                        <h4>Artículo 10º</h4>
                        <p>
                            <ol>
                                <li>La Planilla de Inscripción se confeccionará por Duplicado y será
                                    subscripta por un Delegado y el técnico de Categoría ambos deberán ser
                                    Mayores de Dieciocho (18) años de edad. La citada Planilla será
                                    refrendada por el Sr. PRESIDENTE y el Sr. SECRETARIO de la
                                    Institución, y el TUTOR del jugador, en la misma se denominará a los
                                    Jugadores según la Categoría en que Intervengan. La misma tendrá
                                    carácter de Declaración Jurada.
                                    Cada Equipo deberá contar con un máximo de DOCE (12) y un mínimo
                                    de siete (7) jugadores.</li>
                                <li>Sin la firma del TUTOR el jugador no podrá ser habilitado, este art.
                                    Habla del total acuerdo de todas las partes a las reglas dispuestas en los
                                    tres (3) capítulos y todos sus Artículos.</li>
                            </ol>
                        </p>

                        <h4>Artículo 11º</h4>
                        <p>
                            Las Planillas de Inscripción deberán presentarse en la Secretaria de ésta
                            Liga, en el día y hora que se fije a tal efecto, conjuntamente con los
                            (DNI y CONSTANCIA DE APTITUD FISICA) de todos sus Componentes.
                            Se entiende por –DNI- a los siguientes: DOCUMENTO NACIONAL DE
                            IDENTIDAD ambos con la correspondiente Fotografía del Nominado.
                            Una vez controladas las Planillas, las mismas serán Firmadas y Selladas,
                            entregándose el Original a la Institución para su presentación en la
                            Mesa de Control antes de los Partidos a la Autoridad del Equipo rival y/o
                            a cualquier persona que ésta asociación designe para dicho control.
                            El Duplicado de la Planilla quedará en poder de la Comisión Directiva de
                            la Liga a los efectos que estime corresponder.-
                            En la lista de buena fe deberá constar el domicilio real de los jugadores.
                            Las Planillas de Inscripción deberán contener las referencias que en ella se
                            solicitan, con un MINIMO de siete (7) jugadores y un MAXIMO permitido o
                            sea Doce (12) jugadores, Autorizándose a completar esa cantidad antes de
                            que se dispute la Tercera fecha. Estos comenzarán a jugar en la Cuarta
                            fecha.
                        </p>

                        <h4>Artículo 13º</h4>
                        <p>Para la Constitución de Cada Una de las Categorías se tendrán en cuenta
                            que, la edad fijada debe ser cumplida en el año de Disputa del Torneo,
                            tomando como Base el 1º de ENERO. Si la realización del Torneo del año
                            respectivo se prolongara a los primeros Meses del año siguiente, igualmente
                            los Jugadores estarán Habilitados.</p>

                        <h3>DE LOS JUGADORES</h3>
                        <h4>Artículo 14º</h4>
                        <p>Los jugadores de todas las instituciones quedarán libres a partir de la
                            finalización de los torneos que anualmente organiza A.R.B.F.I. En cualquier
                            categoría podrá ficharse jugadores de la categoría inmediata
                            anterior, en este caso y a todos los efectos se considerarán jugadores de la
                            categoría en la que están fichados.
                            Serán dados de baja automáticamente al finalizar la primera rueda los
                            jugadores que no hayan jugado ningún partido durante la misma. En las
                            mismas condiciones serán dados de baja los jugadores que, finalizada la
                            décima fecha de la segunda rueda, no hayan jugado ningún partido en la
                            misma.</p>

                        <h4>Artículo 15º</h4>
                        <p>
                            Al finalizar la primera rueda se realizará un REFICHAJE RESTRINGIDO
                            conforme las instrucciones que imparta la liga a ese efecto.
                            Los jugadores que al momento de este Re fichaje se encuentren fichados en
                            una entidad, no podrán fichar para otra
                            A los efectos del (Re fichaje) las Instituciones que lo soliciten deberán
                            presentar una nota firmada por el Presidente, Secretario y Delegado
                            General, indicando las altas y las bajas solicitadas. En el caso de las Bajas
                            se indicaran las causas que las motivan.
                        </p>

                        <h3>DEL REGISTRO DE JUGADORES</h3>
                        <h4>Artículo 16º</h4>
                        <p>A los efectos de un estricto control la A.R.B.F.I posee actualizado, un
                            registro de Jugadores el cuál se encuentra a disposición de las
                            Instituciones participantes para su consulta.</p>

                        <h3>DE LOS DELEGADOS GENERALES Y DELEGADOS</h3>
                        <h4>Artículo 17º</h4>
                        <p>Las Instituciones deberán designar un Delegado General y un Delegado
                            General Suplente, que deberán ser personas mayores de 21 años de
                            edad.
                            Deberán designar también los delegados DE MESA Y TECNICOS DE CAT.
                            Que consideren necesario para representar a la Institución en cada
                            jornada. Estos delegados de mesa deberán ser personas mayores de 18
                            años de edad.
                            Serán funciones del Delegado General representar a su Institución ante
                            la Asociación y durante las jornadas, y serán los responsables directos
                            del fichaje.
                            En caso de renuncia, ausencia o suspensión del Delegado General, sus
                            funciones serán desempeñadas por el Delegado General Suplente.
                            Los demás delegados tendrán las siguientes funciones:
                            <ol>
                                <li>Integrar la mesa de control.</li>
                                <li>Desempeñarse como entrenador o ayudante.</li>
                            </ol>
                        </p>

                        <h4>Artículo 18º</h4>
                        <p>En la fecha que indique la Asociación, cada entidad informará a la
                            misma, mediante nota escrita en papel con membrete de la Institución y
                            con la firma de su Presidente y Secretario, las personas designadas para
                            desempeñarse como DELEGADO Gral., DELEGADO Gral. SUPLENTE,
                            DELEGADOS DE MESA y TECNICOS acompañando a la nota
                            correspondiente la planilla que indique la cat. , que al efecto entregará a
                            la liga con los datos personales de los designados.
                            Las Instituciones serán directamente responsables de las faltas
                            cometidas por los delegados que la representen y por ello serán pasibles
                            de las sanciones que prevé este reglamento.
                            Los Delegados Generales y demás delegados suspendidos quedarán
                            inhabilitados por el tiempo de la suspensión para cumplir sus funciones.
                            En caso de violación a la disposición del párrafo anterior o cuando el
                            suspendido sea identificado como autor, promotor o partícipe en actos
                            que transgredan el presente reglamento, la institución será
                            "AMONESTAD SANCIONADA O ELIMINADA".</p>

                        <h3>DE LA PLANILLA DE PARTIDO Y HABLITACION EN LA CATEGORÍA SUPERIOR</h3>
                        <h4>Artículo 19º</h4>
                        <p>Antes de iniciar cada partido todos los jugadores deberán firmar la
                            planilla de partido, y sólo podrán integrar los equipos de cada categoría
                            los jugadores habilitados que hayan firmado la planilla antes del
                            momento en
                            que el arbitro dé por iniciado el encuentro. El jugador que no firmó la
                            planilla antes de que el arbitro dé por iniciado el encuentro no podrá
                            integrar su equipo, salvo que el mismo haya iniciado el encuentro con
                            menos jugadores que el máximo reglamentario, en este caso sólo podrá
                            agregarse la cantidad de jugadores faltantes al momento del inicio del
                            partido.
                            Todo jugador registrado en la planilla de "Buena Fe" de una Institución,
                            podrá jugar para la categoría inmediata superior, siempre que no haya
                            jugado para la categoría en la que se encuentra fichado, tampoco podrá
                            jugar para su categoría si esta juega con posterioridad.
                            Sólo se podrá subir dos jugadores por categoría, sin contar los que
                            figuren en la planilla de "Buena Fe" de la categoría a la que suben.
                            Cuando un jugador que firmó la planilla de un partido no juegue en el
                            mismo, No podrá jugar en la categoría inmediata superior.</p>

                        <h4>Artículo 20º</h4>
                        <p>La Planilla de Control de partidos deberán completarse con todos los
                            datos solicitados en la misma, el resultado del encuentro se deberá
                            colocar en Número y Aclarado en Letras.
                            La confección incorrecta de la misma No dará lugar a reclamos por
                            resultados de la institución infractora.
                            Toda información que se quisiera realizar, deberá hacerse por nota
                            separada.
                            Es obligatorio para los Sres. Delegados Generales, informar por nota
                            toda anomalía que se produzca durante las jornadas, como ser
                            Dirigentes, Jugadores, parciales expulsados, etc. En caso de no hacerlo
                            serán pasibles a amonestación, sanción y eliminación.
                            En la Planilla de Partido solamente el Señor Arbitro podrá dejar sentada
                            alguna otra información.
                            La Lista de Buena Fe, como los Carnets de Jugadores, Delegados,
                            Técnicos, deberán estar en la Mesa de Control, de no ser así dará lugar
                            al Tribunal de Disciplina a sancionar a la Institución infractora.
                            Cuando un partido no se juegue por cualquier circunstancia, se
                            confeccionará y se firmará igualmente la Planilla de Partido con los
                            datos existentes y firma de las autoridades de la mesa, al dorso de la
                            planilla el arbitro deberá dejar constancia de la causa por la que no se
                            jugó el partido.
                            Al finalizar cada encuentro el árbitro hará constar al dorso de la planilla
                            de juego de novedades durante el encuentro,
                            siendo responsabilidad de los delegados de mesa verificar al fin de cada
                            partido que el árbitro cumpla con este cometido.</p>

                        <h4>Artículo 21º</h4>
                        <p>El Señor Delegado del Equipo Local es el encargado de entregar las
                            Planillas de los Partidos con su información en la Sede de la Liga el día
                            posterior a la fecha en disputa en horario designado por la C.D.
                            Salvo jornadas suspendidas, donde el plazo será de 24 hs. hábiles a
                            partir de la finalización de la Jornada.
                            La no presentación de las mismas en el término fijado se hará pasible,
                            la primera vez a AMONESTACION Y DE REINSIDIR A UNA SANCION
                            El no retiro de cualquier tipo de Documentación hará pasible al infractor
                            a la misma sanción.</p>

                        <h3>DE LA CONSTITUCIÓN DE LAS CATEGORÍAS</h3>
                        <h4>Artículo 22º</h4>
                        <p>Se considerará equipo constituido al que presente al momento de inicio
                            del partido como mínimo cuatro (4) jugadores, en las categorías que
                            juegan con seis (6) jugadores, y tres (3) en la que juega con cinco (5)
                            jugadores. En este mínimo no se contarán los jugadores de la categoría
                            inmediata anterior que puedan subirse. El equipo que no complete el
                            mínimo de jugadores antes referido al momento de iniciar el encuentro,
                            perderá automáticamente el partido. Si ninguno de los equipos completa
                            el mínimo, ambos perderán el partido.
                            Si luego del inicio del partido por cualquier razón un equipo queda con
                            una cantidad de jugadores menor a los mínimos indicados en el punto
                            anterior, incluidos en este caso los jugadores de la categoría anterior
                            que se hayan subido, se dará por finalizado el encuentro, y al dorso de
                            la planilla el arbitro dejará constancia de la causa de la suspensión y el
                            resultado habido en ese momento.
                            En el caso previsto en el punto anterior se dará por perdido el partido (2
                            a 0) al equipo que quedó en inferioridad numérica. En caso de que
                            ambos equipos hayan quedado en inferioridad numérica, el resultado
                            será el habido
                            al momento de la suspensión.</p>

                        <h3>PROHIBICIÓN ELEMENTOS QUE PUEDEN PRODUCIR DAÑO FISICO</h3>
                        <h4>Artículo 23º</h4>
                        <p>No podrán formar parte del Equipo aquellos niños que estén enyesados,
                            debiéndose quitar los relojes, cadenas, pulseras anillos, o todo otro
                            elemento que pueda ocasionar durante el juego algún daño físico, como
                            así también los cuellos polares, comúnmente llamados cogoteras y aros
                            o piercing.</p>

                        <h4>Artículo 24º</h4>
                        <p>Todos los Jugadores AFILIADOS, deberán poseer una Ficha Médica, la
                            cuál será Extendida por el profesional designado por A.R.B.F.I ,O la
                            institución a la q representa el Niño. Para tal efecto la Asociación Instará
                            a las Instituciones a cumplir sin excepción con este art. , en caso de
                            incumplimiento, los jugadores serán inhabilitados para jugar en las
                            Categorías respectivas y es de responsabilidad absoluta de la Institución
                            a la que representa el NIÑO.</p>

                        <h4>Artículo 25º</h4>
                        <p>Las Instituciones deberán, al comenzar la Temporada de actividades,
                            verificar la asistencia a los Establecimientos Educacionales. y si así no
                            lo fuera poner en conocimiento a esta liga para solucionar el
                            inconveniente y que el niño concurra al colegio.</p>

                        <h3>DE LAS CREDENCIALES</h3>

                        <h4>Artículo 26º</h4>
                        <p>Al oficializarse la Planilla de Inscripción, la Asociación hará entrega a la
                            Institución de un carnet Plastificado de Identificación, de cada jugador
                            que deberá ser renovado cuando la Liga lo considere conveniente. Este
                            Carnet es necesario e imprescindible para Participar del Cotejo, y el
                            Niño que no presente ésta Credencial en al mesa de Control no podrá
                            participar del encuentro, aunque haya acuerdo de Delegados. Si esta
                            anomalía ocurriera o fuera comprobada, serán sancionados los mismos
                            con 2 (dos) fechas de Suspensión y con la pérdida de los puntos en
                            dichas Categorías.</p>

                        <h3>DE LA MESA DE CONTROL</h3>
                        <h4>Artículo 27º</h4>
                        <p>La Institución que hace de local deberá colocar en un lugar destacado,
                            una mesa, dónde funcionará la mesa de control. La misma será
                            Presidida por un Delegado de la entidad Local que estará acompañado
                            de un Similar de la Institución Visitante, sobre la misma se colocará el
                            PRESENTE Reglamento de Juego Actualizado, Las Planillas de Inscripción
                            de ambas Instituciones, el Carnet de los Señores Delegados de mesa,
                            técnicos de Categoría, Ayudantes y de los Jugadores. Todas las
                            Instituciones Locales tendrán que tener un lugar reservado para los
                            Suplentes y su Técnico de Categoría y Ayudante de ambos equipos,
                            debiendo los mismos permanecer sentados en dicho lugar durante el
                            transcurso del partido. Si fuera posible lo más cercano a la Mesa de
                            Control.
                            Ambos Delegados de mesa serán los responsables de marcar en la
                            Planilla de los partidos a los Jugadores AMONESTADOS y/o
                            EXPULSADOS, el resultado del encuentro, como así también la
                            individualización de los autores de los goles. Una vez terminado el
                            partido firmarán ambos Delegados la Planilla. dicha conformidad es a los
                            efectos de la aceptación de jugadores firmantes, Delegados, Delegados
                            de Categoría y resultado del encuentro y se le entregará al Sr. Arbitro
                            la referida Planilla para su control final, y su conformidad.
                            En caso de EXPULSION DE JUGADORES- DELEGADOS DE CATEGORIAS Y / O
                            DELEGADOS - AYUDANTE, El Delegado General del bando INFRACTOR es el
                            responsable de entregar al Arbitro el Carnet del / los Infractor/es para ser colocado
                            dentro del Sobre junto con las Planillas, para luego ser entregado en la
                            Liga.
                            Se deberá Firmar las planillas de Partido, el no cumplimiento de esta regla por parte
                            de Técnicos delegados Gral. y e mesa serán sancionados con una fecha de
                            suspensión.</p>

                        <h4>Artículo 28º</h4>
                        <p>Todas las Instituciones que hacen de Local deberán tener a disposición durante
                            los encuentros un BOTIQUIN de Primeros Auxilios lo mas completo posible
                            proporcionado por el LOCAL..
                            Las Instituciones deberán estar afiliados a algún plan de EMERGENCIAS
                            MEDICAS.-</p>

                        <h3>DEL CAMPO DE JUEGO</h3>
                        <h4>Artículo 29º</h4>
                        <p>Todas las Instituciones deberán tener bien Marcadas las líneas del campo de
                            juego, inclusive el Punto de Penal que se encontrará a 4 (cuatro) metros de la
                            Línea de Fondo, y la distancia de los Tiros de Esquina a 2 (dos) metros de la línea
                            lateral. Las Redes de los Arcos tienen que encontrarse en Buenas Condiciones. A
                            partir del Año 2012 no podrá inscribirse ninguna Institución cuya medida de
                            Campo de juego Mínimas sean menor a:
                            LARGO 24 METROS - ANCHO 13,00 METROS, ARCOS 3 DE ANCHO X 2 DE ALTO
                            MAXIMAS LARGO 35 METROS - ANCHO 27 METROS con un área Mínima de 3 x 7
                            METROS. y las redes no pueden ser de ALAMBRE.-
                            Si el Arbitro cuestionara alguna anomalía y la Institución no tomara las medidas
                            adecuadas para solucionar el inconveniente, se podrá llegar hasta la
                            SUSPENSION de la cancha de la Institución infractora.</p>

                        <h3>DE LAS INSTALACIONES DE LA INSTITUCION</h3>
                        <h4>Artículo 30º</h4>
                        <p>Todas las Instituciones deberán contar con Vestuarios en Buenas Condiciones,
                            como así mismo los Baños higienizados antes y durante de los partidos.
                            En los vestuarios donde se cambien los Niños, no podrán cambiarse ni ducharse
                            personas Mayores mientras dure la Jornada Deportiva.</p>

                        <h3>DE LA LIGA</h3>
                        <h4>Artículo 31º</h4>
                        <p>La Liga no se responsabiliza de posibles accidentes a los Participantes del
                            Torneo, o de Extravíos de Prendas u Objetos Varios.</p>

                        <h4>Artículo 32º</h4>
                        <p>A medida que transcurra el Torneo, la Liga podrá cambiar Horarios de
                            iniciación de los Partidos, cómo así también Fechas y Canchas, etc. si así los
                            estimara conveniente.</p>

                        <h4>Artículo 33º</h4>
                        <p>Los Equipos podrán cambiar de Campo de Juego (local - Visitante) o de
                            Escenario de común acuerdo entre las Instituciones, dejándose constancia
                            que se efectúa el Cambio, Se deberá informar a la Liga en todas las
                            ocasiones, por escrito y con la firma de ambas Instituciones.
                            No pudiendo hacerse mas de 3 veces en el transcurso del Torneo,
                            consecutivamente o alternada mente. Asimismo se propicia a las
                            instituciones tengan en cuenta las fechas de las comuniones que deberán
                            informarse con el tiempo necesario y con la pertinente justificación
                            eclesiástica o de donde corresponda.
                            Para el efecto de poder comunicar a los Sres. Árbitros lo antedicho y con las
                            Jornadas de el actual fixture, se deberá comunicar hasta los días Miércoles a
                            las 18.30 horas.</p>

                        <h4>Artículo 34º</h4>
                        <p>La realización del Tercer Tiempo es OBLIGATORIA y se Realizará de la
                            siguiente manera: al término del partido los Jugadores, tanto Locales
                            como Visitantes, acompañado por su Delegado irán al Lugar que la
                            Institución Local tendrá Habilitado con Mesa y Sillas, para compartir
                            todos Juntos lo que se les sirva.</p>

                        <h4>Artículo 35º</h4>
                        <p>La Institución Local tendrá que tomar todas las Medidas
                            Correspondientes para que ninguna persona se coloque al lado de los
                            Arcos o detrás de ellos, quiere decir que del poste a la raya que marca
                            el Área Penal no puede ni debe haber nadie.</p>

                        <h4>Artículo 36º</h4>
                        <p>Los Jugadores cuando se encuentren en los Vestuarios tienen que estar
                            acompañados por algún Delegado, quién será el responsable de los
                            DAÑOS o INCIDENTES que ocurrieran en los mismos.</p>

                        <h4>Artículo 37º</h4>
                        <p>Las Reuniones de Delegados serán el dia y hora a determinar. Los
                            únicos que tienen Reconocimiento ante la Liga para dichas Reuniones
                            son: DELEGADO GENERAL y el DELEGADO GENERAL SUPLENTE; no
                            siendo así para los Restantes. En todos los casos de Reuniones,
                            Asambleas y/o decisiones de cualquier índole cada Institución tendrá
                            Derecho a un solo Voto. En caso de hallarse presente Ambos Delegados
                            Generales, votará el que represente a la Divisional Superior. La ausencia
                            a la Misma hará pasible una AMONESTACION
                            De repetirse la situación se duplicará la Sanción.
                            En casos excepcionales se permitirá la Presencia de cualquier Delegado
                            o Delegado de Categoría, pero si hay VOTACION, no podrá ejercer ese
                            derecho, salvo que la Institución envíe una Nota en Tiempo y Forma al
                            Respecto.</p>

                        <h4>Artículo 38º</h4>
                        <p>La Pelota a utilizarse en los Partidos la proveerá la Institución que hace
                            de Local, teniendo la OBLIGACION de Presentar TRES (3) en Buenas
                            Condiciones al Árbitro antes de comenzar la Jornada.</p>

                        <h3>COPA CIUDAD DE LA RIOJA</h3>
                        <h4>Artículo 39º</h4>
                        <p>Anualmente la Liga organizará un torneo paralelo que se denominará
                            "Copa CIUDAD DE LA RIOJA", que se regirá por el presente reglamento
                            y las siguientes disposiciones particulares:
                            <ol>
                                <li>El torneo se disputará por eliminación en partidos de ida y vuelta en
                                    la primera fecha y segunda fecha.</li>
                                <li>semifinal y final se jugarán en cancha neutral a designar por la
                                    A.R.B.F.I</li>
                                <li>Jugará en el orden e que se juega el torneo oficial.</li>
                                <li>Definición en caso de empate:
                                    <ol type="a">
                                        <li>Si hay empate en puntos en la primera fecha, definirá la categoría
                                            de mayor edad jugando un adicional de 10 minutos divididos en dos
                                            tiempos de 5 minutos cada uno. Si persiste el empate se ejecutarán
                                            penales conforme las disposiciones de este reglamento.</li>
                                        <li>A partir de la segunda fecha si hay empate en seis puntos y excepto
                                            en la semifinal y en la final, se jugará una nueva jornada en cancha
                                            neutral. De persistir el empate se definirá como está previsto en el
                                            punto anterior.</li>
                                    </ol>
                                </li>
                            </ol>
                            El Trofeo Copa CIUDAD DE LA RIOJA al igual que la challenger que es la
                            suma total del torneo oficial quedará en poder de la Institución que lo
                            obtuviere durante el año posterior a su Conquista, debiéndolo devolver
                            a esta Liga, cuando la misma lo requiera y quedará en posesión
                            definitiva cuando una Institución lo Obtuviere durante 3 (tres) años
                            consecutivos o 5 (cinco) años alternados.-</p>

                        <h4>Artículo 40º</h4>
                        <p> Se propicia la Institución del TROFEO FAIR-PLAY (JUEGO LIMPIO), que
                            será otorgado por esta Liga a aquel jugador con más lealtad deportiva,
                            tomando en cuenta todos los Torneos en que compita, este galardón
                            será extensible a Instituciones, Dirigentes, Directivos, Delegados,
                            Técnicos.</p>

                        <h3>DE DESAFILIACIONES O VACIAMIENTO</h3>
                        <h4>Artículo 41º</h4>
                        <p>
                            <ol type="a">
                                <li>Toda aquella Institución que por iniciativa Propia solicite su
                                    desafiliación a esta Liga, solo podrá solicitar nuevamente su afiliación
                                    una vez transcurrido 1 (uno) año desde su retiro. La Comisión Directiva
                                    evaluará dicha solicitud y en caso de aprobarse su ingreso deberá
                                    hacerlo en la última Zona que se este disputando en ese momento,
                                    debiendo cumplir con todos los requisitos que se exigen a las
                                    Instituciones que se afilian por primera vez.
                                    En casos especiales la Institución podrá solicitar la suspensión de su
                                    afiliación por el Término de un año, durante el cuál deberá seguir
                                    cumpliendo con los compromisos Administrativos contraídos. Cumplido
                                    este lapso, de no solicitar su reincorporación, será dada de Baja de esta
                                    Liga.</li>
                                <li>Si por razones de índole interna, se produjera el alejamiento de
                                    Dirigentes, Delegados, Delegados de Categoría y o Jugadores de una
                                    Institución afiliada a la Liga, conformando este grupo una nueva
                                    Institución, deberán solicitar su afiliación cumplimentando las
                                    condiciones Reglamentarias exigidas.
                                    En ningún caso podrán seguir utilizando la denominación, colores o
                                    símbolos característicos de su anterior Instituciones, y deberán ingresar
                                    en la última Zona que se este disputando en ese momento.</li>
                                <li>Si la situación del punto b) ocurriera durante del desarrollo del
                                    Torneo, en ningún caso se podrá reclamar la continuación en el mismo
                                    con los puntos conseguidos anteriormente, debiendo disputar los
                                    encuentros restantes en forma amistosa donde no sumara punto
                                    alguno, además de cumplir con las disposiciones Administrativas
                                    correspondientes de la Liga. Al finalizar el Torneo descenderá
                                    automáticamente a la Zona inmediata inferior.</li>
                            </ol>
                        </p>

                        <h4>Artículo 42º</h4>
                        <p>El TORNEO AMISTAD se regirá por el Reglamento vigente.
                            El TORNEO JUVENIL se regirá por el Reglamento de Juego vigente y
                            podrá sufrir modificaciones con la aprobación de los delegados y en lo
                            concerniente a las Sanciones por el Reglamento de A.R.B.F.I
                            COPA CIUDAD DE LA RIOJA: Se regirá por el Reglamento vigente.
                            TORNEO FEMENINO: se regirá por el reglamento vigente
                            DE MAS TORNEOS, se regirá por el presente Reglamento y de acuerdo a las
                            normas que se establezcan en Reunión de
                            Delegados citadas a tal efecto.</p>

                        <h4>Artículo 43º</h4>
                        <p>Todos los fallos Deportivos y Administrativos de esta Liga pasarán por el
                            Tribunal de Disciplina, quién será el instrumento para la aplicación de los
                            mismos y el encargado de su archivo para los antecedentes publicación y
                            ejecución de los mismos.</p>

                        <h3>DE LA SUSPENSIÓN DE LOS PARTIDOS</h3>
                        <h4>Artículo 44º</h4>
                        <p>El arbitro deberá suspender la jornada en los siguientes caso:
                            <ol type="a">
                                <li>Cuando sea agredido físicamente.</li>
                                <li>Cuando considere que existen razones que ponen en riesgo su
                                    integridad física.</li>
                                <li>Cuando se produzcan hechos de violencia dentro del ámbito del
                                    Campo de juego o a su alrededor que a su criterio pongan en riesgo la
                                    integridad física de las personas.</li>
                                <li>En todos los casos previstos en los puntos anteriores y siempre que sea posible,
                                    previo a la suspensión de una jornada, el arbitro requerirá la colaboración de los
                                    Delegados Generales para neutralizar las causas que puedan generar la suspensión.
                                    Los Delegados Generales están obligados por iniciativa propia o a pedido del arbitro
                                    a
                                    realizar con sus delegados y resto de su parcialidad, las gestiones necesarias para
                                    neutralizar los inconvenientes que puedan dar lugar a una suspensión de la jornada.
                                </li>
                                <li>Por jornada suspendida, el arbitro recibirá el 50% de sus haberes
                                    fijado por jornada. El otro 50% será depositado en la Liga por la Institución que
                                    hace de local dentro de las 24 horas hábiles siguientes.</li>
                                <li>Suspendida una jornada, la Liga resolverá si se continúa o no,
                                    atendiendo a las causas que generaron la suspensión. Si decide que la
                                    jornada no continúe, perderá los partidos faltantes el equipo causante
                                    de la suspensión o los dos equipos si se considera que ambos son
                                    culpables.</li>
                            </ol>
                        </p>

                        <h3>DISPOSICIONES VARIAS</h3>
                        <h4>Artículo 45º</h4>
                        <p>Por aceptación del presente Reglamento inhibe a las Instituciones
                            Asociadas a esta Liga y/o Integrantes de las mismas a promover acción
                            Judicial de ninguna Naturaleza.</p>

                        <h4>Artículo 46º</h4>
                        <p>La elección de los modelos de los Trofeos se efectuará en reunión de
                            Delegados.
                            Para realizar la compra de los mismos se convocará a las Empresas a
                            presentar muestras de acuerdo a las pautas de la Comisión Directiva, no
                            aceptándose aquellas que no se ajusten a lo especificado, evaluando
                            precios, calidad y solvencia de cada Empresa oferente.</p>

                        <h4>Artículo 47º</h4>
                        <p>La Liga se reserva el derecho de efectuar la verificación de Identidad de
                            los Jugadores INSCRIPTOS por las Instituciones Asociadas los días de
                            partido, IN SITU, debiéndose efectuar la misma por un miembro de
                            Tribunal de Disciplina, un miembro de Comisión Directiva, el Arbitro
                            actuante y el Delegado General del jugador de la Institución verificada,
                            en caso de no permitirse efectuar la Verificación a la Comisión
                            designada a tal efecto y con las formas debidamente llenadas, la
                            Institución será ELIMINADA de esta Liga.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection