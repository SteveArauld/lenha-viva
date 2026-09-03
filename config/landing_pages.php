<?php

// SEO landing pages. Each maps to an existing product category
// (config/loja_products.php) and adds unique on-page content.
// slug => definition

return [

    'lena-de-encina' => [
        'title' => 'Leña de encina seca a domicilio | Comprar leña de encina',
        'meta' => 'Compra leña de encina seca para chimenea y estufa, con alto poder calorífico y baja humedad. Entrega a domicilio en España.',
        'h1' => 'Leña de encina seca a domicilio',
        'source_category' => 'lena',
        'match' => ['encina', 'carrasca'],
        'intro' => '<p>La <strong>leña de encina</strong> es la más valorada para calefacción doméstica: es una madera dura y muy densa que arde despacio, genera una brasa duradera y desprende mucho calor con poco humo. En Casacuberta Trias S.L. vendemos <strong>leña de encina seca</strong>, con un contenido de humedad reducido para que puedas usarla nada más recibirla en tu chimenea, estufa, cocina o caldera de leña.</p>
        <p>Comprar leña de encina de calidad supone menos consumo para la misma temperatura, menos creosota en el tubo y una combustión más limpia. Preparamos cada pedido y lo enviamos con <strong>entrega a domicilio en España</strong>. Si no encuentras el formato o la cantidad que necesitas, escríbenos y te ayudamos a elegir.</p>',
        'faqs' => [
            ['¿La leña de encina está seca?', 'Sí, se comercializa seca y lista para arder, con baja humedad para una combustión eficiente.'],
            ['¿Por qué elegir leña de encina?', 'Por su alta densidad: dura más, calienta más y deja más brasa que las maderas blandas.'],
            ['¿Sirve para estufa y para chimenea?', 'Sí, la leña de encina es adecuada tanto para chimeneas abiertas e insertables como para estufas y cocinas de leña.'],
            ['¿Hacéis entrega a domicilio?', 'Sí, enviamos a domicilio en España. Consúltanos el plazo para tu zona antes de comprar.'],
        ],
    ],

    'lena-seca' => [
        'title' => 'Leña seca para chimenea y estufa | Comprar leña seca',
        'meta' => 'Leña seca lista para arder: baja humedad, alto poder calorífico y combustión limpia. Compra leña seca con entrega a domicilio en España.',
        'h1' => 'Leña seca lista para arder',
        'source_category' => 'lena',
        'intro' => '<p>Usar <strong>leña seca</strong> es la diferencia entre un fuego que calienta y uno que humea. La madera húmeda gasta gran parte de su energía en evaporar agua, ensucia el cristal y forma creosota en el conducto. Nuestra <strong>leña seca</strong> tiene un nivel de humedad bajo, por lo que prende antes, rinde más y ensucia menos.</p>
        <p>En Casacuberta Trias S.L. seleccionamos maderas duras, adecuadas para <strong>chimenea, estufa</strong>, cocina y caldera de leña. Compra online y recibe tu pedido con <strong>entrega a domicilio en España</strong> en pocos días laborables.</p>',
        'faqs' => [
            ['¿Cómo sé si la leña está seca?', 'La leña seca pesa menos, suena hueca al golpearla y prende con facilidad. La nuestra se entrega ya seca.'],
            ['¿Cuánto rinde la leña seca frente a la húmeda?', 'Puede aportar bastante más calor útil, porque no malgasta energía en evaporar el agua de la madera.'],
            ['¿Qué maderas son mejores?', 'Las maderas duras y densas como la encina, por su brasa larga y su alto poder calorífico.'],
            ['¿Dónde entregáis?', 'Realizamos entrega a domicilio en España. Escríbenos para confirmar plazos en tu localidad.'],
        ],
    ],

    'lena-para-chimenea' => [
        'title' => 'Leña para chimenea | Comprar leña a domicilio',
        'meta' => 'Leña para chimenea seca y de maderas duras, con brasa duradera y poco humo. Compra leña para chimenea con entrega a domicilio en España.',
        'h1' => 'Leña para chimenea',
        'source_category' => 'lena',
        'intro' => '<p>Para una <strong>chimenea</strong>, lo importante es una leña seca de madera dura que produzca llama estable, buena brasa y poco humo. La leña de encina cumple estos requisitos y es la opción preferida para chimeneas abiertas e insertables.</p>
        <p>En Casacuberta Trias S.L. puedes <strong>comprar leña para chimenea</strong> ya seca y lista para usar, con el tamaño indicado en cada ficha de producto. Hacemos <strong>entrega a domicilio en España</strong>, para que tengas la leña preparada antes de que llegue el frío.</p>',
        'faqs' => [
            ['¿Qué leña es mejor para una chimenea?', 'Maderas duras y secas como la encina: arden despacio, dan mucha brasa y generan menos humo.'],
            ['¿Puedo usar esta leña en un insertable?', 'Sí, es apta para chimeneas abiertas, insertables y hogares cerrados.'],
            ['¿La leña viene cortada a medida?', 'Cada producto indica su longitud. Consulta la ficha o pregúntanos antes de comprar.'],
            ['¿Cuánto tarda la entrega?', 'Normalmente 2-4 días laborables, según la zona de entrega en España.'],
        ],
    ],

    'lena-para-estufa' => [
        'title' => 'Leña para estufa | Comprar leña a domicilio',
        'meta' => 'Leña para estufa de leña: seca, de maderas duras y en tamaños aptos para la cámara de combustión. Entrega a domicilio en España.',
        'h1' => 'Leña para estufa',
        'source_category' => 'lena',
        'intro' => '<p>Las <strong>estufas de leña</strong> rinden mejor con troncos secos y de tamaño adecuado a su cámara de combustión. Una leña demasiado húmeda baja el rendimiento y ensucia el cristal; una leña demasiado grande dificulta la carga y la regulación del tiro.</p>
        <p>En Casacuberta Trias S.L. vendemos <strong>leña para estufa</strong> seca, de maderas duras como la encina, con la longitud indicada en cada ficha. Compra online y recíbela con <strong>entrega a domicilio en España</strong>.</p>',
        'faqs' => [
            ['¿Qué tamaño de leña necesito para mi estufa?', 'Depende de tu modelo. Revisa la longitud de la cámara de combustión y compárala con la indicada en la ficha del producto.'],
            ['¿Sirve la misma leña para estufa y caldera?', 'Sí, siempre que sea leña seca de madera dura y del tamaño que admita el equipo.'],
            ['¿La leña está lista para usar?', 'Sí, se entrega seca. No necesita secado adicional en condiciones normales de almacenamiento.'],
            ['¿Entregáis a domicilio?', 'Sí, en España. Consúltanos el plazo para tu zona.'],
        ],
    ],

    'estufas-de-lena' => [
        'title' => 'Estufas de leña | Comprar estufa de leña a domicilio',
        'meta' => 'Estufas de leña de alto rendimiento para calentar tu hogar. Modelos robustos con entrega a domicilio en España.',
        'h1' => 'Estufas de leña',
        'source_category' => 'cocinas-de-lena',
        'intro' => '<p>Una <strong>estufa de leña</strong> es una forma eficiente y autónoma de calentar la vivienda con un combustible renovable. Los modelos actuales aprovechan mejor la combustión, mantienen el calor durante más tiempo y ensucian menos el cristal.</p>
        <p>En Casacuberta Trias S.L. encontrarás <strong>estufas de leña</strong> y cocinas de leña de fabricación robusta, algunas con opción de caldera para agua caliente o calefacción. Realizamos <strong>entrega a domicilio en España</strong>. Complementa tu compra con nuestra <a href="/lena-seca">leña seca</a> lista para arder.</p>',
        'faqs' => [
            ['¿Qué potencia de estufa de leña necesito?', 'Depende de los metros cuadrados a calentar y del aislamiento. Como orientación se suele calcular alrededor de 0,1 kW por m³; consúltanos tu caso.'],
            ['¿Puedo conectar la estufa a la calefacción?', 'Algunos modelos incorporan caldera para agua caliente sanitaria o radiadores. Se indica en la ficha de cada producto.'],
            ['¿Qué leña debo usar?', 'Leña seca de madera dura, como la encina, del tamaño que admita la cámara de combustión.'],
            ['¿Hacéis entrega a domicilio?', 'Sí, enviamos a domicilio en España. Consúltanos el plazo y las condiciones para tu zona.'],
        ],
    ],

];
