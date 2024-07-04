<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            font-family: "Open Sans", sans-serif
        }

        .invoice-container {
            margin: 20px;
            padding: 20px;
            box-shadow: 0 1px 21px #acacac;
        }

        .header {
            overflow: hidden;
        }

        .logo {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
        }

        .logo img {
            width: 80px;
            height: auto;
            margin-left: 5px;
            margin-bottom: -10px;
        }

        .business-info {
            text-align: left;
        }

        .business-info span {
            font-size: 7px;
            color: #f5bf0d;
        }

        .line {
            width: 80%;
            height: 2px;
            background-color: black;
            margin-left: auto;
            margin-right: auto;

        }

        .date {

            /* Adjust the left margin for the totals section */
            text-align: right;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 5px;
        }

        .client-info {
            margin-left: 40px;
        }

        .invoice-number {
            margin-top: -5px;
            margin-bottom: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            /* Reduce the width of the table */
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid #717171;
        }

        th,
        td {

            padding: 8px;
            /* Adjust padding for a smaller size */
            text-align: left;
            font-size: 12px;
        }

        th {
            background-color: rgb(12, 12, 187);
            color: #fff;
        }

        .totals {
            margin-left: 20%;
            /* Adjust the left margin for the totals section */
            text-align: right;

            font-size: 12px;
        }

        .footer {
            margin-left: 25px;
            margin-top: 10px;
            font-size: 12px;
        }

        .signature {
            text-align: right;
            /* margin-right: 25px; */
            margin-top: 20px;
            font-size: 12px;
            font-weight: bold;

        }

        .footer-info {
            font-size: 9px;
            text-align: center;
            margin-top: 50px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

        <div class="logo">
            <img class="img-responsive" alt="logo" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('front/img/facture/akasi.jpg'))) }}"/>
            <div class="business-info">
                <span>Your Business – Our Passion</span>
            </div>
        </div>

    <div class="line"></div>
    <div class="date">
        <span>Cotonou, 11 Novembre 2023</span>
    </div>

    <div class="invoice-container">
        <div class="receipt-right">
            <span style="text-decoration: underline; margin: 0; font-size: 14px; font-style: bold;">Client</span> :
            <span style="font-size: 14px; margin: 0;"> JM & Partners</span>
        </div>

        <div class="invoice-number">
            <h4 style=" color: red; font-weight: bold;text-align: center;">
                FACTURE PROFORMA N°004/11/23/RAF/DG
            </h4>
        </div>
        <p style="margin-top: 8px; margin-bottom: 18px; font-weight: bold; font-size: 12px;text-align: center">
            Formation - Préparation À La Certification CISA® (Certified Information Systems Auditor)
        </p>
        <table >
            <thead>
                <tr>
                    <th style="width: 50%">Désignation</th>
                    <th style="width: 6%">Qté</th>
                    <th style="width: 18%">PU HT</th>
                    <th style="width: 19%">Total HT</th>
                    <th style="width: 8%">TVA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p><strong>Formation- Préparation À La Certification CISA® (Certified Information Systems
                                Auditor)</strong></p>
                        <p>Formation de 5 jours incluant le Kit pédagogique, le support de cours, les pauses café et
                            déjeuner, le coaching de préparation à la certification</p>
                        <p><strong>Dates : <span> SP à partir du 20 Novembre à Cotonou</span></strong></p>
                    </td>
                    <td>2</td>
                    <td>1 600 000</td>
                    <td>3 200 000</td>
                    <td>18%</td>
                </tr>
                <tr>
                    <td>Frais d’examen de certification</td>
                    <td>2</td>
                    <td>500 000</td>
                    <td>1 000 000</td>
                    <td>18%</td>
                </tr>
            </tbody>
        </table>
        <div class="totals">
            <p><strong>Total HT :</strong> 4 200 000</p>
            <p><strong>TVA :</strong> 756 000</p>
            <p><strong>Total TTC :</strong> 4 956 000</p>
        </div>
        <div class="footer">
            <p><strong>À payer :</strong> 4 956 000 XOF (Quatre millions neuf cent cinquante-six mille XOF)</p>
            <p><strong> IBAN :</strong> SN08 SN010 01355 007718400088 64</p>
            <p><strong>Banque :</strong> BICIS SENEGAL</p>
            <p><strong>Nom :</strong> JM & Partners</p>
            <p><strong> Mode de règlement :</strong> par virement bancaire 100% à la commande</p>
        </div>
        <div class="signature">
            <p>Date et signature du client précédée de la mention ‘Bon pour accord’</p>
        </div>
    </div>

    <p
        style="font-size: 12px; text-align: center; font-weight: bold; margin-top: 75px; text-decoration: underline">
        Pierre HOUDAGBA
    </p>
    <p style="font-size: 12px; text-align: center; font-weight: bold;">
        Directeur Général
    </p>

    <div class="footer-info">
        <p style="font-size: 9px;; text-align: center">
            <span>AKASI Group | N° 308 Agla Rue du Collège Gaza Formation 72 BP
                242</span>
            <span>Cotonou Benin | Tel : (+229) 94 58 39 99| E-mail :
                <a href="mailto:akasi-group@akasigroup.com">akasi-group@akasigroup.com | www.Akasigroup.com</a> </span>
            <span>RCCM RB/COT/11B7469 |CORIS BANK: 00022924101/ ECOBANK BENIN:
                121103295702 | N°IFU:3200800534415</span>
        </p>
    </div>

