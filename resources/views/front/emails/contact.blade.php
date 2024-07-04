{{-- <h1>{{ $mailData['title'] }}</h1>
<p>{{ $mailData['body'] }}</p> --}}
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Compiled with Bootstrap Email version: 1.3.1 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <link rel="stylesheet" href="{{ asset_own('front/css/flaticon.css') }}">
    <style type="text/css">
        body,
        table,
        td {
            font-family: Helvetica, Arial, sans-serif !important
        }

        .ExternalClass {
            width: 100%
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 150%
        }

        a {
            text-decoration: none
        }

        * {
            color: inherit
        }

        a[x-apple-data-detectors],
        u+#body a,
        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit
        }

        img {
            -ms-interpolation-mode: bicubic
        }

        table:not([class^=s-]) {
            font-family: Helvetica, Arial, sans-serif;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-spacing: 0px;
            border-collapse: collapse
        }

        table:not([class^=s-]) td {
            border-spacing: 0px;
            border-collapse: collapse
        }

        @media screen and (max-width: 600px) {

            .w-lg-48,
            .w-lg-48>tbody>tr>td {
                width: auto !important
            }

            .w-full,
            .w-full>tbody>tr>td {
                width: 100% !important
            }

            .w-16,
            .w-16>tbody>tr>td {
                width: 64px !important
            }

            .p-lg-10:not(table),
            .p-lg-10:not(.btn)>tbody>tr>td,
            .p-lg-10.btn td a {
                padding: 0 !important
            }

            .p-2:not(table),
            .p-2:not(.btn)>tbody>tr>td,
            .p-2.btn td a {
                padding: 8px !important
            }

            .pr-4:not(table),
            .pr-4:not(.btn)>tbody>tr>td,
            .pr-4.btn td a,
            .px-4:not(table),
            .px-4:not(.btn)>tbody>tr>td,
            .px-4.btn td a {
                padding-right: 16px !important
            }

            .pl-4:not(table),
            .pl-4:not(.btn)>tbody>tr>td,
            .pl-4.btn td a,
            .px-4:not(table),
            .px-4:not(.btn)>tbody>tr>td,
            .px-4.btn td a {
                padding-left: 16px !important
            }

            .pr-6:not(table),
            .pr-6:not(.btn)>tbody>tr>td,
            .pr-6.btn td a,
            .px-6:not(table),
            .px-6:not(.btn)>tbody>tr>td,
            .px-6.btn td a {
                padding-right: 24px !important
            }

            .pl-6:not(table),
            .pl-6:not(.btn)>tbody>tr>td,
            .pl-6.btn td a,
            .px-6:not(table),
            .px-6:not(.btn)>tbody>tr>td,
            .px-6.btn td a {
                padding-left: 24px !important
            }

            .pt-8:not(table),
            .pt-8:not(.btn)>tbody>tr>td,
            .pt-8.btn td a,
            .py-8:not(table),
            .py-8:not(.btn)>tbody>tr>td,
            .py-8.btn td a {
                padding-top: 32px !important
            }

            .pb-8:not(table),
            .pb-8:not(.btn)>tbody>tr>td,
            .pb-8.btn td a,
            .py-8:not(table),
            .py-8:not(.btn)>tbody>tr>td,
            .py-8.btn td a {
                padding-bottom: 32px !important
            }

            *[class*=s-lg-]>tbody>tr>td {
                font-size: 0 !important;
                line-height: 0 !important;
                height: 0 !important
            }

            .s-4>tbody>tr>td {
                font-size: 16px !important;
                line-height: 16px !important;
                height: 16px !important
            }

            .s-6>tbody>tr>td {
                font-size: 24px !important;
                line-height: 24px !important;
                height: 24px !important
            }
        }
    </style>
</head>

<body class="bg-red-100"
    style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;"
    bgcolor="#ffffff">
    <table class="bg-red-100 body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0"
        style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;"
        bgcolor="#ffffff">
        <tbody>
            <tr>
                <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left"
                    bgcolor="#ffffff">
                    <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0"
                        style="width: 100%;">
                        <tbody>
                            <tr>
                                <td align="center"
                                    style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                                    <table align="center" role="presentation" border="0" cellpadding="0"
                                        cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
                                        <tbody>
                                            <tr>
                                                <td style="line-height: 24px; font-size: 16px; margin: 0;"
                                                    align="left">
                                                    <table class="s-6 w-full" role="presentation" border="0"
                                                        cellpadding="0" cellspacing="0" style="width: 100%;"
                                                        width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;"
                                                                    align="left" width="100%" height="24">
                                                                    &#160;
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <img class="w-16"
                                                        src="{{ asset_own('front/img/customized/logo/alek-logo.png') }}">
                                                    <table class="s-6 w-full" role="presentation" border="0"
                                                        cellpadding="0" cellspacing="0" style="width: 100%;"
                                                        width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;"
                                                                    align="left" width="100%" height="24">
                                                                    &#160;
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="space-y-4">
                                                        <h6 class="text-4xl"
                                                            style="padding-top: 0; padding-bottom: 0; vertical-align: baseline; font-size: 36px; line-height: 43.2px; margin: 0;"
                                                            align="left">Hello!</h6>
                                                        <table class="s-4 w-full" role="presentation" border="0"
                                                            cellpadding="0" cellspacing="0" style="width: 100%;"
                                                            width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;"
                                                                        align="left" width="100%" height="16">
                                                                        &#160;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p class=""
                                                            style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;"
                                                            align="left">New message received from a user of the <strong>Akasi Learning Key</strong> platform.
                                                        </p>
                                                        <p class=""
                                                            style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;"
                                                            align="left">Below are the details:
                                                        </p>
                                                        <table class="s-4 w-full" role="presentation" border="0"
                                                            cellpadding="0" cellspacing="0" style="width: 100%;"
                                                            width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;"
                                                                        align="left" width="100%" height="16">
                                                                        &#160;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                                            style="border-radius: 9999px; border-collapse: separate !important; width: 100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="line-height: 24px; font-size: 18px;font-weight: bold;">Name: </td>
                                                                    <td style="line-height: 24px; font-size: 18px; ">{{$mailData['name']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="line-height: 24px; font-size: 18px;font-weight: bold;">Phone: </td>
                                                                    <td style="line-height: 24px; font-size: 18px; ">{{$mailData['phone']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="line-height: 24px; font-size: 18px;font-weight: bold;">Email: </td>
                                                                    <td style="line-height: 24px; font-size: 18px; ">{{$mailData['email']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="line-height: 24px; font-size: 18px;font-weight: bold;">Course: </td>
                                                                    <td style="line-height: 24px; font-size: 18px; ">{{$mailData['course']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="line-height: 24px; font-size: 18px;font-weight: bold;">Message: </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" style="font-size: 16px; ">{{$mailData['message']}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <p class=""
                                                            style="line-height: 24px; font-size: 18px; width: 100%; margin: 0;"
                                                            align="left">Thanks.
                                                        </p>
                                                        <p class=""
                                                            style="line-height: 24px; font-size: 18px; width: 100%; margin: 0;"
                                                            align="left">Akasi Learning Key Team
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
