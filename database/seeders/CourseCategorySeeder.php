<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed some data into the course_categories table
        CourseCategory::create([
            'name_en' => 'Net/Virtual Studio',
            'name_fr' => "Studio Internet/Virtuel",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'net-virtual-studio',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Development Framework',
            'name_fr' => 'Framework de développement',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'development-framework',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Java',
            'name_fr' => 'Java',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'java',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Mobile App Developpement',
            'name_fr' => "Développement d'applications mobiles",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'mobile-app-developpement',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Programming',
            'name_fr' => 'La programmation',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'programming',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Python',
            'name_fr' => 'Python',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'python',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Software Engineering',
            'name_fr' => 'Génie logiciel',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'software-engineering',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Web Development & Design',
            'name_fr' => 'Développement et conception Web',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'web-development-design',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'TOGAF',
            'name_fr' => 'TOGAF',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'togaf',
            'training_topic_id' => 1,
        ]);

        CourseCategory::create([
            'name_en' => 'Cisco networking',
            'name_fr' => 'Réseau Cisco',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'cisco-networking',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'DevOps',
            'name_fr' => 'DevOps',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'devops',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'Infrastructure',
            'name_fr' => 'Infrastructure',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'infrastructure',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'Linux & Unix',
            'name_fr' => 'Linux & Unix',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'linux-unix',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'Microtek Networking',
            'name_fr' => 'Réseaux Microtek',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'microtek-networking',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'Networking',
            'name_fr' => 'Mise en réseau',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'networking',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'Windows',
            'name_fr' => 'Windows',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'windows',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'Wireless networking',
            'name_fr' => 'Réseau sans fil',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'wireless-networking',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'IT Policy and Governance',
            'name_fr' => 'Politique informatique et gouvernance',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'it-policy-governance',
            'training_topic_id' => 2,
        ]);
        CourseCategory::create([
            'name_en' => 'API',
            'name_fr' => 'API',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'api',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Enterprise Application Integration',
            'name_fr' => "Intégration d'applications d'entreprise",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'enterprise-application-integration',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Enterprise Data Integration',
            'name_fr' => "Intégration des données d'entreprise",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'enterprise-data-integration',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Enterprise Services Bus',
            'name_fr' => "Bus de services d’entreprise",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'enterprise-services-bus',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'RESTful Web Services',
            'name_fr' => "Services Web RESTful",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'restful-web-services',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Service Oriented Architecture',
            'name_fr' => "Architecture orientée services",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'service-oriented-architecture',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Web Services',
            'name_fr' => "Services Web",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'web-services',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Entreprise Architecture Training',
            'name_fr' => "Formation en architecture d'entreprise",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'entreprise-architecture-training',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Business Architecture',
            'name_fr' => "Architecture des entreprises",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'business-architecture',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Entreprise Architecture',
            'name_fr' => "Architecture d'entreprise",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'entreprise-architecture',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Frameworks',
            'name_fr' => "Frameworks",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'frameworks',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Software Architecture',
            'name_fr' => "Architecture logicielle",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'software-architecture',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Systems Architecture',
            'name_fr' => "Architecture des systèmes",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'systems-architecture',
            'training_topic_id' => 3,
        ]);
        CourseCategory::create([
            'name_en' => 'Big Data',
            'name_fr' => "Big Data",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'big-data',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'Business Intelligence',
            'name_fr' => "Business Intelligence",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'business-intelligence',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'Business Software',
            'name_fr' => "Logiciel d'entreprise",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'business-software',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'Dynamics 365',
            'name_fr' => "Dynamics 365",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'dynamics-365',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'Microsoft 365',
            'name_fr' => "Microsoft 365",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'microsoft-365',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'Power BI',
            'name_fr' => "Power BI",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'power-bi',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'Power Platform',
            'name_fr' => "Power Platform",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'power-platform',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'SharePoint',
            'name_fr' => "SharePoint",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'sharepoint',
            'training_topic_id' => 4,
        ]);
        CourseCategory::create([
            'name_en' => 'AWS',
            'name_fr' => "AWS",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'aws',
            'training_topic_id' => 5,
        ]);
        CourseCategory::create([
            'name_en' => 'AZURE',
            'name_fr' => "AZURE",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'azure',
            'training_topic_id' => 5,
        ]);
        CourseCategory::create([
            'name_en' => 'Cloud Computing',
            'name_fr' => "Cloud Computing",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'cloud-computing',
            'training_topic_id' => 5,
        ]);
        CourseCategory::create([
            'name_en' => 'Data Virtualization',
            'name_fr' => "Virtualisation des données",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'data-virtualization',
            'training_topic_id' => 5,
        ]);
        CourseCategory::create([
            'name_en' => 'Business Analysis',
            'name_fr' => "Analyse commerciale",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'business-analysis',
            'training_topic_id' => 6,
        ]);
        CourseCategory::create([
            'name_en' => 'FAC-P/PM',
            'name_fr' => "FAC-P/PM",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'fac-p-pm',
            'training_topic_id' => 6,
        ]);
        CourseCategory::create([
            'name_en' => 'PMI Certification',
            'name_fr' => "Certification PMI",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'pmi-certification',
            'training_topic_id' => 6,
        ]);
        CourseCategory::create([
            'name_en' => 'Artificial Intelligence',
            'name_fr' => "Intelligence artificielle",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'artificial-intelligence',
            'training_topic_id' => 7,
        ]);
        CourseCategory::create([
            'name_en' => 'Data analysis & Visualization',
            'name_fr' => "Analyse et visualisation des données",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'data-analysis-visualization',
            'training_topic_id' => 7,
        ]);
        CourseCategory::create([
            'name_en' => 'Data science & Big data',
            'name_fr' => "Science des données et Big data",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'data-science-big-data',
            'training_topic_id' => 7,
        ]);
        CourseCategory::create([
            'name_en' => 'Decision Science',
            'name_fr' => "Science de la décision",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'decision-science',
            'training_topic_id' => 7,
        ]);
        CourseCategory::create([
            'name_en' => 'ML/IA (Machine Learning & Intelligence Artificielle)',
            'name_fr' => "ML/IA (Machine Learning & Intelligence Artificielle)",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'machine-learning-intelligence-artificielle',
            'training_topic_id' => 7,
        ]);
        CourseCategory::create([
            'name_en' => 'Agile Developement',
            'name_fr' => "Développement Agile",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'agile-developement',
            'training_topic_id' => 8,
        ]);
        CourseCategory::create([
            'name_en' => 'Agile Leadership',
            'name_fr' => "Leadership agile",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'agile-leadership',
            'training_topic_id' => 8,
        ]);
        CourseCategory::create([
            'name_en' => 'Agile Project Management',
            'name_fr' => "Gestion de projet agile",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'agile-project-management',
            'training_topic_id' => 8,
        ]);
        CourseCategory::create([
            'name_en' => 'Agile Tools',
            'name_fr' => "Outils agiles",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'agile-tools',
            'training_topic_id' => 8,
        ]);
        CourseCategory::create([
            'name_en' => '360ᵒde sales force coaching',
            'name_fr' => "Coaching force de vente 360ᵒde",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => '360ᵒde-sales-force-coaching',
            'training_topic_id' => 9,
        ]);
        CourseCategory::create([
            'name_en' => 'Customer loyalty techniques and portofolio development',
            'name_fr' => "Techniques de fidélisation de la clientèle et développement de portefeuille",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'customer-loyalty-techniques-portofolio-development',
            'training_topic_id' => 9,
        ]);
        CourseCategory::create([
            'name_en' => 'Negotiation techniques B2B, B2C',
            'name_fr' => "Techniques de négociation B2B, B2C",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'negotiation-techniques-b2n-b2c',
            'training_topic_id' => 9,
        ]);
        CourseCategory::create([
            'name_en' => 'Sales Techniques in the Digital Age',
            'name_fr' => "Les techniques de vente à l'ère du numérique",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'sales-techniques-digital-age',
            'training_topic_id' => 9,
        ]);
        CourseCategory::create([
            'name_en' => 'Cloud Security',
            'name_fr' => "Sécurité du cloud",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'cloud-security',
            'training_topic_id' => 10,
        ]);
        CourseCategory::create([
            'name_en' => 'Cyber Offense & Defense',
            'name_fr' => "Cyberoffensive et défense",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'cyber-offense-defense',
            'training_topic_id' => 10,
        ]);
        CourseCategory::create([
            'name_en' => 'Cyber Security',
            'name_fr' => "La cyber-sécurité",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'cyber-security',
            'training_topic_id' => 10,
        ]);
        CourseCategory::create([
            'name_en' => 'Data Privacy',
            'name_fr' => "Confidentialité des données",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'data-privacy',
            'training_topic_id' => 10,
        ]);
        CourseCategory::create([
            'name_en' => 'Governance, Risk, & Compilance',
            'name_fr' => "Gouvernance, risque et conformité",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'governance-risk-compilance',
            'training_topic_id' => 10,
        ]);
        CourseCategory::create([
            'name_en' => 'Software Application Security',
            'name_fr' => "Sécurité des applications logicielles",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'software-application-security',
            'training_topic_id' => 10,
        ]);
        CourseCategory::create([
            'name_en' => 'Systems & Network Security',
            'name_fr' => "Sécurité des systèmes et des réseaux",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'systems-network-security',
            'training_topic_id' => 10,
        ]);
        CourseCategory::create([
            'name_en' => 'MySQL Database',
            'name_fr' => "Base de données MySQL",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'mysql-database',
            'training_topic_id' => 11,
        ]);
        CourseCategory::create([
            'name_en' => 'Oracle Database',
            'name_fr' => "Base de données Oracle",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'oracle-database',
            'training_topic_id' => 11,
        ]);
        CourseCategory::create([
            'name_en' => 'SQL Server',
            'name_fr' => "Serveur SQL",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'sql-server',
            'training_topic_id' => 11,
        ]);
        CourseCategory::create([
            'name_en' => 'HSE (Health Safety Environment)',
            'name_fr' => "HSE (Santé Sécurité Environnement)",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'health-safety-environment',
            'training_topic_id' => 12,
        ]);
        CourseCategory::create([
            'name_en' => 'Electrical Safety',
            'name_fr' => "Sécurité électrique",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'electrical-safety',
            'training_topic_id' => 12,
        ]);
        CourseCategory::create([
            'name_en' => 'Fire Prevention',
            'name_fr' => "Prévention d'incendies",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'fire-prevention',
            'training_topic_id' => 12,
        ]);
        CourseCategory::create([
            'name_en' => 'Hazard Communication',
            'name_fr' => "Communication des dangers",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'hazard-communication',
            'training_topic_id' => 12,
        ]);
        CourseCategory::create([
            'name_en' => 'Medical Services and First Aid',
            'name_fr' => "Services médicaux et premiers secours",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'medical-services-first-aid',
            'training_topic_id' => 12,
        ]);
        CourseCategory::create([
            'name_en' => 'Occupational Noise Exposure',
            'name_fr' => "Exposition au bruit sur le lieu de travail",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'occupational-noise-exposure',
            'training_topic_id' => 12,
        ]);
        CourseCategory::create([
            'name_en' => 'Personal Protective Equipment',
            'name_fr' => "Équipement de protection individuelle",
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'personal-protective-equipment',
            'training_topic_id' => 12,
        ]);


    }
}
