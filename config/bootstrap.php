<?php

use Cake\Utility\Inflector;

Inflector::rules('plural', [
    /**
     * Sustantivos y adjetivos terminados en una vocal sin acentuar o en una «e» acentuada, por ejemplo: tazas,
     * dientes, taxis, juegos, espíritus, canapés.
     * Sustantivos y adjetivos terminados en «a» u «o» acentuadas (aunque en un pasado también aceptaron «-es»,
     * ya no se considera la opción correcta), por ejemplo: mamás, dominós. Como toda regla, esta también tiene
     * excepciones y estas incluyen yoes (aunque también se acepta «yos»), noes y albalaes.
     */
    '/[aáeéioóu]$/i' => '\0s',

    /**
     * Sustantivos y adjetivos que terminan en las consonantes «d», «j», «l», «n», «r» o «z» precedidas de una vocal,
     * por ejemplo, amores o goles. Esto también incluye varios extranjerismos como píxeles o másteres.
     * Varias esdrújulas que cumplen estos requisitos, sin embargo, permanecen invariables en el plural,
     * como sucede con «cáterin».
     */
    '/([aeiou][dlnrsy])$/i' => '\1es',

    /**
     * Las palabras terminadas en «ch», que son pocas y todas ellas préstamos de otras lenguas, cuando no se mantienen
     * invariables. Un ejemplo es la palabra «sándwiches».
     */
    '/(.*)ch$/i' => '\0es',

    /**
     * Sustantivos y adjetivos monosílabos o agudos (de una sola sílaba o de más de una, pero con el acento en la
     * última) terminados en «s» o «x», por ejemplo: toses, faxes, burgueses. Las excepciones a esta regla incluyen
     * la palabra «dux» (que no varía para formar el plural) y palabras que en realidad son compuestos cuyo segundo
     * elemento es de por sí un plural, las cuales tampoco varían, como «ciempiés».
     */
    '/(.*í)z$/iu' => '\1ces',
    '/(.*)[s|x]$/i' => '\0es',
    '/(.*)[áéíóú][s|x]$/i' => '\0es',

    /**
     * Reglas generales si ninguna otra aplica. Si termina en s, dejamos así, si es un string vacío no reemplazamos,
     * y en otro caso simplemente agregamos una "s"
     */
    '/s$/i' => 's',
    '/^$/' => '',
    '/$/' => 's',
], true);

Inflector::rules('singular', [
    /**
     * Palabras terminadas en z en singular, se pluralizan con "c", en este caso el proceso es inverso.
     */
    '/ces$/i' => 'z',

    /**
     * Terminadas en x, s, o ch, seguido de "es", se elimina el "es"
     */
    '/(.*)(x|s|ch)es$/i' => '\1\2',

    /**
     * Terminadas en consonantes y "es", se elimina el "es"
     */
    '/([aeiou][rdnlmyzs])es$/i' => '\1',

    /**
     * Terminadas en vocal seguida de "s"
     */
    '/([aáeéioóu])s$/i' => '\1',

    /**
     * Regla general, si ninguna más aplica, si es una sola "s" la dejamos así, string vacío no hacemos nada y
     * si termina en "s", la quitamos
     */
    '/^s$/i' => 's',
    '/^$/' => '',
    '/s$/i' => '',
], true);

Inflector::rules('irregular', [
    /**
     * Estas palabras no entran en ninguna de las reglas vistas previamente y no pude encontrar documentación
     * que identifique qué regla aplica para las mismas, así que las marco como irregulares, por ahora me surgieron
     * estos ejemplos, puede que halla más y puede que haya una regla general que desconozco.
     */
    'base' => 'bases',
    'pase' => 'pases',
], true);

Inflector::rules('uninflected', [
    /**
     * Son palabras que solo tienen marca morfológica en plural o que, pese a tener una forma en singular,
     * el uso habitual es en su forma plural.
     */
    'abrelatas', 'albricias', 'alicates', 'andurriales', 'análisis', 'añicos', 'cascarrabias', 'cortaplumas',
    'creces', 'crisis', 'cuelgacapas', 'enseres', 'esponsales', 'exequias', 'fauces', 'fotosíntesis', 'gafas',
    'lavacoches', 'limpiabotas', 'maitines', 'mondadientes', 'nupcias', 'parabrisas', 'paracaídas', 'parachoques',
    'paraguas', 'pararrayos', 'pisapapeles', 'portaaviones', 'quitamanchas', 'rompeolas', 'sacacorchos',
    'saltamontes', 'salvavidas', 'síntesis', 'trabalenguas', 'viacrucis', 'víveres',
], true);
