<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style type="text/css">{{ file_get_contents(resource_path() . '/views/mail/minty.css') }}</style>
    @if(!empty($css))
        <style type="text/css">
            {{ $css }}
        </style>
    @endif
</head>
<body>

<div class="block">
    <!-- Start of preheader -->
    <table width="100%"  cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
        <tbody>
        <tr>
            <td width="100%" style="padding-left: 20px; padding-right: 20px;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" class="full" style="width: 768px" >
                    <tbody>
                    <!-- Spacing -->
                    <tr>
                        <td width="100%" height="5">
                            @yield('content')
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<div class="block">
    <!-- Start of preheader -->
    <table width="100%"  cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
        <tbody>
        <tr>
            <td width="100%">
                <table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                    <tbody>
                    <!-- Spacing -->
                    <tr>
                        <td width="100%" height="5"></td>
                    </tr>
                    <!-- Spacing -->
                    @if (!empty($unsubscribe))
                        <tr>
                            <td align="center" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 10px;color: #999999" st-content="preheader">
                                {{ $unsubscribe }}
                            </td>
                        </tr>
                    @endif
                    <!-- Spacing -->
                    <tr>
                        <td width="100%" height="5"></td>
                    </tr>
                    <!-- Spacing -->
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End of preheader -->
</div>

</body></html>