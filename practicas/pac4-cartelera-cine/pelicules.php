<!-- Información de las peliculas de la cartelera -->
<?php
    $pelicules = [
        ["nom" => "Alice (Subserivence)", "img" => "images/alice.jpg", "hor" => ["18:00", "22:30"], "sinop" => "Con su mujer en el hospital, un padre en apuros compra una Inteligencia Artificial para ayudarle en las tareas de casa. Pero a medida que la robot se encariña de su nuevo dueño, los límites empiezan a cruzarse. Pronto ella se empeña en eliminar lo que percibe como la verdadera amenaza para su felicidad: su familia.", "dur" => "105", "director" => "S. K. Dale", "repart" => ["Michele Morrone", "Megan Fox", "Madeline Zima"], "qual" => "16", "gen" => "Thriller", "urlTrailer" => "https://www.youtube.com/embed/mRVyQxmBrgY?si=iIs0XcLI8n_Mu30P", "valoracion" => "5.1"],   
        ["nom" => "El hombre Del Saco", "img" => "images/bagman.jpg", "hor" => ["18:00", "20:00", "22:30"], "sinop" => "Durante siglos, los padres han advertido a sus hijos sobre el temible Hombre del Saco, un ser maligno que rapta a niños inocentes y los aparta para siempre de sus familias. Patrick escapó de sus garras por los pelos en su infancia, pero el trauma que le generó aquel encuentro le ha perseguido desde entonces. Tras mudarse a su antigua casa familiar con su esposa e hijo, Patrick descubrirá que la tenebrosa criatura continúa allí, acechando sus pesadillas y amenazando con arrebatarle aquello que más quiere en el mundo.", "dur" => "93", "director" => "Colm McCarthy", "repart" => ["Sam Claflin", "Antonia Thomas", "Steven Cree"], "qual" => "16", "gen" => "Terror", "urlTrailer" => "https://www.youtube.com/embed/LO9l151vcUI?si=ZrAZPindmFO_tLra", "valoracion" => "4.7"],   
        ["nom" => "Bitelchús", "img" => "images/bitelchus.jpg", "hor" => ["18:10", "20:20", "22:30"], "sinop" => "¡Bitelchús ha vuelto! Tras una inesperada tragedia familiar, tres generaciones de la familia Deetz vuelven a casa, a Winter River. Todavía atormentada por Bitelchús, la vida de Lydia da un vuelco cuando su rebelde hija adolescente, Astrid, descubre la misteriosa maqueta de la ciudad en el desván y el portal al Más Allá se abre accidentalmente. Con los problemas que se avecinan en ambos reinos, es sólo cuestión de tiempo que alguien diga el nombre de Bitelchús tres veces y el travieso demonio regrese para desatar su propio caos.", "dur" => "104", "director" => "Tim Burton", "repart" => ["Michael Keaton", "Winona Ryder", "Catherine O'Hara", "Jenna Ortega"], "qual" => "12", "gen" => "Comedia", "urlTrailer" => "https://www.youtube.com/embed/bffGA7Vh0uE?si=dKz1h-O-3wCdKIwi", "valoracion" => "7.0"],   
        ["nom" => "Buffalo Kids", "img" => "images/buffalok.jpg", "hor" => ["18:00"], "sinop" => "Tom y Mary, dos hermanos huérfanos, desembarcan en Nueva York a finales del siglo XIX. Para reunirse con su tío, se aventuran como polizones en un tren por el Salvaje Oeste donde conocerán a Nick, un nuevo y extraordinario amigo que cambiará sus vidas para siempre. Juntos se embarcarán en un peligroso viaje, enfrentándose a malvados villanos, haciendo inesperados amigos y viviendo situaciones únicas en una conmovedora y divertida historia sobre la búsqueda de un hogar.", "dur" => "81", "director" => "Pedro Solis", "repart" => ["Animació"], "qual" => "Apta", "gen" => "Animación", "urlTrailer" => "https://www.youtube.com/embed/JyEU5-a4G44?si=0fMM1bqjQlUjIiW1", "valoracion" => "7.0"],   
        ["nom" => "Casa en Llamas", "img" => "images/casaenllamas.jpg", "hor" => ["20:00", "22:10"], "sinop" => "Montse (Emma Vilarasau) está emocionadísima porque está a punto de pasar un fin de semana con toda la familia en su casa de Cadaqués, en la Costa Brava. Está divorciada hace tiempo, su ex tiene una nueva pareja, sus hijos han crecido y hace tiempo que hacen su vida sin hacerle ningún caso, pero a Montse nada ni nadie conseguirá fastidiarle los ánimos; hace demasiado tiempo que espera este momento, demasiado tiempo que sueña con él: éste fin de semana será sí o sí un fin de semana ideal... aunque para ello tenga que quemarlo todo.", "dur" => "110", "director" => "Dani de la Orden", "repart" => ["Emma Vilarasau", "Enric Auquer", "María Rodríguez", "Alberto San Juan"], "qual" => "16", "gen" => "Comedia", "urlTrailer" => "https://www.youtube.com/embed/dQ-hoH1WX00?si=KOhKTECnphgFWwKQ", "valoracion" => "7.9"],   
        ["nom" => "Deadpool y Lobezno", "img" => "images/deadpoolLobezno.jpg", "hor" => ["21:30"], "sinop" => "Shawn Levy dirige Deadpool y Lobezno, protagonizada por Ryan Reynolds y Hugh Jackman.", "dur" => "127", "director" => "Shawn Levy Levy", "repart" => ["Ryan Reynolds", "Hugh Jackman", "Emma Corrin", "Morena Baccarin"], "qual" => "18", "gen" => "Superhéroes", "urlTrailer" => "https://www.youtube.com/embed/tTM5weeCFvQ?si=0GBCQsuOB0958psP", "valoracion" => "7.9"],   
        ["nom" => "Del Revés 2...", "img" => "images/delreves.jpg", "hor" => ["20:00"], "sinop" => "DEL REVÉS 2 (INSIDE OUT 2), de Disney y Pixar, vuelve a la mente de Riley, una recién llegada adolescente, justo cuando su sede central está siendo demolida para dar paso a algo totalmente inesperado: ¡nuevas emociones! alegría, tristeza, ira, miedo y asco, que durante mucho tiempo han dirigido una operación exitosa, no están seguros de cómo manejar la llegada de ansiedad. Y parece que no está sola.", "dur" => "96", "director" => "Kelsey Mann", "repart" => [""], "qual" => "Apta", "gen" => "Animación", "urlTrailer" => "https://www.youtube.com/embed/ahogVfXzqs4?si=2A74aU3TY2Il_k8k", "valoracion" => "7.6"],   
        ["nom" => "El 47", "img" => "images/el47.jpg", "hor" => ["18:10", "20:20"], "sinop" => "El 47 cuenta la historia de un acto de disidencia pacífica y el movimiento vecinal de base que en 1978 transformó Barcelona y cambió la imagen de sus suburbios para siempre. Manolo Vital, un conductor de autobús que se adueñaba del bus de la línea 47 para desmontar una mentira que el Ayuntamiento se empeñaba en repetir: los autobuses no podían subir las cuestas del distrito de Torre Baró. Un acto de rebeldía que demostró ser un catalizador para el cambio, de que las personas se enorgullecen de sus raíces, de una lucha del vecindario, de la clase trabajadora que ayudó a crear la Barcelona moderna de los años 70.", "dur" => "110", "director" => "Marcel Barrena", "repart" => ["Eduard Fernández", "Clara Segura", "Zoe Bonafonte"], "qual" => "7", "gen" => "Drama", "urlTrailer" => "https://www.youtube.com/embed/pfaG5OXWMEc?si=v_LpI92psGq6XkOA", "valoracion" => "7.6"],   
        ["nom" => "Emmanuelle", "img" => "images/emmanuelle.jpg", "hor" => ["20:20", "22:30"], "sinop" => "Emmanuelle es mujer acostumbrada a tener encuentros sexuales casuales, por los que no siente ningún placer. Un día, la cadena de hoteles de lujo para la que trabaja la llama para ir a Hong Kong a revisar la bajada de ingresos de uno de sus establecimientos, pero cuando llega se encuentra un hotel que funciona a la perfección. Teniendo que buscar una excusa para echar a su directora, durante su estancia allí conoce a Lee Jae-Yong, un atractivo ejecutivo que tiene unas rutinas misteriosas y mantiene su anonimato de cara al hotel. Emmanuelle empieza a obsesionarse con él y a seguirle; pero la obsesión empezará a hacerla fallar en su trabajo.", "dur" => "104", "director" => "Audrey Diwan", "repart" => ["Noémie Merlant", "Naomi Watts", "Will Sharpe", "Chacha Huang"], "qual" => "16", "gen" => "Drama", "urlTrailer" => "https://www.youtube.com/embed/-F821SK927w?si=AzDjfQIzqa-TUIbW", "valoracion" => "4.8"],   
        ["nom" => "Estación Rocafort", "img" => "images/rocafort.jpg", "hor" => ["20:30"], "sinop" => "Un misterio que durante años ha sacudido a la estación de Metro de Rocafort en Barcelona entra de lleno en la vida de Laura (Natalia Azahara) cuando empieza a trabajar en esta vieja y tranquila parada. No tardará en descubrir una leyenda que la empezará a perseguir: allí ha muerto mucha gente en extrañas circunstancias. Laura, decidida a descubrir la verdad, pedirá ayuda a Román (Javier Gutiérrez), un curtido expolicía que alberga sus propios demonios relacionados con el caso. Lo que sea que ocurre en la estación maldita sigue sucediendo a día de hoy. Irá a por ella, y a por todos los que la rodean.", "dur" => "89", "director" => "Luis Prieto Yanguas", "repart" => ["Natalia Azahara", "Javier Gutierrez"], "qual" => "16", "gen" => "Suspense", "urlTrailer" => "https://www.youtube.com/embed/Hl3kWnioGRQ?si=NYI47tP5djK_9F_6", "valoracion" => "6.4"],   
    ];

    // Funcion para mostrar el parametro nombre de la URL
    function mostrarNombre(){
        if (isset($_GET['nom'])) {
            $nom = $_GET['nom'];
            echo "$nom";
        }
    }
?>