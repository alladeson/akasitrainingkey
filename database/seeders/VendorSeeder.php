<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed some data into the vendors table
        Vendor::create([
            'name_en' => '(ISC)²®',
            'name_fr' => '(ISC)²®',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'isc',
        ]);

        Vendor::create([
            'name_en' => 'Adobe',
            'name_fr' => 'Adobe',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'adobe',
        ]);
        Vendor::create([
            'name_en' => 'Akasi Learning Key',
            'name_fr' => 'Akasi Learning Key',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'akasi-learning-key',
        ]);
        Vendor::create([
            'name_en' => 'APMG International',
            'name_fr' => 'APMG International',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'apmg-international',
        ]);
        Vendor::create([
            'name_en' => 'AWS',
            'name_fr' => 'AWS',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'aws',
        ]);
        Vendor::create([
            'name_en' => 'BCS',
            'name_fr' => 'BCS',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'bcs',
        ]);
        Vendor::create([
            'name_en' => 'CertNexus',
            'name_fr' => 'CertNexus',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'crtnexus',
        ]);
        Vendor::create([
            'name_en' => 'Cisco',
            'name_fr' => 'Cisco',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'cisco',
        ]);
        Vendor::create([
            'name_en' => 'Citrix',
            'name_fr' => 'Citrix',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'citrix',
        ]);
        Vendor::create([
            'name_en' => 'CMMC',
            'name_fr' => 'CMMC',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'cmmc',
        ]);
        Vendor::create([
            'name_en' => 'CompTIA',
            'name_fr' => 'CompTIA',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'comptia',
        ]);
        Vendor::create([
            'name_en' => 'DevOps Institute',
            'name_fr' => 'Institut DevOps',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'devops-institute',
        ]);
        Vendor::create([
            'name_en' => 'EC-Council',
            'name_fr' => 'EC-Council',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'ec-council',
        ]);
        Vendor::create([
            'name_en' => 'IAPP',
            'name_fr' => 'IAPP',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'iapp',
        ]);
        Vendor::create([
            'name_en' => 'IBM',
            'name_fr' => 'IBM',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'ibm',
        ]);
        Vendor::create([
            'name_en' => 'ICAgile',
            'name_fr' => 'ICAgile',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'icagile',
        ]);
        Vendor::create([
            'name_en' => 'IIBA',
            'name_fr' => 'IIBA',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'iiba',
        ]);
        Vendor::create([
            'name_en' => 'ISACA',
            'name_fr' => 'ISACA',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'isaca',
        ]);
        Vendor::create([
            'name_en' => 'ISTQB',
            'name_fr' => 'ISTQB',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'istqb',
        ]);
        Vendor::create([
            'name_en' => 'ITIL®',
            'name_fr' => 'ITIL®',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'itil',
        ]);
        Vendor::create([
            'name_en' => 'Lean Six Sigma',
            'name_fr' => 'Lean Six Sigma',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'lean-six-sigma',
        ]);
        Vendor::create([
            'name_en' => 'Microsoft',
            'name_fr' => 'Microsoft',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'microsoft',
        ]);
        Vendor::create([
            'name_en' => 'Nutanix',
            'name_fr' => 'Nutanix',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'nutanix',
        ]);
        Vendor::create([
            'name_en' => 'Open Group',
            'name_fr' => 'Open Group',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'open-group',
        ]);
        Vendor::create([
            'name_en' => 'Oracle',
            'name_fr' => 'Oracle',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'oracle',
        ]);
        Vendor::create([
            'name_en' => 'PeopleCert®',
            'name_fr' => 'PeopleCert®',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'peoplecert',
        ]);

        Vendor::create([
            'name_en' => 'PMI',
            'name_fr' => 'PMI',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'pmi',
        ]);
        Vendor::create([
            'name_en' => 'Red Hat',
            'name_fr' => 'Red Hat',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'red-hat',
        ]);
        Vendor::create([
            'name_en' => 'Salesforce',
            'name_fr' => 'Salesforce',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'salesforce',
        ]);
        Vendor::create([
            'name_en' => 'SAP',
            'name_fr' => 'SAP',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'sap',
        ]);
        Vendor::create([
            'name_en' => 'Scaled Agile',
            'name_fr' => 'Scaled Agile',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'scaled-agile',
        ]);
        Vendor::create([
            'name_en' => 'Scrum Alliance',
            'name_fr' => 'Scrum Alliance',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'scrum-alliance',
        ]);
        Vendor::create([
            'name_en' => 'Skyline-ATS',
            'name_fr' => 'Skyline-ATS',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'skyline-ats',
        ]);
        Vendor::create([
            'name_en' => 'VMWare',
            'name_fr' => 'VMWare',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'vmware',
        ]);
        Vendor::create([
            'name_en' => 'ZACHMAN',
            'name_fr' => 'ZACHMAN',
            'description_en' => '',
            'description_fr' => '',
            'url_tag' => 'zachman',
        ]);

        // You can continue to add more Vendor::create() statements for additional data.
    }
}
