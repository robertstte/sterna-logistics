<?php

return [
    "header" => [
        "home" => "Home",
        "about" => "About Us",
        "contact" => "Contact",
        "spanish" => "Spanish",
        "english" => "English",
        "language" => "Language",
        "access" => "Access",
        "panel" => "Control Panel"
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
    "contact"=>[
        "title" => "Contact Us",
        "subtitle" => "We're here to help. Have a question or comment? Get in touch with us!",
        "name" => "Name",
        "email" => "Email",
        "message" => "Message",
        "send" => "Send",
        "form" => [
            "title" => "Send us a message",
            "subject" => "Subject"
        ],
        "info" => [
            "title" => "Contact Information",
            "address" => [
                "title" => "Address",
                "content" => "123 Main Street, Madrid, Spain"
            ],
            "phone" => [
                "title" => "Phone",
                "content" => "+34 91 123 45 67"
            ],
            "email" => [
                "title" => "Email",
                "content" => "info@sterna.com"
            ],
            "hours" => [
                "title" => "Business Hours",
                "content" => "Monday to Friday: 9:00 AM - 6:00 PM"
            ]
        ]
    ],
    
    "about" => [
        "title" => "About Us",
        "subtitle" => "Connecting the world through efficient and reliable logistics solutions",
        "who_we_are" => [
            "title" => "Who We Are",
            "content_1" => "At Sterna, we are a leading logistics and international transport company with over 10 years of experience in the industry. We offer comprehensive solutions for global freight transportation.",
            "content_2" => "Our global network of strategic partners allows us to offer high-quality services tailored to the specific needs of each client, always guaranteeing maximum efficiency and security."
        ],
        "values" => [
            "title" => "Our Values",
            "reliability" => [
                "title" => "Reliability",
                "content" => "We keep our promises. Every shipment is handled with the utmost care to ensure timely and secure deliveries."
            ],
            "efficiency" => [
                "title" => "Efficiency",
                "content" => "We constantly optimize our processes to offer fast and cost-effective solutions that maximize value for our clients."
            ],
            "customer_focus" => [
                "title" => "Customer Focus",
                "content" => "We actively listen to our clients' needs and work closely with them to exceed their expectations."
            ]
        ],
        "services" => [
            "title" => "Our Services",
            "air" => [
                "title" => "Air Freight",
                "content" => "Fast solutions for urgent or high-value shipments, with global coverage and optimized transit times."
            ],
            "sea" => [
                "title" => "Sea Freight",
                "content" => "Cost-effective options for large cargo volumes, with full container load (FCL) or less than container load (LCL) services."
            ],
            "land" => [
                "title" => "Land Transport",
                "content" => "Flexible road transport services for domestic and international deliveries with real-time tracking."
            ],
            "warehousing" => [
                "title" => "Warehousing & Distribution",
                "content" => "Secure facilities for temporary storage of goods and efficient distribution services."
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
            'clients' => 'Clients',
            'ventas' => 'Sales',
            "invoicing" => "Invoicing",
            "account" => "Account",
            "logout" => "Logout"
        ],
        "table" => [
            "orders" => [
                "title" => "My Orders",
                "id" => "ID",
                "order" => "Order",
                "client" => "Client",
                "status" => "Status",
                "origin" => "Origin",
                "destination" => "Destination",
                "date" => "Date",
                "details" => [
                    "description" => "Description",
                    "ubication" => "Location",
                    "package_type" => "Package Type",
                    "arrival_date" => "Arrival Date",
                    "departure_location" => "Departure Location",
                    "arrival_location" => "Arrival Location",
                    "transport_type" => "Transport Type",
                    "license_plate" => "License Plate",
                    "weight" => "Weight",
                    "total_cost" => "Total Cost",
                    "status" => "Status",
                    "observations" => "Observations",
                    "save" => "Save",
                    "cancel" => "Cancel",
                    "select_type" => "Select type",
                    "select_transport" => "Select transport",
                    "select_country" => "Select country",
                    "select_location" => "Select location",
                    "departure_date" => "Departure date",
                    "arrival_date" => "Arrival date",
                    "weight_kg" => "Weight (KG)",
                    "description" => "Description",
                    "modal_title" => "New Order"
                ],
                "new_order" => "New Order",
                "request_new" => "Request New Order",
                "request" => "Request",
                "request_success" => "Request sent successfully",
                "request_approved" => "Request approved successfully",
                "request_rejected" => "Request rejected",
                "requests" => "Order Requests",
                "request_details" => "Request Details",
                "approve" => "Approve",
                "reject" => "Reject",
                "no_orders" => "You have no orders",
                "no_orders_message" => "You haven't made any orders yet. Would you like to request a new one?",
                "request_order" => "Request Order",
                "my_requests" => "My Requests",
                "pending" => "Pending",
                "approved" => "Approved",
                "rejected" => "Rejected",
                "request_summary" => "Requests Summary",
                "view_details" => "View Details",
                "no_requests" => "There are no pending order requests",
                "general_info" => "General Information",
                "locations" => "Locations",
                "dates" => "Dates",
                "request_date" => "Request Date",
                "observations_optional" => "Observations (optional)",
                "send_request" => "Send Request",
                "approve_request" => "Approve Request",
                "reject_request" => "Reject Request",
                "approve_confirmation" => "Are you sure you want to approve this order request?",
                "approve_message" => "By approving this request, a new order will be created in the system.",
                "initial_status" => "Initial Order Status",
                "reject_confirmation" => "Are you sure you want to reject this order request?",
                "reject_message" => "This action cannot be undone.",
                "pending_status" => "Pending approval",
                "approved_status" => "Approved - An order has been created with this request",
                "rejected_status" => "Rejected"
            ],
            "customers" => [
                "name" => "Name",
                "email" => "Email",
                "address" => "Address",
                "phone" => "Phone",
                "country" => "Country",
                "customer_type" => "Customer Type"
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
            "next" => "Next",
            "select_country" => "Select a country",
            "confirm_password" => "Confirm Password"
        ],
        "recovery" => [
            "title" => "Recovery",
            "submit" => "Send email"
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
                ],
                "tracking" => "Order Tracking"
            ]

    ],
    "footer" => [
        "copyright" => "© 2025 Sterna. All rights reserved.",
        "privacy" => "Privacy Policy and Terms of Use.",
        "mail" => "Mail",
        "instagram" => "Instagram",
        "facebook" => "Facebook"
    ],
    "plans" => [
        "title" => "Plan Subscription",
        "subtitle" => "Choose the plan that best suits your needs",
        "price" => "Price",
        "current_plan" => "Current Plan",
        "change_to_plan" => "Change to this plan",
        'price' => 'Price',
        'download_limit' => 'Download limit',
        'per_month' => 'month',
        'discount' => 'Discount',
        'switch_plan' => 'Change plan',
        'basic_support' => 'Basic email support',
        'reports_priority' => 'Reports access & priority support',
        'unlimited' => 'Unlimited',
        'exclusive_promo' => 'Exclusive promo',
        'enterprise_services' => '24/7 support, account manager & advanced integration',
        'default_plan' => 'Default plan',
        'choose_plan' => 'Choose plan',
        'selected_plan' => 'Selected Plan',
    ],
    "myAccount" => [
        "title" => "My Account",
        "profile" => "Profile",
        "password" => "Password",
        "preferences" => "Preferences",
        "plans" => "Plans",
        "personal_info" => "Personal Information",
        "name" => "Name",
        "email" => "Email",
        "phone" => "Phone",
        "address" => "Address",
        "update_profile" => "Update Profile",
        "change_password" => "Change Password",
        "current_password" => "Current Password",
        "new_password" => "New Password",
        "confirm_password" => "Confirm New Password",
        "change_password_button" => "Change Password",
        "email_notifications" => "Receive email notifications",
        "order_updates" => "Receive order updates",
        "language" => "Language",
        "spanish" => "Spanish",
        "english" => "English",
        "save_preferences" => "Save Preferences",
        "subscription_plans" => "Subscription Plans",
        "price" => "Price",
        "current_plan" => "Current Plan",
        "change_to_plan" => "Change to this plan"
    ]
];