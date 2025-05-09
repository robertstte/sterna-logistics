<?php

return [
    "header" => [
        "home" => "Home",
        "about" => "About Us",
        "contact" => "Contact",
        "spanish" => "Spanish",
        "english" => "English",
        "language" => "Language",
        "access" => "Access"
    ], 
    "landing" => [
        "hero" => [
            "title" => "Less weight for you, more efficiency for your logistics",
            "cta" => "Try out"
        ], 
        "localization" => [
            "title" => "Locate my cargo",
            "subtitle" => "Enter the order number we have associated with it.",
            "search" => "Search",
            "illustration" => "Illustration",
            "help" => "I'm having trouble finding my order."
        ],
        "features" => [
            "title" => "Everything you need at one place",
            "security" => "Security",
            "robustness" => "Robustness",
            "speed" => "Speed",
            "control" => [
                "title" => "Full control",
                "message" => "Monitor and manage your orders in real time, all from a single platform.",
                "icon" => "Control"
            ],
            "transport" => [
                "title" => "Multimodal transport",
                "message" => "Manage shipments through various forms of transport.",
                "icon" => "Transport"
            ],
            "notified" => [
                "title" => "Always notified",
                "message" => "Receive updates at instantly on every movement of your order.",
                "icon" => "Notified"
            ],
            "invoicing" => [
                "title" => "Easy invoicing",
                "message" => "All up to date and without complications, ready for when you need it.",
                "icon" => "Invoicing"
            ]
        ]
    ],
    "errors" => [
        "404" => [
            "title" => "Oops! Page not found",
            "subtitle" => "The page you are looking for does not exist, has been moved, or was deleted."
        ],
        "503" => [
            "title" => "Oops! The site is under maintenance",
            "subtitle" => "We are making some improvements. We will be back shortly."
        ]
    ],
    "dashboard" => [
        "dheader" => [
            "orders" => "Orders",
            "clients" => "Clients",
            "invoicing" => "Invoicing",
            "account" => "Account",
            "logout" => "Logout"
        ],
        "table" => [
            "id" => "ID",
            "order" => "Order",
            "client" => "Client",
            "status" => "Status",
            "origin" => "Origin",
            "destination" => "Destination",
            "date" => "Date",
            "details" => [
                "description" => "Description",
                "ubication" => "Ubication",
                "package_type" => "Package Type",
                "arrival_date" => "Arrival Date",
                "departure_location" => "Departure Location",
                "arrival_location" => "Arrival Location",
                "transport_type" => "Transport Type",
                "license_plate" => "License Plate",
                "weight" => "Weight",
                "total_cost" => "Total Cost",
                "status" => "Status",
                "observations" => "Observations"
            ]
        ],
    ],
    "package_type" => [
        "chemical" => "Chemical",
        "electronic" => "Electronic",
        "explosive" => "Explosive",
        "heavy" => "Heavy",
        "organic" => "Organic",
        "perishables" => "Perishables",
        "sensible" => "Sensible",
        "textile" => "Textile"
    ],
    "status" => [
        "cancelled" => "Cancelled",
        "delayed" => "Delayed",
        "delivered" => "Delivered",
        "ongoing" => "Ongoing",
        "pending" => "Pending"
    ],
    "access" => [
        "login" => [
            "illustration" => "Ilustration",
            "title" => "My Account",
            "back" => "Back",
            "email" => "Email",
            "password" => "Password",
            "remember" => "Remember me",
            "recovery" => "Forgot password?",
            "signin" => "Sign In",
            "google" => "Sign in with google",
            "signup" => "Don't have an account yet?"
        ],
        "register" => [
            "illustration" => "Ilustración",
            "title" => "Register",
            "back" => "Back",
            "name" => "Full name",
            "email" => "Email",
            "individual" => "I am a individual",
            "company" => "Im am a company",
            "address" => "Address",
            "phone" => "Phone number",
            "username" => "Username",
            "password" => "Password",
            "next" => "Next"
        ],
        "order" => [
                "title" => "Order Details",
                "error" => "There was an error finding the order.",
                
                "info" => [
                    "title" => "Order Information",
                    "id" => "Order ID",
                    "status" => "Status",
                    "created_at" => "Creation Date"
                ],
                
                "route" => [
                    "title" => "Origin and Destination",
                    "origin" => "Origin",
                    "destination" => "Destination"
                ],
                
                "dates_transport" => [
                    "title" => "Dates and Transport",
                    "departure" => "Departure Date",
                    "arrival" => "Arrival Date",
                    "transport" => "Transport ",
                    "air"=> "Plane",
                    "maritime" => "Ship",
                    "land" => "Truck"
                ],
                
                "cost_weight" => [
                    "title" => "Costs and Weight",
                    "cost" => "Total Cost",
                    "weight" => "Weight"
                ],
                
                "location_package" => [
                    "title" => "Location and Package Type",
                    "location" => "Location",
                    "type" => "Package Type"
                ],
                
                "description_notes" => [
                    "title" => "Description and Observations",
                    "description" => "Description",
                    "observations" => "Observations"
                ]
            ]

    ],
    "footer" => [
        "copyright" => "© 2025 Sterna. All rights reserved.",
        "privacy" => "Privacy Policy and Terms of Use.",
        "mail" => "Mail",
        "instagram" => "Instagram",
        "facebook" => "Facebook"
    ]
];