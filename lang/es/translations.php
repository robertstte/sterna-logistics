<?php

return [
    "header" => [
        "home" => "Inicio",
        "about" => "Nosotros",
        "contact" => "Contacto",
        "spanish" => "Español",
        "english" => "Inglés",
        "language" => "Idioma",
        "access" => "Acceso",
        "panel" => "Panel de control"
    ],
    "landing" => [
        "hero" => [
            "title" => "Menos peso para ti, más eficiencia para tu logística",
            "cta" => "Probar"
        ],
        "localization" => [
            "title" => "Localizar mi carga",
            "subtitle" => "Introduzca el número de orden que le hemos asociado.",
            "search" => "Buscar",
            "illustration" => "Ilustración",
            "help" => "Tengo problemas para encontrar mi orden."
        ],
        "features" => [
            "title" => "Todo lo que necesitas en un único lugar",
            "security" => "Seguridad",
            "robustness" => "Robustez",
            "speed" => "Rapidez",
            "control" => [
                "title" => "Control total",
                "message" => "Monitorea y gestiona tus pedidos en tiempo real, todo desde una sola plataforma.",
                "icon" => "Control"
            ],
            "transport" => [
                "title" => "Transporte multimodal",
                "message" => "Gestiona envíos mediante diversas formas de transporte.",
                "icon" => "Transporte"
            ],
            "notified" => [
                "title" => "Siempre notificado",
                "message" => "Recibe actualizaciones al instante sobre cada movimiento de tu orden.",
                "icon" => "Notificación"
            ],
            "invoicing" => [
                "title" => "Fácil facturación",
                "message" => "Todo al día y sin complicaciones, listo para cuando lo necesites.",
                "icon" => "Factura"
            ]
        ]
    ],
     "contact"=>[
        "title" => "Contactános",
        "name" => "Nombre",
        "email" => "Email",
        "message" => "Mensaje",
    ],
    "errors" => [
        "404" => [
            "title" => "¡Oops! Página no encontrada",
            "subtitle" => "La página que estás buscando no existe, ha sido movida o fue eliminada."
        ],
        "503" => [
            "title" => "¡Oops! El sitio está en mantenimiento",
            "subtitle" => "Estamos realizando algunas mejoras. Te esperamos muy pronto."
        ]
    ],
    "dashboard" => [
        "dheader" => [
            "orders" => "Ordenes",
            "clients" => "Clientes",
            "invoicing" => "Facturación",
            "account" => "Cuenta",
            "logout" => "Cerrar sesión"
        ],
        "table" => [
            "orders" => [
                "id" => "ID",
                "order" => "Orden",
                "client" => "Cliente",
                "status" => "Estado",
                "origin" => "Origen",
                "destination" => "Destino",
                "date" => "Fecha",
                "details" => [
                    "description" => "Descripción",
                    "ubication" => "Ubicación",
                    "package_type" => "Tipo de carga",
                    "arrival_date" => "Fecha de llegada",
                    "departure_location" => "Lugar de salida",
                    "arrival_location" => "Lugar de llegada",
                    "transport_type" => "Medio de transporte",
                    "license_plate" => "Matricula",
                    "weight" => "Peso",
                    "total_cost" => "Coste total",
                    "status" => "Estado",
                    "observations" => "Observaciones",
                    "save" => "Guardar",
                    "cancel" => "Cancelar"
                ]
            ],
            "customers" => [
                "name" => "Nombre",
                "email" => "Correo Electrónico",
                "address" => "Dirección",
                "phone" => "Teléfono",
                "country" => "País",
                "customer_type" => "Tipo de Cliente"
            ]
        ]
    ],
    "package_type" => [
        "chemical" => "Químico",
        "electronic" => "Electrónico",
        "explosive" => "Explosivo",
        "heavy" => "Pesado",
        "organic" => "Orgánico",
        "perishables" => "Perecedero",
        "sensible" => "Sensible",
        "textile" => "Textil"
    ],
    "status" => [
        "cancelled" => "Cancelado",
        "delayed" => "Con retraso",
        "delivered" => "Entregado",
        "ongoing" => "En curso",
        "pending" => "Pendiente"
    ],
    "access" => [
        "login" => [
            "illustration" => "Ilustración",
            "title" => "Mi cuenta",
            "back" => "Volver",
            "email" => "Correo electrónico",
            "password" => "Contraseña",
            "remember" => "Recuérdame",
            "recovery" => "¿Has olvidado la contraseña?",
            "signin" => "Iniciar Sesión",
            "google" => "Iniciar sesion con google",
            "signup" => "¿Aún no tienes una cuenta?"
        ],
        "register" => [
            "illustration" => "Ilustración",
            "title" => "Registrarme",
            "back" => "Volver",
            "name" => "Nombre completo",
            "email" => "Correo electrónico",
            "individual" => "Soy particular",
            "company" => "Soy empresa",
            "address" => "Dirección",
            "phone" => "Telefono",
            "username" => "Nombre de usuario",
            "password" => "Contraseña",
            "next" => "Siguiente",
            "select_country" => "Selecciona un país",
            "confirm_password" => "Confirmar contraseña"
        ],
        "order" => [
            "title" => "Detalles del Pedido",
            "error" => "Hubo un error al encontrar el pedido.",
            
            "info" => [
                "title" => "Información del Pedido",
                "id" => "ID del Pedido",
                "status" => "Estado",
                "created_at" => "Fecha de Creación"
            ],
            
            "route" => [
                "title" => "Origen y Destino",
                "origin" => "Origen",
                "destination" => "Destino"
            ],
            
            "dates_transport" => [
                "title" => "Fechas y Transporte",
                "departure" => "Fecha de Salida",
                "arrival" => "Fecha de Llegada",
                "transport" => "Transporte",
                "air"=> "Avión",
                "maritime" => "Barco",
                "land" => "Camion"
            ],
            
            "cost_weight" => [
                "title" => "Costos y Peso",
                "cost" => "Costo Total",
                "weight" => "Peso"
            ],
            
            "location_package" => [
                "title" => "Ubicación y Tipo de Paquete",
                "location" => "Ubicación",
                "type" => "Tipo de Paquete"
            ],
            
            "description_notes" => [
                "title" => "Descripción y Observaciones",
                "description" => "Descripción",
                "observations" => "Observaciones"
            ]
        ]

    ],
    "footer" => [
        "copyright" => "© 2025 Sterna. Todos los derechos reservados.",
        "privacy" => "Política de privacidad y Términos de uso.",
        "mail" => "Correo",
        "instagram" => "Instagram",
        "facebook" => "Facebook"
    ]
];