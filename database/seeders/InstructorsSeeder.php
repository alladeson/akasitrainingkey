<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstructorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('instructors')->insert([
            // [
            //     'user_id' => 1,
            //     'first_name' => 'AkasiLearningKey',
            //     'last_name' => 'Akasi',
            //     'address_en' => 'Benin/Cotonou/St Rita',
            //     'address_fr' => 'Benin/Cotonou/St Rita',
            //     'phone' => '229 45567788',
            //     'biography_en' => "Master's degree in electronics, electrical engineering and automation Engineer in Business Intelligence Master of Project Management (MPM) and Doctor of Business Administration (BDA) candidate Performance management consulting Digital transformation of organizations Strategic consulting for digital transformation Definition and management of strategy-aligned roadmaps Project management assistance for project implementation Support in developing project management skills",
            //     'biography_fr' => 'Master en électronique, électrotechnique et automatisme Ingénieur en Business Intelligence Candidat au Master de gestion de projet (MPM) et au doctorat en administration des affaires (BDA) Conseil en gestion de la performance Transformation numérique des organisations Conseil stratégique pour la transformation numérique Définition et gestion de feuilles de route alignées sur la stratégie Projet aide à la gestion pour la mise en œuvre du projet Soutien au développement des compétences en gestion de projet',
            //     'occupation_en' => 'Engeneer in Busness intellience',
            //     'occupation_fr' => "Ingénieur en Intelligence d'affaires",
            //     // 'top_courses' => 8,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'user_id' => 2,
                'first_name' => 'Pierre',
                'last_name' => 'Houdagba',
                'address_en' => 'Benin/Cotonou/St Rita',
                'address_fr' => 'Benin/Cotonou/St Rita',
                'phone' => '229 97567788',
                'biography_en' => "Graduated from the Ecole Polytechnique de Montreal in Canada; Doctor of Engineering in Computer Science Applied to Telecoms, Pierre Houdagba is a high-level expert in the field of Digital Economy with a lot of specific experience in information systems and data management in several industries (Energy, Finance, Transport, Banks, Insurance, etc ) 28 years of experience in total in the USA and in Africa (Benin, Togo, Ivory Coast, Niger, Rwanda, Kenya, Congo) on large-scale projects financed by Technical and Financial Partners (EU, World Bank, ADB, etc.) Governance of IS - Development of action plans Development of project management processes Change management Project management for the implementation of projects Upgrading of information systems Support for the implementation of information systems Organization support",
                'biography_fr' => "Diplômé de l'École Polytechnique de Montréal au Canada; Docteur en Ingénieur en Informatique Appliquée aux Télécoms, Pierre Houdagba est un expert de haut niveau dans le domaine de l'Economie Numérique avec une grande expérience spécifique en systèmes d'information et gestion de données dans plusieurs industries (Energie, Finance, Transport, Banques, Assurances, etc ) 28 ans d'expérience au total aux USA et en Afrique (Bénin, Togo, Côte d'Ivoire, Niger, Rwanda, Kenya, Congo) sur des projets d'envergure financés par les Partenaires Techniques et Financiers (UE, Banque Mondiale, BAD, etc. .) Gouvernance du SI - Élaboration de plans d'actions Élaboration de processus de gestion de projet Gestion du changement Gestion de projet pour la mise en œuvre des projets Mise à niveau des systèmes d'information Accompagnement à la mise en œuvre des systèmes d'information Support à l'organisation",
                'occupation_en' => 'Doctor of Engineering',
                'occupation_fr' => "Docteur en ingénierie",
                // 'top_courses' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'first_name' => 'Is Dine',
                'last_name' => 'Boukari ',
                'address_en' => 'Benin/Cotonou/St Rita',
                'address_fr' => 'Benin/Cotonou/St Rita',
                'phone' => '229 66567788',
                'biography_en' => "Master's degree in electronics, electrical engineering and automation Engineer in Business Intelligence Master of Project Management (MPM) and Doctor of Business Administration (BDA) candidate Performance management consulting Digital transformation of organizations Strategic consulting for digital transformation Definition and management of strategy-aligned roadmaps Project management assistance for project implementation Support in developing project management skills",
                'biography_fr' => "Master en électronique, électrotechnique et automatisme Ingénieur en Business Intelligence Candidat au Master de gestion de projet (MPM) et au doctorat en administration des affaires (BDA) Conseil en gestion de la performance Transformation numérique des organisations Conseil stratégique pour la transformation numérique Définition et gestion de feuilles de route alignées sur la stratégie Projet aide à la gestion pour la mise en œuvre du projet Soutien au développement des compétences en gestion de projet",
                'occupation_en' => 'Engeneer in Busness intellience',
                'occupation_fr' => "Ingénieur en Intelligence d'affaires",
                // 'top_courses' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'first_name' => 'Alexandre',
                'last_name' => 'Alle ',
                'address_en' => 'Benin/Cotonou/St Rita',
                'address_fr' => 'Benin/Cotonou/St Rita',
                'phone' => '229 45567788',
                'biography_en' => "Artificial intelligence Data & analytics Spatial Analysis / GIS Canadian Data, AI and Automation Leader at Versatil Canada 8 years at IBM in various roles such as Technical Leader Quebec, Canadian AI Leader, Sales and Technical Analytical Specialist Senior marketing analyst at Cirque du Soleil (spatial analysis, market analysis, marketing research)",
                'biography_fr' => "Intelligence artificielle Données et analyses Analyse spatiale / SIG Leader canadien des données, de l'IA et de l'automatisation chez Versatil Canada 8 ans chez IBM dans divers rôles tels que Leader technique Québec, Leader canadien de l'IA, Spécialiste des ventes et de l'analyse technique Analyste marketing senior au Cirque du Soleil (spatial analyse, analyse de marché, recherche marketing)",
                'occupation_en' => 'Senior Marketing Analyst',
                'occupation_fr' => "Analyste marketing principal",
                // 'top_courses' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'first_name' => 'Chérif',
                'last_name' => 'Ligan ',
                'address_en' => 'Benin/Cotonou/St Rita',
                'address_fr' => 'Benin/Cotonou/St Rita',
                'phone' => '229 45567788',
                'biography_en' => "16 years' experience and solid knowledge of IT development Good knowledge of agile methodologies, excellent understanding of the complete cycle of and excellent knowledge of web, software and mobile programming technologies Very good knowledge of PHP (Laravel), Python (Django), Ruby (Ruby on rails), Java languages and frameworks, Microsoft Visual FoxPro, Microsoft Visual C#, Actionscript (AS2), XML Very good aptitude for application security (Cybersecurity) Long experience in web application development and computerization of SFDs (Decentralized Financial (Decentralized Financial Systems) in the UEMOA (West African Economic and Monetary Union) zone. Mastery of relational modeling techniques for database creation and good aptitude in database automation Good knowledge of Odoo software integration (odoo.com) Solid knowledge of Mathematics (General & Financial) & Statistics - Mathematics tutoring since 2002. Knowledge of general accounting and quantitative management techniques. Ease of apprehension - Sociability - Open-mindedness - Adaptability",
                'biography_fr' => "16 ans d'expérience et solides connaissances en développement informatique Bonne connaissance des méthodologies agiles, excellente compréhension du cycle complet et excellente connaissance des technologies de programmation web, logicielle et mobile Très bonne connaissance de PHP (Laravel), Python (Django), Ruby ( Ruby on rails), Langages et frameworks Java, Microsoft Visual FoxPro, Microsoft Visual C#, Actionscript (AS2), XML Très bonne aptitude à la sécurité applicative (Cybersécurité) Longue expérience en développement d'applications web et informatisation des SFD (Decentralized Financial (Decentralized Financial Systems ) dans la zone UEMOA (Union Économique et Monétaire de l'Afrique de l'Ouest) Maîtrise des techniques de modélisation relationnelle pour la création de bases de données et bonne aptitude en automatisation de bases de données Bonne connaissance de l'intégration du logiciel Odoo (odoo.com) Solides connaissances en Mathématiques (Générales & Financières) & Statistiques - Cours particuliers de mathématiques depuis 2002. Connaissance des techniques de comptabilité générale et de gestion quantitative Facilité d'appréhension - Sociabilité - Ouverture d'esprit - Adaptabilité",
                'occupation_en' => "16 years' experience and solid knowledge of IT development",
                'occupation_fr' => "16 ans d'expérience et solides connaissances en développement informatique",
                // 'top_courses' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'first_name' => 'Valentin',
                'last_name' => 'Akando',
                'address_en' => 'Benin/Cotonou/St Rita',
                'address_fr' => 'Benin/Cotonou/St Rita',
                'phone' => '229 75567788',
                'biography_en' => "Expert in Software Design and Development Expert in Industrial Application Design and Optimization IT Analyst - ICT Project Management - Software Design & Development Digital Transformation and Process Automation Business Intelligence: Pentaho tool integration Application and data integration: TALEND Suite - PHP, Java, C++ languages Linux and Windows environments Web and mobile technology Mysql and Oracle databases Application and database servers database servers",
                'biography_fr' => "Expert en conception et développement de logiciels Expert en conception et optimisation d'applications industrielles Analyste informatique - Gestion de projets TIC - Conception et développement de logiciels Transformation numérique et automatisation des processus Business Intelligence : Intégration d'outils Pentaho Intégration d'applications et de données : Suite TALEND - Langages PHP, Java, C++ Linux et environnements Windows Technologie Web et mobile Bases de données Mysql et Oracle Serveurs d'applications et de bases de données Serveurs de bases de données",
                'occupation_en' => "Expert in Software Design and Development",
                'occupation_fr' => "Expert en conception et développement de logiciels",
                // 'top_courses' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 7,
                'first_name' => 'Abdou Ganiyi',
                'last_name' => 'BAKARY',
                'address_en' => 'Benin/Cotonou/St Rita',
                'address_fr' => 'Benin/Cotonou/St Rita',
                'phone' => '229 98567788',
                'biography_en' => "Eigteen (18) years’ experiences in mobile telephony network as well as in financial transactions, electronic banking and banking processes. Bilingual, Talented and Passionate Professional, Highly motivated and target driven, able to work independently and proactive attitude, Accustomed to work under pressure and meet great challenges, Self-starter, Enthusiast, Focused, Creative, Flexible, Astute team leader and organizer, Ability to work in a team and communicate with people from different cultures, Solid Business Development background, Easy integration....",
                'biography_fr' => "Dix-huit (18) années d’expérience dans les réseaux de téléphonie mobile ainsi que dans les transactions financières, la monétique et les processus bancaires. Professionnel bilingue, talentueux et passionné, très motivé et axé sur les objectifs, capable de travailler de manière indépendante et avec une attitude proactive, habitué à travailler sous pression et à relever de grands défis, autonome, enthousiaste, concentré, créatif, flexible, chef d'équipe et organisateur astucieux, capacité travailler en équipe et communiquer avec des personnes de cultures différentes, solide expérience en développement commercial, intégration facile....",
                'occupation_en' => "Eigteen (18) years’ experiences in mobile telephony",
                'occupation_fr' => "Dix-huit (18) années d’expérience dans les réseaux de téléphonie mobile",
                // 'top_courses' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);


    }
}
